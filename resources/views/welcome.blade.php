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
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px;
            line-height: 1.6;
        }

        /* Navbar mejorado */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem 3rem;
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
            font-size: 1rem;
            transition: color 0.3s;
        }
        .navbar a:hover,
        .navbar a.active {
            color: #1e40af;
        }

        /* Sección de introducción */
        .hero-section {
            text-align: center;
            padding: 5rem 2rem;
            max-width: 900px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }
        .hero-section h1 {
            font-size: 3rem;
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
            width: 90%;
            padding: 3rem 2rem;
            margin: 2rem 0;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .section h2 {
            font-size: 2rem;
            color: #1e3a8a;
            text-align: center;
            margin-bottom: 1rem;
        }
        .section p {
            font-size: 1rem;
            color: #4b5563;
            text-align: justify;
            line-height: 1.8;
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
            <a href="#home" class="active">Inicio</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#ubicacion">Ubicación</a>
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registro</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Sección de introducción -->
    <div id="home" class="hero-section">
        <h1>Bienvenido a SGMobile</h1>
        <p>Tu solución integral para la gestión eficiente de soporte técnico en dispositivos móviles.</p>
    </div>

    <!-- Sección Nosotros -->
    <div id="nosotros" class="section">
        <h2>Sobre nosotros</h2>
        <p>En SGMobile, somos un equipo comprometido con la tecnología y la eficiencia en la gestión de soporte. Nuestra misión es ayudar a empresas de reparación de dispositivos móviles a optimizar sus procesos de servicio, para que puedan enfocarse en brindar una experiencia de calidad a sus clientes.</p>
    </div>

    <!-- Sección Ubicación -->
    <div id="ubicacion" class="section">
        <h2>Ubicación</h2>
        <p>Nos ubicamos en el corazón de la ciudad para estar más cerca de ti. Visítanos o contáctanos en línea, y descubre cómo podemos ayudarte a llevar tu negocio al siguiente nivel.</p>
    </div>

    <!-- Pie de página -->
    <footer>
        &copy; {{ date('Y') }} SGMobile. Todos los derechos reservados.
    </footer>
</body>
</html>
