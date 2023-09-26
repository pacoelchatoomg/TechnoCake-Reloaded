@extends('layouts.app')
  
@section('title', 'Edit producto')
  
@section('contents')
    <h1 class="mb-0">Edit producto</h1>
    <hr />
    <form action="{{ route('producto.update',  '$producto') }}" method="POST">
        @csrf
        @method("PATCH")

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" value="{{ $producto->title}}" class="form-control" placeholder="Title">
            </div>
            <div class="col">
                <input type="text" name="price" value="{{ $producto->price}}" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" value="{{ $producto->product_code}}" class="form-control" placeholder="product Code">
            </div>
            <div class="col">
                <textarea class="form-control" name="description" value="{{ $producto->description}}" placeholder="Description"></textarea>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection