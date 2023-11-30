@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Edit producto</h1>
<hr />
<form action="{{ route('producto.update',  $producto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" value="{{ $producto->name}}" class="form-control" placeholder="Name">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="price" value="{{ $producto->price}}" class="form-control" placeholder="Price">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_code" value="{{ $producto->product_code}}" class="form-control" placeholder="product Code">
            @error('product_code')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="description" value="{{ $producto->description}}" class="form-control" placeholder="Description"></input>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="$producto->pedido_id">Selecciona un Pedido:</label>
            <select name="pedido_id">
                @foreach($pedidos as $pedido)
                <option value="{{ $pedido->id }}" {{ $producto->pedido_id == $pedido->id ? 'selected' : '' }}>
                    {{ $pedido->description }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </div>
</form>
@endsection