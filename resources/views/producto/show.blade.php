@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Detalles del Producto</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Nombre del producto</label>
        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $producto->name }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Precio</label>
        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $producto->price }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Codigo</label>
        <input type="text" name="product_code" class="form-control" placeholder="producto Code" value="{{ $producto->product_code }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Descripcion</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $producto->description }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Pedidos Relacionados (últimos 10)</label>
        <div class="col">
        @if($pedidos->count() > 0)
            <table class="table table-hover table-bordered">
                <thead class="table-hover">
                    <tr>
                        <th>#</th>
                        <th>Cantidad</th>
                        <th>Pago</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <!-- <input class="form-control" name="pedidos[]" value="{{ $pedido->id }}" id="pedido{{ $pedido->id }}" readonly> -->
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $pedido->amount }}</td>
                        <td class="align-middle">{{ $pedido->price }}</td>
                        <td class="align-middle">{{ $pedido->status }}</td>
                        <td class="align-middle">{{ $pedido->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('producto.exportarPedidos', $producto) }}" class="btn btn-primary">Descargar Todos los Pedidos <strong> Relacionados </strong> en Excel</a>
            @else
            <tr>
                <td class="text-center" colspan="7">No hay Productos asociados</td>
            </tr>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Fecha de creacion</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $producto->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Fecha de actualizacion</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $producto->updated_at }}" readonly>
    </div>
</div>

@endsection