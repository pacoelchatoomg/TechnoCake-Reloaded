@extends('layouts.app')
  
@section('title', 'Edit users')
  
@section('contents')
    <h1 class="mb-0">Edit users</h1>
    <hr />
    <form action="{{ route('users.update',  $users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        dd($users)
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" value="{{ $users->name}}" class="form-control" placeholder="Nombre">
            </div>
            <div class="col">
                <input type="text" name="price" value="{{ $users->email}}" class="form-control" placeholder="Correo Electrónico">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" value="{{ $users->password}}" class="form-control" placeholder="Contraseña">
            </div>

        </div>
 
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection