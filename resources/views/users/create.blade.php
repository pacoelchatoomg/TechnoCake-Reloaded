@extends('layouts.app')
  
@section('title', 'Create pedido')
  
@section('contents')
    <h1 class="mb-0">Add pedido</h1>
    <hr />
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Nombre">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Correo Electrónico">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="password" class="form-control" placeholder="Contraseña">
            </div>

        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection