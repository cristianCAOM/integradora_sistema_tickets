<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Fondo y estilo general */
        body {
            background-color: #1E3A8A;
            color: white;
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Contenedor de tarjetas */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            text-align: center;
        }

        /* Tarjeta estilizada */
        .card {
            background-color: white;
            color: #1E3A8A;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 1rem 2rem;
            margin: 1rem;
            width: 100%;
            max-width: 200px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Hover de la tarjeta */
        .card:hover {
            transform: translateY(-5px);
            background-color: #E0E7FF;
            color: #1E3A8A;
        }

        /* Sombra en el botón */
        .card:active {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(0.98);
        }
    </style>
</head>
<body class="antialiased">
    <div class="container">
        <h1 style="margin-bottom: 2rem;">Sistema de Ticket SGMobile</h1>

        @if (Route::has('login'))
            @auth
                <button class="card" onclick="window.location.href='{{ url('/dashboard') }}'">
                    Dashboard
                </button>
            @else
                <button class="card" onclick="window.location.href='{{ route('login') }}'">
                    Log in
                </button>
                @if (Route::has('register'))
                    <button class="card" onclick="window.location.href='{{ route('register') }}'">
                        Register
                    </button>
                @endif
            @endauth
        @endif
    </div>
</body>
</html>
