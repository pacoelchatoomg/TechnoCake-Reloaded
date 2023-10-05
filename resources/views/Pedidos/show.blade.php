@extends('layouts.app')
  
@section('title', 'Show Pedidos')
  
@section('contents')
    <h1 class="mb-0">Detail Pedidos</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Cantidad</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $Pedidos->amount }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Precio</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $Pedidos->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Estatus</label>
            <input type="text" name="product_code" class="form-control" placeholder="Pedidos Code" value="{{ $Pedidos->status }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $Pedidos->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Creado en</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $Pedidos->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Modificado en</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $Pedidos->updated_at }}" readonly>
        </div>
    </div>
@endsection