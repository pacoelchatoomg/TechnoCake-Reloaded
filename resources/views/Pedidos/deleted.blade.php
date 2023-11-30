@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Pedidos Eliminados</h1>
<hr />
<form action="{{ route('Pedidos.restore') }}" method="POST">
    @csrf
    @method('PATCH')

    {{-- Mostrar la lista de pedidos eliminados con casillas de verificación --}}
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
            @foreach($pedidosEliminados as $pedido)
            <tr>
                <td><input type="checkbox" name="pedidos[]" value="{{ $pedido->id }}"></td>
                <td class="align-middle">{{ $pedido->id }}</td>
                <td class="align-middle">{{ $pedido->amount }}</td>
                <td class="align-middle">{{ $pedido->price }}</td>
                <td class="align-middle">{{ $pedido->status }}</td>
                <td class="align-middle">{{ $pedido->description }}</td>
                <!-- Otros detalles del pedido -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Restaurar Seleccionados</button>
</form>
@endsection