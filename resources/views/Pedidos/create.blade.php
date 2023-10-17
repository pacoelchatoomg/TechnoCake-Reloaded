@extends('layouts.app')
  
@section('title', 'Create pedido')
  
@section('contents')
    <h1 class="mb-0">Add pedido</h1>
    <hr />
    <form action="{{ route('Pedidos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="status" class="form-control" placeholder="Status" value="{{ old('status') }}">
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="description" class="form-control" placeholder="Description" value="{{ old('description') }}">
                @error('description')
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