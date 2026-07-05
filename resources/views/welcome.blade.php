<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Collaborative Notes</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="text-center mt-5">

    <h1 class="display-3 mb-3">📝 Real-time Collaborative Notes</h1>

        <p class="lead mb-5">
            Aplikasi pencatatan kolaboratif berbasis Laravel Reverb dan WebSocket.
        </p>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg me-3 px-5">
                    Login
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">
                        Register
                    </a>
                @endif
            @endauth
        @endif

    </div>


</div>

</body>
</html>