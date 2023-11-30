@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Productos Eliminados</h1>
<hr />
<form action="{{ route('producto.restore') }}" method="POST">
    @csrf
    @method('PATCH')

    {{-- Mostrar la lista de productos eliminados con casillas de verificación --}}
    <table class="table table-hover table-bordered">
        <thead class="table-hover">
            <tr>
                <th></th>
                <th>#</th>
                <th>Cantidad</th>
                <th>Pago</th>
                <th>Estado</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productosEliminados as $producto)
            <tr>
                <td><input type="checkbox" name="productos[]" value="{{ $producto->id }}"></td>
                <td class="align-middle">{{ $producto->id }}</td>
                <td class="align-middle">{{ $producto->title }}</td>
                <td class="align-middle">{{ $producto->price }}</td>
                <td class="align-middle">{{ $producto->product_code }}</td>
                <td class="align-middle">{{ $producto->description }}</td>
                <!-- Otros detalles del pedido -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Restaurar Seleccionados</button>
</form>
@endsection