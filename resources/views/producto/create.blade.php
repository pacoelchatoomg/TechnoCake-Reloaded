@extends('layouts.app')
  
@section('title', 'Añadir Producto')
  
@section('contents')
    <h1 class="mb-0">Añadir Producto</h1>
    <hr />
    <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Precio">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" class="form-control" placeholder="Codigo">
            </div>
            <div class="col">
                <input type="text" name="description" class="form-control" placeholder="Descripcion">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </form>
@endsection