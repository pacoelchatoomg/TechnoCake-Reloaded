<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Producto;
 
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
        Producto::create($request->all());
 
        return redirect()->route('producto')->with('success', 'producto added successfully');
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
        $producto = producto::findOrFail($id);
  
        return view('producto.edit', compact('producto'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product_code)
    {
        // $producto->title = $request->title;
        // $producto->price = $request->price;
        // $producto->product_code = $request->product_code;
        // $producto->description = $request->description;
        // $producto->save();
        $producto = producto::find($product_code);
        $producto->update(array_merge($producto->toArray(), $request->toArray()));

        // $producto = producto::findOrFail($id);
  
        // $producto->update($request->all());
  
        return redirect()->route('producto')->with('success', 'producto updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = producto::findOrFail($id);
  
        $producto->delete();
  
        return redirect()->route('producto')->with('success', 'producto deleted successfully');
    }
}