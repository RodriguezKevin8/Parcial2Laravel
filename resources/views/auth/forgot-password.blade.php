<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">

            <!-- Sección izquierda: Mensaje motivador -->
            <div class="hidden md:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-10 relative">
                <div class="z-10 text-center">
                    <h2 class="text-3xl font-bold mb-4">¿Problemas para ingresar?</h2>
                    <p class="text-sm text-indigo-100">No te preocupes, te ayudaremos a recuperar el acceso a tu cuenta.</p>
                </div>
                <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')]"></div>
            </div>

            <!-- Sección derecha: Formulario -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Recuperar Contraseña</h2>

                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('¿Olvidaste tu password? Coloca tu email de registro y te enviaremos un enlace para que puedas crear uno nuevo.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
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
                            autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Enlaces -->
                    <div class="flex justify-between text-sm text-gray-600">
                        <x-link :href="route('register')" class="hover:underline">Crear una cuenta</x-link>
                        <x-link :href="route('login')" class="text-indigo-600 hover:underline">Iniciar sesión</x-link>
                    </div>

                    <!-- Botón -->
                    <x-primary-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 text-white uppercase text-sm rounded-md">
                        {{ __('Enviar enlace de recuperación') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
