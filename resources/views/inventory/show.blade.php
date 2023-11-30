@extends('layouts.app')

@section('title', '')

@section('contents')
<h1 class="mb-0">Detail inventory</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $inventory->name }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Precio</label>
        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $inventory->price }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Cantidad</label>
        <input type="text" name="product_code" class="form-control" placeholder="inventory Code" value="{{ $inventory->amount }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $inventory->description }}</textarea>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">productos Relacionados (últimos 10)</label>
        <div class="col">
            @if($inventory->productos->count() > 0)
            <table class="table table-hover table-bordered">
                <thead class="table-hover">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Código</th>
                        <th>Disponible desde el:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventory->productos as $producto)
                    <!-- <input class="form-control" name="productos[]" value="{{ $producto->id }}" id="producto{{ $producto->id }}" readonly> -->
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $producto->name }}</td>
                        <td class="align-middle">{{ $producto->price }}</td>
                        <td class="align-middle">{{ $producto->product_code }}</td>
                        <td class="align-middle">{{ $producto->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $inventory->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Modificado en</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $inventory->updated_at }}" readonly>
    </div>
</div>
@endsection