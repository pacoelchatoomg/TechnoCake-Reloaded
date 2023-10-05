<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Pedidos;
 
class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pedidos = Pedidos::orderBy('created_at', 'DESC')->get();
  
        return view('Pedidos.index', compact('Pedidos'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pedidos.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pedidos::create($request->all());
 
        return redirect()->route('Pedidos')->with('success', 'Pedidos added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Pedidos = Pedidos::findOrFail($id);
  
        return view('Pedidos.show', compact('Pedidos'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Pedidos = Pedidos::findOrFail($id);
  
        return view('Pedidos.edit', compact('Pedidos'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $Pedidos->title = $request->title;
        // $Pedidos->price = $request->price;
        // $Pedidos->product_code = $request->product_code;
        // $Pedidos->description = $request->description;
        // $Pedidos->save();
        // $Pedidos = Pedidos::find($id);
        // $Pedidos->update(array_merge($Pedidos->toArray(), $request->toArray()));

        $Pedidos = Pedidos::findOrFail($id);
  
        $Pedidos->update($request->all());
  
        return redirect()->route('Pedidos')->with('success', 'Pedidos updated successfully');
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
}