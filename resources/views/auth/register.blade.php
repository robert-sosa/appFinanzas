@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body text-center">
                    <h2 class="logo mb-4">REGISTRARSE</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </form>

                    <div class="mt-3">
                        <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
