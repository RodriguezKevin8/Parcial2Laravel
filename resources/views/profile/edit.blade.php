<x-app-layout>
<x-slot name="header">
    <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-xl shadow-md py-6 px-4 text-white text-center">
        <h2 class="text-3xl font-extrabold tracking-tight">
            {{ __('Mi Perfil') }}
        </h2>
        <p class="mt-2 text-sm sm:text-base font-light text-blue-100">
            Aquí puedes actualizar tu información personal, cambiar tu contraseña o eliminar tu cuenta.
        </p>
    </div>
</x-slot>


    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            {{-- Información del perfil --}}
            <div class="bg-white shadow-md rounded-lg border-l-4 border-indigo-500 p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">
                     Actualizar Información del Perfil
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Cambiar contraseña --}}
            <div class="bg-white shadow-md rounded-lg border-l-4 border-blue-500 p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">
                     Cambiar Contraseña
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Eliminar cuenta --}}
            <div class="bg-white shadow-md rounded-lg border-l-4 border-red-500 p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">
                    ⚠️ Eliminar Cuenta
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
