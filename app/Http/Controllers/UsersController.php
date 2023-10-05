<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Users;
 
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
    public function update(Request $request, string $id)
    {
        // $Users->title = $request->title;
        // $Users->price = $request->price;
        // $Users->product_code = $request->product_code;
        // $Users->description = $request->description;
        // $Users->save();
        // $Users = Users::find($id);
        // $Users->update(array_merge($Users->toArray(), $request->toArray()));

        $Users = Users::findOrFail($id);
  
        $Users->update($request->all());
  
        return redirect()->route('users')->with('success', 'Users updated successfully');
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