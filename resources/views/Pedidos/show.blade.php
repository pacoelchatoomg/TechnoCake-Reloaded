@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Detail Pedidos</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Cantidad</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $Pedido->amount }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Precio</label>
        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $Pedido->price }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Estatus</label>
        <input type="text" name="product_code" class="form-control" placeholder="Pedidos Code" value="{{ $Pedido->status }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $Pedido->description }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Productos Relacionados (últimos 10)</label>
        <div class="col">
         @if($Pedido->productos->count() > 0)    
            <table class="table table-hover table-bordered">
                <thead class="table-hover">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Pedido->productos as $producto)
                    <!-- <input class="form-control" name="productos[]" value="{{ $producto->id }}" id="producto{{ $producto->id }}" readonly> -->
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $producto->name }}</td>
                        <td class="align-middle">{{ $producto->price }}</td>
                        <td class="align-middle">{{ $producto->product_code }}</td>
                        <td class="align-middle">{{ $producto->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('Pedidos.exportarProductos', $Pedido) }}" class="btn btn-primary">Descargar Todos los Prod <strong> Relacionados </strong> en Excel</a>
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
        <label class="form-label">Creado en</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $Pedido->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Modificado en</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $Pedido->updated_at }}" readonly>
    </div>
</div>
@endsection