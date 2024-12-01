<x-guest-layout>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #38b2ac 0%, #68d391 100%);
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            color: #333;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #38b2ac;
        }

        .login-container label {
            color: #555;
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        .login-container input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .login-container input:focus {
            outline: none;
            border-color: #38b2ac;
            box-shadow: 0 0 5px rgba(56, 178, 172, 0.5);
        }

        .login-container a {
            color: #38b2ac;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .login-container button {
            background-color: #38b2ac;
            color: #ffffff;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .login-container button:hover {
            background-color: #2c7a7b;
            transform: scale(1.05);
        }

        .login-container .google-login {
            background-color: #db4437;
            color: #ffffff;
            margin-top: 1rem;
        }

        .login-container .google-login:hover {
            background-color: #c33d2e;
        }

        .login-container .footer-text {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #555;
        }

        .login-container .footer-text a {
            color: #38b2ac;
        }
    </style>

    <div class="login-container">
        <h2>INICIAR SESIÓN</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">{{ __('Correo') }}</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    placeholder="Ingresa tu email"
                />
                <x-input-error :messages="$errors->get('email')" class="text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <label for="password">{{ __('Contraseña') }}</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    placeholder="Ingresa tu contraseña"
                />
                <x-input-error :messages="$errors->get('password')" class="text-red-500" />
            </div>

            <!-- Remember Me -->
            <div>
                <label>
                    <input type="checkbox" name="remember">
                    {{ __('Recordarme') }}
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit">{{ __('Iniciar sesión') }}</button>
        </form>

        <!-- Google Login -->
        <button class="google-login">
            <a href="{{ route('auth.google') }}">{{ __('Iniciar sesión con Google') }}</a>
        </button>

        <p class="footer-text">
            ¿No tienes cuenta? <a href="{{ route('register') }}">{{ __('Regístrate') }}</a>
        </p>
    </div>
</x-guest-layout>
