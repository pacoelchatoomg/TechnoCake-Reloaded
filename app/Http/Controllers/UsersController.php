<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;

 
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = Users::orderBy('created_at', 'DESC')->get();
  
        return view('users.index', compact('Users'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Users::create($request->all());
 
        return redirect()->route('users')->with('success', 'Users added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Users = Users::findOrFail($id);
  
        return view('users.show', compact('Users'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Users = Users::findOrFail($id);
  
        return view('users.edit', compact('Users'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|unique:productos,product_code,' . $id, // Agrega el ID actual para excluirlo de la regla de 
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

        // Actualizar el registro si la validación pasa
        $producto = Users::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('users')->with('success', 'Usuario Actualizado');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Users = Users::findOrFail($id);
  
        $Users->delete();
  
        return redirect()->route('users')->with('success', 'Users deleted successfully');
    }
}