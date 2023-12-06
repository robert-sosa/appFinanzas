@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body text-center">
                    <h2 class="logo mb-4">LOGIN</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                    </form>

                    <div class="mt-3">
                        <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
                    </div>

                    @if(session('login_error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('login_error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
