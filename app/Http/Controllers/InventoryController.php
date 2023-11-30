<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = Inventory::orderBy('created_at', 'DESC')->get();
  
        return view('inventory.index', compact('inventory'));
    }

    public function get_tipos()
    {
        $tipos = Inventory::all();
        return response()->json($tipos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'amount' => 'required|numeric',
        //     'name' => 'required|max:50',
        //     'description' => 'required',
        // ];

        // // Personalizar mensajes de error
        // $messages = [
        //     'required' => 'El campo :attribute es obligatorio.',
        //     'max' => 'El campo :attribute no debe exceder :max caracteres.',
        //     'numeric' => 'El campo :attribute debe ser un número.',
        // ];

        // // Validar la información
        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withInput()
        //         ->withErrors($validator);
        // }
        // inventory::create($request->all());
        $rules = [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
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
    
        // Crear el registro del tipo de producto
        $inventario = Inventory::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'stock' => false
        ]);
        if ($inventario->amount > 0) {
            $inventario->stock = true;
        } else {
            $inventario->stock = false;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $inventario->image = $imagePath;
            $inventario->save();
        }
    
        // Crear productos asociados automáticamente
        $cantidadProductos = $request->input('amount');
        for ($i = 0; $i < $cantidadProductos; $i++) {
            Producto::create([
                'name' => $inventario->name,
                'price' => $inventario->price,
                'product_code' => \Illuminate\Support\Str::uuid(), // Puedes usar una lógica para generar códigos únicos
                'description' => $inventario->description,
                'inventory_id' => $inventario->id,
                'disponible' => true,
            ]);
        }
 
        return redirect()->route('inventory')->with('success', 'inventory added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventory = Inventory::with('productos')->findOrFail($id);

        return view('inventory.show', compact('inventory'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::findOrFail($id);
  
        return view('inventory.edit', compact('inventory'));
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
        $inventory = inventory::findOrFail($id);
        $inventory->update($request->all());

        return redirect()->route('inventory')->with('success', 'Producto Actualizado');
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::findOrFail($id);
  
        $inventory->delete();
  
        return redirect()->route('inventory')->with('success', 'inventory deleted successfully');
    }
}