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
            body {
                background-color: #1E3A8A; /* Fondo azul */
                color: white; /* Color del texto blanco */
                font-family: 'Figtree', sans-serif;
            }
            .card {
                background-color: white;
                color: black;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 1.5rem;
                margin: 1rem;
                text-align: center;
                width: 100%;
                max-width: 300px;
                cursor: pointer;
                transition: transform 0.2s;
            }
            .card:hover {
                transform: scale(1.05);
            }
            .card a {
                color: #1E3A8A; /* Color del enlace */
                text-decoration: none;
                font-weight: 600;
            }
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 2rem;
                min-height: 100vh;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
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
