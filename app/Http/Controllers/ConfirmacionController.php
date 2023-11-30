<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ticket;
use App\Models\Inventory;
use App\Models\Pedidos;
use App\Models\Producto;

class ConfirmacionController extends Controller
{
    public function showConfirmation(Request $request)
    {
        $cartData = json_decode($request->input('cart', '[]'), true);

        return View::make('confirmacion')->with('cartData', $cartData);
    }

    public function sendConfirmation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Obtén la información del carrito (puedes ajustar esto según tu aplicación)
        $cartData = json_decode($request->input('cart', '[]'), true);

        // Renderiza la vista y obtén el HTML
        $view = view('email.ticket')->with('cartData', $cartData)->render();
        $this->updateInventoryAndCreateOrder($cartData);

        // // // Envía el correo electrónico con la información del carrito
        Mail::to($request->input('email'))
            ->send(new Ticket(['cartData' => $cartData, 'html' => $view]));

        // Muestra la vista de confirmación
        return View::make('email.ticket')->with('cartData', $cartData);
    }

    protected function updateInventoryAndCreateOrder($cartData)
    {
        // Inicializa una variable para almacenar los productos asociados al pedido
        $cartDataPorCategoria = collect($cartData)->groupBy('id');


        // Inicializa una variable para almacenar los productos asociados al pedido
        $productosEnPedido = [];

        // Itera sobre cada grupo de productos por inventory_id
        foreach ($cartDataPorCategoria as $inventoryId => $productosPorCategoria) {

            // Obtén todos los productos desde la base de datos para el mismo inventory_id
            $productos = Producto::where('inventory_id', $inventoryId)->get();

            // Itera sobre los productos en la categoría
            // foreach ($productos as $productoDisponible) 
            foreach ($productosPorCategoria as $item) {
                $productosDisponibles = $productos->filter(function ($product) use ($item) {
                    return $product->inventory->amount >= $item['quantity'] && $product->disponible;
                });
                // Busca el primer producto disponible en la categoría
                // Si se encuentra un producto disponible
                $cantidadCategoria=$item['quantity'];
                $loops=0;
                $prueba=[];
                $loops1=0;
                foreach ($productosDisponibles as $productoDisponible) {
                    if ($productoDisponible->disponible == 1 && $cantidadCategoria > 0) {
                        $productoDisponible->inventory->amount -= 1;
                        $productoDisponible->inventory->save();
                        // Deduce la cantidad comprada del inventario
                        $loops+=1;
                        $cantidadCategoria -= 1;
                        $productoDisponible->disponible = 0;
                        $productoDisponible->save();
                        // Agrega el producto a la lista de productos en el pedido
                        $productosEnPedido[] = [
                            'producto_id' => $productoDisponible->id,
                            'cantidad' => 1,
                            'precio' => $productoDisponible->price,
                        ];
                        if($cantidadCategoria == 0)
                        break;
                } else {
                    // Maneja la situación donde no hay suficiente cantidad en inventario o el producto no está disponible
                    // Puedes lanzar una excepción, mostrar un mensaje de error, etc.
                    // También puedes hacer un rollback del inventario si ya se había actualizado
                    $this->rollbackInventory($productosEnPedido);
                    
                    // Puedes lanzar una excepción o mostrar un mensaje de error
                    throw new \Exception('No hay suficiente cantidad en inventario o los productos no están disponibles para inventory_id: ' . $inventoryId);
                }
            }
            
            
          
            }
        }

        // Paso 2: Crear un nuevo pedido y asociar los productos
        $pedido = new Pedidos([
            'amount' => array_sum(array_column($productosEnPedido, 'cantidad')),
            'price' => array_sum(array_map(function ($producto) {
                return $producto['cantidad'] * $producto['precio'];
            }, $productosEnPedido)),
            'status' => 'Pendiente', // O el estado deseado para nuevos pedidos
            'description' => 'Descripción del pedido', // Puedes personalizar esto según tus necesidades
        ]);
        
        // $pedido->productos()->whereNotIn('id', $productosEnPedido)->update(['pedido_id' => null]);
        $pedido->save();
        $productoIds = array_column($productosEnPedido, 'producto_id');

        // Actualiza el campo 'pedido_id' en la tabla de productos
        Producto::whereIn('id', $productoIds)->update(['pedido_id' => $pedido->id]);

        // Asocia los productos al pedido

    }

    protected function rollbackInventory($productosEnPedido)
    {
        // Recorre la lista de productos y agrega la cantidad de vuelta al inventario
        foreach ($productosEnPedido as $productoEnPedido) {
            $producto = Producto::find($productoEnPedido['producto_id']);

            if ($producto) {
                $producto->inventario->amount += $productoEnPedido['cantidad'];
                $producto->inventario->save();
            }
        }
    }
}
