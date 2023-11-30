@extends('layouts.app')

@section('title', '')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de productos</h1>
    @if($productos->count() > 0)
    <a href="{{ route('producto.exportarProductos') }}" class="btn btn-primary">Descargar todos los Productos</a>
    @endif
    <a href="{{ route('producto.create') }}" class="btn btn-primary">Añadir producto</a>
    <a href="{{ route('producto.deleted') }}" class="btn btn-primary">Restaurar Productos</a>
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
            <th>Nombre</th>
            <th>Precio</th>
            <th>Código de producto</th>
            <th>Disponible<br>(0=no, 1=sí)</th>
            <th>Acción</th>
            <th>Pedidos</th>
        </tr>
    </thead>
    <tbody>+
        @if($productos->count() > 0)
        @foreach($productos as $producto)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $producto->name }}</td>
            <td class="align-middle">{{ $producto->price }}</td>
            <td class="align-middle">{{ $producto->product_code }}</td>
            <td class="align-middle">{{ $producto->disponible }}</td>
            
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('producto.show', $producto->id) }}" type="button" class="btn btn-secondary">Detalles</a>
                    <a href="{{ route('producto.edit', $producto->id)}}" type="button" class="btn btn-warning">Editar</a>
                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('¿Seguro de eliminar?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Eliminar</button>
                    </form>
                </div>
            </td>
            <!--   -->
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="6">Producto no encontrado</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection