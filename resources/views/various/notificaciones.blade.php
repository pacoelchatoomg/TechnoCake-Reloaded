<!-- notificaciones.blade.php -->

@extends('layouts.app')  <!-- Ajusta según la estructura de tu layout -->
@section('title', 'Bienvenid@')
@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Lista de notificaciones</h1>
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
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @if($notifications->count() > 0)
        @foreach($notifications as $notification)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $notification->type }}</td>
            <td class="align-middle">{{ $notification->notifiable_type }}</td>
            <!--   -->
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="6">No hay notificaciones pendientes</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
