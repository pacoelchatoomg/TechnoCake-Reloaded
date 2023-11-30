<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Validator;
use App\Exports\PedidosExport;
use App\Exports\ProductosExport;
use App\Models\Inventory;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $productos = Producto::with('pedidos')->orderBy('created_at', 'DESC')->get();
        $productos = Producto::orderBy('created_at', 'DESC')->get();

        return view('producto.index', compact('productos'));
    }
    public function get_products()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pedidos = Pedidos::all();
        $inventories = Inventory::all();
        return view('producto.create', compact('pedidos', 'inventories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'inventory_id' => 'required|exists:inventories,id',
            'pedido_id' => 'required|exists:pedidos,id',
            'product_code' => 'required|unique:productos,product_code',
            'description' => 'required',
        ];
    
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'numeric' => 'El campo :attribute debe ser un número.',
        ];
    
        // Validar la información
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    
        // Obtener el inventario y el pedido
        $inventory = Inventory::findOrFail($request->input('inventory_id'));
        $pedido = Pedidos::findOrFail($request->input('pedido_id'));
    
        // Crear el registro del producto y asociar el pedido e inventario
        $producto = Producto::create([
            'name' => $inventory->name,
            'price' => $inventory->price,
            'product_code' => $request->input('product_code'),
            'description' => $request->input('description'),
            'inventory_id' => $inventory->id,
            'disponible' => false
        ]);
    
        // Asociar el pedido al producto
        $pedido->productos()->save($producto);
        return redirect()->route('producto')->with('success', 'Producto Añadido');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);

        $pedidos = $producto->pedido()->latest()->take(10)->get();

        return view('producto.show', compact('producto', 'pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $pedidos = Pedidos::all(); 


        return view('producto.edit', compact('producto', 'pedidos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            // 'inventory_id' => 'required|exists:inventories,id',
            // 'pedido_id' => 'required|exists:pedidos,id',
            'product_code' => 'required|unique:productos,product_code,' . $id,
            'description' => 'required',
        ];
    
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'numeric' => 'El campo :attribute debe ser un número.',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    
        $producto = Producto::findOrFail($id);
    
        $producto->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'product_code' => $request->input('product_code'),
            'description' => $request->input('description'),
            'inventory_id' => $request->input('inventory_id'),
        ]);
        $producto->pedido_id = $request->input('pedido_id');
        $producto->save();

        return redirect()->route('producto')->with('success', 'Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()->route('producto')->with('success', 'Producto Eliminado');
    }
    public function deleted()
    {
        // Obtener todos los pedidos eliminados lógicamente
        $productosEliminados = Producto::onlyTrashed()->get();

        return view('producto.deleted', compact('productosEliminados'));
    }

    public function restore(Request $request)
    {
        // Buscar el pedido eliminado lógicamente por su id
        $productosIds = $request->input('productos');

        // Restaurar los pedidos en lote
        Producto::whereIn('id', $productosIds)->restore();

        return redirect()->route('producto')->with('success', 'Productos restaurados exitosamente');
    }

    public function exportarProductos(Producto $productos)
    {
        $productos = Producto::orderBy('created_at', 'DESC')->get();

        return Excel::download(new ProductosExport($productos), 'todos_los_productos.xlsx');
    }
    public function exportarPedidos(Producto $producto)
    {
        $pedidos = $producto->pedidos;

        return Excel::download(new PedidosExport($pedidos), 'pedidos.xlsx');
    }
}
