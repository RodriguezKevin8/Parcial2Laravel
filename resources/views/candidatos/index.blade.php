<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-xl shadow-md py-6 px-4 text-white text-center">
            <h2 class="text-3xl font-extrabold tracking-tight">
                {{ __('Candidatos') }}
            </h2>
            <p class="mt-2 text-sm sm:text-base font-light text-blue-100">
                Aquí puedes ver quiénes han aplicado a tu vacante.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-8">
                    <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-8">
                        Candidatos para la vacante: <span class="text-indigo-600">{{ $vacante->titulo }}</span>
                    </h1>

                    @forelse ($vacante->candidatos as $candidato)
                        <div class="flex flex-col md:flex-row justify-between items-center bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4 shadow-sm">
                            <div class="text-center md:text-left">
                                <p class="text-lg font-semibold text-gray-800">{{ $candidato->user->name }}</p>
                                <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                <p class="text-xs text-gray-500 mt-1">Aplicó: {{ $candidato->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="mt-3 md:mt-0">
                                <a href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition"
                                    target="_blank" rel="noopener noreferrer">
                                    Ver CV
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-sm text-gray-600 py-6">No hay candidatos aún para esta vacante.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
