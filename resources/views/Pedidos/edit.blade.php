@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Edit Pedidos</h1>
<hr />
<form action="{{ route('Pedidos.update', $Pedidos->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")

    <div class="row mb-3">
        <div class="col">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" value="{{ $Pedidos->amount }}" class="form-control" placeholder="Amount">
            @error('amount')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <label for="price">Price:</label>
            <input type="text" name="price" value="{{ $Pedidos->price }}" class="form-control" placeholder="Price">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="status">Status:</label>
            <input type="text" name="status" value="{{ $Pedidos->status }}" class="form-control" placeholder="Status">
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <label for="description">Description:</label>
            <input type="text" name="description" value="{{ $Pedidos->description }}" class="form-control" placeholder="Description">
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label>Productos:</label>
            @foreach($productos as $producto)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="productos[]" value="{{ $producto->id }}" id="producto{{ $producto->id }}" {{ $productosAsociados->contains($producto->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="producto{{ $producto->id }}">Nombre: {{ $producto->name }} Código: {{$producto->product_code}}</label>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </div>
</form>

@endsection