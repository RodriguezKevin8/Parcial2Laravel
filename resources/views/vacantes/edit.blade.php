<x-app-layout>
<x-slot name="header">
    <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-xl shadow-md py-6 px-4 text-white text-center">
        <h2 class="text-3xl font-extrabold tracking-tight">
            {{ __('Editar Vacante') }}
        </h2>
        <p class="mt-2 text-sm sm:text-base font-light text-blue-100">
            Modifica los datos de tu vacante para atraer a los mejores candidatos.
        </p>
    </div>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold text-center my-10">Editar Vacante: {{$vacante->titulo}}</h1>
                   <div class="md:flex md:justify-center p-6">
                        <livewire:editar-vacante :vacante="$vacante"/>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
