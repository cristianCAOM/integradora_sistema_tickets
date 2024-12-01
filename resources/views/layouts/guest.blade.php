<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema de Tickets') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background-color: #000; /* Fondo negro */
            }
            .logo {
                width: 80px; /* Tamaño del logo */
                height: 80px; /* Tamaño del logo */
                margin-bottom: 20px; /* Espacio debajo del logo */
            }
            .container {
                background-color: #1F2937; /* Fondo gris oscuro */
                border-radius: 10px; /* Esquinas redondeadas */
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5); /* Sombra */
                padding: 30px; /* Relleno interior */
                width: 100%; /* Ancho completo */
                max-width: 400px; /* Ancho máximo */
                text-align: center; /* Centrar texto */
            }
            .title {
                font-size: 24px; /* Tamaño del título */
                font-weight: 600; /* Peso de la fuente */
                color: #FFFFFF; /* Color blanco */
                margin-bottom: 20px; /* Espacio inferior */
            }
            .description {
                color: #B0BEC5; /* Color gris claro */
                margin-bottom: 20px; /* Espacio inferior */
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="logo fill-current text-gray-500" /> --}}

                </a>
            </div>

            <div class="container"> <!-- Cambié el fondo a un gris oscuro -->
                <div class="title">Bienvenido </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
