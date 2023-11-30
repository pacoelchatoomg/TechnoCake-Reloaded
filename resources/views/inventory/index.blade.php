@extends('layouts.app')
  
@section('title', '')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Lista de inventory </h1>
        <a href="{{ route('inventory.create') }}" class="btn btn-primary">Añadir inventory</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Opción</th>
            </tr>
        
        </thead>
        <tbody>+
            @if($inventory->count() > 0)
                @foreach($inventory as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle"><img src="{{ asset('storage/' . $rs->image) }}" alt="Imagen del Inventario" style="height: 100px;"></td>
                        <td class="align-middle">{{ $rs->amount }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        @if($rs->stock = 0) 
                        <td class="align-middle">N/A</td>
                        @else
                        <td class="align-middle">Disponible</td>
                        @endif
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('inventory.show', $rs->id) }}" type="button" class="btn btn-secondary">Detalles</a>
                                <a href="{{ route('inventory.edit', $rs->id)}}" type="button" class="btn btn-warning">Editar</a>
                                <form action="{{ route('inventory.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('¿Seguro de eliminar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">inventory no encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection