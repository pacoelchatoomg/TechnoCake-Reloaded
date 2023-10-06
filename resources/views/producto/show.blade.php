@extends('layouts.app')
  
@section('title', 'Show producto')
  
@section('contents')
    <h1 class="mb-0">Detalles del Producto</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nombre del producto</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $producto->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Precio</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $producto->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Codigo</label>
            <input type="text" name="product_code" class="form-control" placeholder="producto Code" value="{{ $producto->product_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Descripcion</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $producto->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Fecha de creacion</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $producto->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Fecha de actualizacion</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $producto->updated_at }}" readonly>
        </div>
    </div>
@endsection