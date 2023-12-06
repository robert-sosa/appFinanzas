<!-- resources/views/movimientos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nuevo Movimiento</h2>
        <form method="POST" action="{{ route('movimientos.store') }}">
            @csrf
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" class="form-control" required>
                    <option value="Ingreso">Ingreso</option>
                    <option value="Gasto">Gasto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad') ? number_format(old('cantidad'), 0, ',', '.') : '' }}" placeholder="Ingrese la cantidad">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
