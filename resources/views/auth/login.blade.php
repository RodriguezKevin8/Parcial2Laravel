<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">

            <!-- Sección izquierda: Bienvenida -->
            <div class="hidden md:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-10 relative">
                <div class="z-10">
                    <h2 class="text-3xl font-bold mb-4">¡Bienvenido de nuevo!</h2>
                    <p class="text-sm text-indigo-100">Inicia sesión con tu cuenta existente y continúa donde lo dejaste.</p>
                </div>
                <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')]"></div>
            </div>

            <!-- Sección derecha: Login -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Iniciar Sesión</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-600" />
                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-600" />
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Remember Me y enlace -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ms-2 text-gray-600">Recordarme</span>
                        </label>
                        <x-link :href="route('password.request')" class="text-indigo-600 hover:underline">
                            ¿Olvidaste tu password?
                        </x-link>
                    </div>

                    <!-- Botón -->
                    <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 text-white uppercase text-sm rounded-md">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>

                    <!-- Registro -->
                    <p class="text-sm text-center text-gray-600 mt-2">
                        ¿No tienes una cuenta?
                        <x-link :href="route('register')" class="text-indigo-600 hover:underline">Crear una</x-link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
