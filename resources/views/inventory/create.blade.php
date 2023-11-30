@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Add pedido</h1>
<hr />
<form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label for="image">Imagen:</label>
            <input type="file" name="image" accept="images/*">
        </div>
        <div class="col">
            <input type="text" name="amount" class="form-control" placeholder="Cantidad" value="{{ old('amount') }}">
            @error('amount')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="description" class="form-control" placeholder="Description" value="{{ old('description') }}">
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" name="price" class="form-control" placeholder="Precio" value="{{ old('price') }}">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection