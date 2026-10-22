@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Productos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->descripcion }}</td>
                    <td>${{ $p->precio }}</td>
                    <td>{{ $p->stock }}</td>
                </tr>
            @empty
                <tr><td colspan="5">No hay productos registrados</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection