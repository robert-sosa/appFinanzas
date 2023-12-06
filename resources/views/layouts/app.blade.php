<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Corregir la ruta al archivo CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>App Finanzas</title>
</head>
<body>

    <nav class="navbar navbar-light bg-white shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo.png') }}" style="max-height: 70px;">
            </a>
            <div class="user-info">
                @auth
                    <span class="me-3">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link">Cerrar sesión</button>
                    </form>
                @else
                @endauth
            </div>
        </div>
    </nav>

    

    <div class="container">
        @yield('content')
    </div>
    

</body>
</html>
