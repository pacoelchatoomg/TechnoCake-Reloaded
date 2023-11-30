@extends('layouts.app')

@section('title', '')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de Pedidos </h1>
    @if($pedidos->count() > 0)
    <a href="{{ route('Pedidos.exportarPedidos') }}" class="btn btn-primary">Descargar todos los Pedidos</a>
    @endif
    <a href="{{ route('Pedidos.create') }}" class="btn btn-primary">Añadir Pedidos</a>
    <a href="{{ route('Pedidos.deleted') }}" class="btn btn-primary">Restaurar Pedidos</a>
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
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Estatus</th>
            <th>Descripción</th>
            <th>Opción</th>
            <th>Productos</th>
        </tr>
    </thead>
    <tbody>+
        @if($pedidos->count() > 0)
        @foreach($pedidos as $pedido)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $pedido->amount }}</td>
            <td class="align-middle">{{ $pedido->price }}</td>
            <td class="align-middle">{{ $pedido->status }}</td>
            <td class="align-middle">{{ $pedido->description }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('Pedidos.show', $pedido->id) }}" type="button" class="btn btn-secondary">Detalles</a>
                    <a href="{{ route('Pedidos.edit', $pedido->id)}}" type="button" class="btn btn-warning">Editar</a>
                    <form action="{{ route('Pedidos.destroy', $pedido->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('¿Seguro de eliminar?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Eliminar</button>
                    </form>
                </div>
            </td>
            <td class="align-middle">
                @if($pedido->productos->count() > 0)
                <ul>
                    @foreach($pedido->productos as $producto)
                    <li>{{ $producto->name }}</li>
                    @endforeach
                </ul>
                @else
                <p>No hay productos asociados a este pedido.</p>
                @endif
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="7">Pedidos no encontrados</td>
        </tr>
        @endif


    </tbody>
</table>
@endsection