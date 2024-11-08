<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a SGMobile</title>

    <!-- Fuentes y estilos -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        /* Configuración de estilo global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Figtree', sans-serif;
            color: #333;
            background-color: #f9fafb;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px; /* espacio para el navbar */
            line-height: 1.6;
        }

        /* Navbar minimalista */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }
        .navbar a {
            color: #333;
            margin: 0 1rem;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: #1e40af; /* azul más oscuro */
        }
        .navbar a.active {
            color: #1e40af;
        }

        /* Sección de introducción */
        .hero-section {
            text-align: center;
            padding: 4rem 1rem;
            max-width: 800px;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 1rem;
        }
        .hero-section p {
            font-size: 1.2rem;
            color: #4b5563;
            margin-bottom: 2rem;
        }

        /* Estilo de cada sección */
        .section {
            max-width: 800px;
            width: 100%;
            padding: 3rem 1rem;
            margin: 2rem 0;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #1e3a8a;
            text-align: center;
        }
        .section p {
            font-size: 1rem;
            color: #4b5563;
            text-align: justify;
        }

        /* Estilo del pie de página */
        footer {
            width: 100%;
            padding: 1rem;
            text-align: center;
            color: #4b5563;
            background-color: #e5e7eb;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div>
            <a href="#home" class="active">Home</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#ubicacion">Ubicación</a>
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Sección de introducción -->
    <div id="home" class="hero-section">
        <h1>Bienvenido a SGMobile</h1>
    </div>

    <!-- Sección Nosotros -->
    <div id="nosotros" class="section">
        <h2>Nosotros</h2>
        <p>En SGMobile, somos un equipo apasionado por la tecnología y la eficiencia en la gestión de soporte técnico. Nos especializamos en brindar soluciones personalizadas para ayudar a empresas de reparación de dispositivos móviles a gestionar y resolver problemas de manera rápida y efectiva.</p>
    </div>

    <!-- Sección Ubicación -->
    <div id="ubicacion" class="section">
        <h2>Ubicación</h2>
        <p>Visítanos en nuestra sede ubicada en el corazón de la ciudad o contáctanos a través de nuestros canales en línea. Estamos aquí para brindarte el mejor soporte posible.</p>
    </div>
    <!-- Pie de página -->

    <footer>
        &copy; {{ date('Y') }} SGMobile. Todos los derechos reservados.
    </footer>
</body>
</html>
