<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">

            <!-- Sección izquierda: Mensaje ilustrativo -->
            <div class="hidden md:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-10 relative">
                <div class="z-10 text-center">
                    <h2 class="text-3xl font-bold mb-4">¡Verifica tu correo!</h2>
                    <p class="text-sm text-indigo-100">Para poder usar tu cuenta, revisa tu bandeja de entrada y haz clic en el enlace de verificación.</p>
                </div>
                <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/graphy.png')]"></div>
            </div>

            <!-- Sección derecha: Acción -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Confirmación de Email</h2>

                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('Es necesario confirmar tu cuenta antes de continuar. Revisa tu email y presiona sobre el enlace de confirmación.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        {{ __('Hemos enviado un nuevo email de confirmación a la cuenta registrada.') }}
                    </div>
                @endif

                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <!-- Botón reenviar -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <x-primary-button class="py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-md">
                            {{ __('Enviar Email de Confirmación') }}
                        </x-primary-button>
                    </form>

                    <!-- Cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Cerrar Sesión') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
