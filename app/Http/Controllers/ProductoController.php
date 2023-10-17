<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::orderBy('created_at', 'DESC')->get();
  
        return view('producto.index', compact('producto'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'price' => 'required|numeric',
            'product_code' => 'required|unique:productos,product_code',
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

        // Crear el registro si la validación pasa
        Producto::create($request->all());

        return redirect()->route('producto')->with('success', 'Producto Añadido');
        // versión corta de validación
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'price' => 'required|numeric',
        //     'product_code' => 'required|unique:productos,product_code',
        //     'description' => 'nullable',
        // ]);

        // Producto::create($request->all());

        // return redirect()->route('producto')->with('success', 'Producto Añadido');
        
        // sin validación

        // Producto::create($request->all());
 
        // return redirect()->route('producto')->with('success', 'Producto Añadido');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = producto::findOrFail($id);
  
        return view('producto.show', compact('producto'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
  
        return view('producto.edit', compact('producto'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $producto->title = $request->title;
        // $producto->price = $request->price;
        // $producto->product_code = $request->product_code;
        // $producto->description = $request->description;
        // $producto->save();
        // $producto = producto::find($id);
        // $producto->update(array_merge($producto->toArray(), $request->toArray()));

        $producto = Producto::findOrFail($id);
  
        $producto->update($request->all());
  
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
}