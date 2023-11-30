<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use App\Exports\ProductosExport;
use App\Exports\PedidosExport;
use Maatwebsite\Excel\Facades\Excel;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Pedidos = Pedidos::orderBy('created_at', 'DESC')->get();
        $pedidos = Pedidos::orderBy('created_at', 'DESC')->get();

        return view('Pedidos.index', compact('pedidos'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        return view('Pedidos.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|max:20',
            'description' => 'required',
        ];

        // Personalizar mensajes de error
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
        $Pedidos = Pedidos::create([
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
        ]);

        // Asociar productos al pedido
        // $productosIds = $request->input('productos');
        // $Pedidos->productos()->attach($productosIds);
        // Pedidos::create($request->all());

        return redirect()->route('Pedidos')->with('success', 'Pedidos added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $Pedido = Pedidos::with('productos')->findOrFail($id);

        return view('Pedidos.show', compact('Pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Pedidos = Pedidos::findOrFail($id);
        $productos = Producto::all(); // Obtén la lista de todos los productos

        // También puedes obtener los productos asociados al pedido
        $productosAsociados = $Pedidos->productos;

        return view('Pedidos.edit', compact('Pedidos', 'productos', 'productosAsociados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|max:20',
            'description' => 'required',
        ];

        // Personalizar mensajes de error
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

        // Actualizar el registro si la validación pasa
        $Pedidos = Pedidos::findOrFail($id);
        $Pedidos->update([
            'amount' => $request->input('amount'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
        ]);

        // Actualizar la relación muchos a muchos con productos
        $productosIds = $request->input('productos');

        // Eliminar las asociaciones antiguas
        $Pedidos->productos()->whereNotIn('id', $productosIds)->update(['pedido_id' => null]);
        
        // Asociar los nuevos productos al pedido
        Producto::whereIn('id', $productosIds)->update(['pedido_id' => $Pedidos->id]);
        // $Pedidos->update($request->all());

        return redirect()->route('Pedidos')->with('success', 'Pedido Actualizado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Pedidos = Pedidos::findOrFail($id);

        $Pedidos->delete();

        return redirect()->route('Pedidos')->with('success', 'Pedidos deleted successfully');
    }

    public function deleted()
    {
        // Obtener todos los pedidos eliminados lógicamente
        $pedidosEliminados = Pedidos::onlyTrashed()->get();

        return view('Pedidos.deleted', compact('pedidosEliminados'));
    }

    public function restore(Request $request)
    {
        // Buscar el pedido eliminado lógicamente por su id
        $pedidosIds = $request->input('pedidos');

        // Restaurar los pedidos en lote
        Pedidos::whereIn('id', $pedidosIds)->restore();

        return redirect()->route('Pedidos')->with('success', 'Pedidos restaurados exitosamente');
    }

    public function exportarPedidos(Pedidos $Pedidos)
    {
        $Pedidos = Pedidos::orderBy('created_at', 'DESC')->get();

        return Excel::download(new PedidosExport($Pedidos), 'todos_los_pedidos.xlsx');
    }
    public function exportarProductos(Pedidos $Pedido)
    {
        $productos = $Pedido->productos;

        return Excel::download(new ProductosExport($productos), 'productos.xlsx');
    }
}
