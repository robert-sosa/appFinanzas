<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <!-- Cuadro moderno de ingresos -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body bg-success text-white">
                        <h5 class="card-title">Ingresos</h5>
                        <p class="card-text">$ {{ number_format($sumaIngresos, 0, ',', '.') }} COP</p>
                    </div>
                </div>
            </div>

            <!-- Cuadro moderno de gastos -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <h5 class="card-title">Gastos</h5>
                        <p class="card-text">$ {{ number_format($sumaGastos, 0, ',', '.') }} COP</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <a href="{{ route('movimientos.create') }}" class="btn btn-success">Nuevo Movimiento</a>
        </div>

        <!-- Lista de movimientos -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th> <!-- Agregado -->
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr class="{{ $movimiento->tipo === 'Gasto' ? 'table-danger' : 'table-success' }}">
                        <td>{{ $movimiento->fecha }}</td>
                        <td>{{ $movimiento->categoria }}</td>
                        <td>$ {{ number_format($movimiento->cantidad, 0, ',', '.') }}</td>
                        <td>{{ $movimiento->descripcion }}</td>
                        <td>{{ ucfirst($movimiento->tipo) }}</td>
                        <td>
                            <!-- Botones para modificar y eliminar -->
                            <a href="{{ route('movimientos.edit', $movimiento->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('movimientos.destroy', $movimiento->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Incluir scripts de DataTables y Buttons -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Botones y exportación de DataTables -->
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"></script>

<!-- Inicializar DataTables -->
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

@endsection
