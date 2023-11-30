@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Añadir Producto</h1>
<hr />
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <div class="form-group">
            <label for="inventory_id">Tipo de Producto:</label>
            <select name="inventory_id" class="form-control">
                @foreach($inventories as $inventory)
                <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- <div class="col">
            <input type="text" name="price" class="form-control" placeholder="Precio" value="{{ old('price') }}">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> -->
    </div>

    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_code" class="form-control" placeholder="Código" value="{{ old('product_code') }}">
            @error('product_code')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="Descripción" value="{{ old('description') }}">
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="Disponible" value="{{ old('disponible') }}">
            @error('disponible')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="pedido_id">Selecciona un Pedido:</label>
            <select name="pedido_id">
                @foreach($pedidos as $pedido)
                <option value="{{ $pedido->id }}">{{ $pedido->description }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
    </div>
</form>

@endsection