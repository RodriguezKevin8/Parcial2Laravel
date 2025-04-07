<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">

            <!-- Sección izquierda: Bienvenida -->
            <div class="hidden md:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-10 relative">
                <div class="z-10">
                    <h2 class="text-3xl font-bold mb-4">¡Únete a nosotros!</h2>
                    <p class="text-sm text-indigo-100">Crea una cuenta para encontrar o publicar empleos fácilmente.</p>
                </div>
                <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')]"></div>
            </div>

            <!-- Sección derecha: Registro -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Crear Cuenta</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-4" novalidate>
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre')" class="text-sm text-gray-600" />
                        <x-text-input id="name" class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-600" />
                        <x-text-input id="email" class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Rol -->
                    <div>
                        <x-input-label for="rol" :value="__('¿Qué tipo de cuenta deseas?')" class="text-sm text-gray-600" />
                        <select name="rol" id="rol"
                            class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-sm focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                            <option value="">-- Selecciona un rol --</option>
                            <option value="1">Developer - Obtener Empleo</option>
                            <option value="2">Recruiter - Publicar Empleo</option>
                        </select>
                        <x-input-error :messages="$errors->get('rol')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-600" />
                        <x-text-input id="password" class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Confirmar Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar Password')" class="text-sm text-gray-600" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Enlaces -->
                    <div class="flex justify-between text-sm text-gray-600">
                        <x-link :href="route('password.request')" class="hover:underline">¿Olvidaste tu password?</x-link>
                        <x-link :href="route('login')" class="text-indigo-600 hover:underline">Ya tengo una cuenta</x-link>
                    </div>

                    <!-- Botón -->
                    <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 text-white uppercase text-sm rounded-md">
                        {{ __('Registrarse') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
