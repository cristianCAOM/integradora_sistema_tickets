<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a SGMultiplataforma</title>

    <!-- Fuentes y estilos -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans antialiased">

    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white dark:bg-gray-800 shadow-lg z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex space-x-4">
                    <a href="#home" class="text-gray-800 dark:text-gray-200 font-semibold hover:text-indigo-600">Inicio</a>
                    <a href="#nosotros" class="text-gray-800 dark:text-gray-200 font-semibold hover:text-indigo-600">Nosotros</a>
                    <a href="#ubicacion" class="text-gray-800 dark:text-gray-200 font-semibold hover:text-indigo-600">Ubicación</a>
                </div>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-800 dark:text-gray-200 font-semibold hover:text-indigo-600">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-800 dark:text-gray-200 font-semibold hover:text-indigo-600">Iniciar sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-gray-800 dark:text-gray-200 font-semibold hover:text-indigo-600">Registro</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Sección de introducción -->
    <section id="home" class="flex flex-col items-center justify-center min-h-screen bg-white dark:bg-gray-800 py-12">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-indigo-600 mb-4">Bienvenido a SGMultiplataforma</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">Tu solución integral para la gestión eficiente de soporte técnico en sistemas Multiplataformas.</p>
        </div>
    </section>

    <!-- Sección Nosotros -->
    <section id="nosotros" class="bg-gray-100 dark:bg-gray-900 py-12">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-indigo-600 mb-4">Sobre nosotros</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">En SGMultiplataforma, somos un equipo comprometido con la tecnología y la eficiencia en la gestión de soporte. Nuestra misión es ayudar a empresas de reparación de dispositivos móviles a optimizar sus procesos de servicio, para que puedan enfocarse en brindar una experiencia de calidad a sus clientes.</p>
        </div>
    </section>

    <!-- Sección Ubicación -->
    <section id="ubicacion" class="bg-white dark:bg-gray-800 py-12">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-indigo-600 mb-4">Ubicación</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">Nos ubicamos en el corazón de la ciudad para estar más cerca de ti. Visítanos o contáctanos en línea, y descubre cómo podemos ayudarte a llevar tu negocio al siguiente nivel.</p>
        </div>
    </section>
    <script src="https://app.sendstrap.com/scripts/js/social_button.js?id=4231&key=YQwlVpDoD3Kh4g9Va8YLemxoT8LRbjdMj0dpzB5P"></script>
    <!-- Pie de página -->
    <footer class="bg-gray-200 dark:bg-gray-900 py-4">
        <div class="text-center text-gray-600 dark:text-gray-400">
            &copy; {{ date('Y') }} SGMobile. Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>
