<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-xl shadow-md py-6 px-4 text-white text-center relative">
            <h2 class="text-3xl font-extrabold tracking-tight">
                {{ __('Mis Vacantes') }}
            </h2>
            <p class="mt-2 text-sm sm:text-base font-light text-blue-100">
                Administra y edita tus vacantes publicadas. También puedes crear nuevas ofertas para atraer talento.
            </p>
            <a href="{{ route('vacantes.create') }}"
                class="absolute top-4 right-4 bg-white text-indigo-600 font-semibold px-4 py-2 text-sm rounded-md shadow hover:bg-gray-100 transition">
                + Crear Vacante
            </a>
        </div>
    </x-slot>


    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="bg-green-100 border border-green-600 text-green-700 text-sm font-medium rounded-md p-3 mb-6">
                    {{ session('mensaje') }}
                </div>
            @endif

            <!-- Contenedor de Livewire -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <livewire:mostrar-vacantes />
            </div>
        </div>
    </div>
</x-app-layout>
