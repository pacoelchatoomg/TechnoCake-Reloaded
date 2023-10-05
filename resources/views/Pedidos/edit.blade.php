@extends('layouts.app')
  
@section('title', 'Edit Pedidos')
  
@section('contents')
    <h1 class="mb-0">Edit Pedidos</h1>
    <hr />
    <form action="{{ route('Pedidos.update',  $Pedidos->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        dd($Pedidos)
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" value="{{ $Pedidos->amount}}" class="form-control" placeholder="Amount">
            </div>
            <div class="col">
                <input type="text" name="price" value="{{ $Pedidos->price}}" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" value="{{ $Pedidos->status}}" class="form-control" placeholder="Status">
            </div>
            <div class="col">
                <input type="text" name="description" value="{{ $Pedidos->description}}" class="form-control" placeholder="Description"></input>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection