@extends('layouts.app')
  
@section('title', 'Show users')
  
@section('contents')
    <h1 class="mb-0">Detail users</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $users->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $users->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Contraseña</label>
            <input type="text" name="product_code" class="form-control" placeholder="users Code" value="{{ $users->password }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Creado en</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $users->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Modificado en</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $users->updated_at }}" readonly>
        </div>
    </div>
@endsection