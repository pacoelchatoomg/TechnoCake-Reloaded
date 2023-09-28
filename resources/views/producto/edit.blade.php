@extends('layouts.app')
  
@section('title', 'Edit producto')
  
@section('contents')
    <h1 class="mb-0">Edit producto</h1>
    <hr />
    <form action="{{ route('producto.update',  $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        dd($producto)
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
                <input type="text" name="description" value="{{ $producto->description}}" class="form-control" placeholder="Description"></input>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection