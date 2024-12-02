<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@laravelPWA
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a SGMultiplataforma</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Estilos -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f9fafb;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
            padding: 0.5rem 1rem;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar-logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: #38b2ac;
        }

        .navbar-links {
            display: flex;
            gap: 1rem;
        }

        .navbar-links a {
            color: #333;
            font-weight: 600;
            text-decoration: none;
            padding: 0.5rem 0.75rem;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-links a:hover {
            background-color: #38b2ac;
            color: #ffffff;
        }

        .navbar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #38b2ac;
        }

        .navbar-links.responsive {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .navbar-links {
                display: none;
            }

            .navbar-toggle {
                display: block;
            }
        }

        /* Secciones */
        .section {
            padding: 4rem 2rem;
            text-align: center;
        }

        .section h1, .section h2 {
            color: #38b2ac;
            margin-bottom: 1rem;
        }

        .section p {
            color: #555;
            font-size: 1rem;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }

        .hero {
            background: linear-gradient(135deg, #38b2ac 0%, #68d391 100%);
            color: #ffffff;
            padding: 15rem 2rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 600;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .button {
            display: inline-block;
            background-color: #ffffff;
            color: #38b2ac;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin-top: 1.5rem;
        }

        .button:hover {
            background-color: #38b2ac;
            color: #ffffff;
        }

        .footer {
            background-color: #f1f5f9;
            color: #555;
            text-align: center;
            padding: 2rem;
        }

        iframe {
            border: 0;
            border-radius: 10px;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">SGMultiplataforma</div>
            <div class="navbar-links" id="navbar-links">
                <a href="#home">Inicio</a>
                <a href="#nosotros">Nosotros</a>
                <a href="#ubicacion">Ubicación</a>
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
            <div class="navbar-toggle" id="navbar-toggle">&#9776;</div>
        </div>
    </nav>

    <!-- Script para el menú hamburguesa -->
    <script>
        const toggleButton = document.getElementById('navbar-toggle');
        const navbarLinks = document.getElementById('navbar-links');

        toggleButton.addEventListener('click', () => {
            navbarLinks.classList.toggle('responsive');
        });
    </script>
    
    <!-- Hero Section -->
    <section id="home" class="hero">
        <h1>Bienvenido a SGMultiplataforma</h1>
        <p>La solución integral para gestionar soporte técnico de manera rápida y eficiente.</p>
        <a href="#nosotros" class="button">Conoce más</a>
    </section>

    <!-- Sobre Nosotros -->
    <section id="nosotros" class="section">
        <h2>Sobre nosotros</h2>
        <p>En SGMultiplataforma, ayudamos a empresas de reparación de dispositivos móviles a optimizar sus procesos de soporte. Nuestra meta es que te concentres en lo que importa: ofrecer un servicio de calidad a tus clientes.</p>
    </section>

    <!-- Ubicación -->
    <section id="ubicacion" class="section">
        <h2>Ubicación</h2>
        <p>Visítanos en el corazón de la ciudad o contáctanos en línea. Estamos listos para llevar tu negocio al siguiente nivel.</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29907.48902233688!2d-97.34578283948737!3d20.447272837844565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85da443d13abec21%3A0x3cead482c2cf9f1e!2sPapantla%20de%20Olarte%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1732654210468!5m2!1ses-419!2smx" width="600" height="450" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <!-- Footer -->
    <footer class="footer">
        &copy; {{ date('Y') }} SGMultiplataforma. Todos los derechos reservados.
    </footer>
    <script src="https://app.sendstrap.com/scripts/js/social_button.js?id=4231&key=YQwlVpDoD3Kh4g9Va8YLemxoT8LRbjdMj0dpzB5P"></script>

</body>
</html>
