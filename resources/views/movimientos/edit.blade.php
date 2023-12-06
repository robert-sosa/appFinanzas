<!-- resources/views/dashboard/movimientos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Movimiento</h2>
        <form action="{{ route('movimientos.update', $movimiento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campos del formulario para editar -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="text" class="form-control" id="fecha" name="fecha" value="{{ $movimiento->fecha }}">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $movimiento->categoria }}">
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $movimiento->cantidad }}">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $movimiento->descripcion }}</textarea>
            </div>

            <!-- Agrega más campos según tu modelo -->

            <button type="submit" class="btn btn-primary">Actualizar Movimiento</button>
        </form>
    </div>
@endsection
