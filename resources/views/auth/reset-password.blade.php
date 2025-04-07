<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">

            <!-- Sección izquierda: Mensaje motivador -->
            <div class="hidden md:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-10 relative">
                <div class="z-10 text-center">
                    <h2 class="text-3xl font-bold mb-4">¡Nuevo comienzo!</h2>
                    <p class="text-sm text-indigo-100">Establece una nueva contraseña para recuperar el acceso a tu cuenta.</p>
                </div>
                <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')]"></div>
            </div>

            <!-- Sección derecha: Formulario -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Restablecer Contraseña</h2>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                    @csrf

                    <!-- Token oculto -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-600" />
                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="email"
                            name="email"
                            :value="old('email', $request->email)"
                            required
                            autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Nueva contraseña')" class="text-sm text-gray-600" />
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Confirmación -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="text-sm text-gray-600" />
                        <x-text-input id="password_confirmation"
                            class="block mt-1 w-full rounded-md border border-gray-300 bg-gray-100 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:outline-none"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Botón -->
                    <div class="flex justify-end">
                        <x-primary-button class="py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-md">
                            {{ __('Restablecer Contraseña') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
