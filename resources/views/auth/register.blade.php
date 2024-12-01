<x-guest-layout>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: #ffffff;
            color: #333;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .register-container h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #667eea;
        }

        .register-container label {
            color: #555;
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        .register-container input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .register-container input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
        }

        .register-container a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .register-container a:hover {
            text-decoration: underline;
        }

        .register-container button {
            background-color: #667eea;
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

        .register-container button:hover {
            background-color: #4c51bf;
            transform: scale(1.05);
        }

        .register-container .footer-text {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #555;
        }

        .register-container .footer-text a {
            color: #667eea;
        }
    </style>

    <div class="register-container">
        <h2>REGISTRARSE</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">{{ __('Nombre') }}</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Ingresa tu nombre"
                />
                <x-input-error :messages="$errors->get('name')" class="text-red-500" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email">{{ __('Correo') }}</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
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
                    autocomplete="new-password"
                    placeholder="Ingresa tu contraseña"
                />
                <x-input-error :messages="$errors->get('password')" class="text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">{{ __('Confirma Contraseña') }}</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirma tu contraseña"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-500" />
            </div>

            <!-- Submit Button -->
            <button type="submit">{{ __('Registrarse') }}</button>
        </form>

        <p class="footer-text">
            {{ __('¿Ya estás registrado?') }} <a href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
        </p>
    </div>
</x-guest-layout>
