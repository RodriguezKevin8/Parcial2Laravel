<div>
    <livewire:filtrar-vacantes />

    <div class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h3 class="mb-12 text-4xl font-extrabold text-indigo-600 text-center">
                Nuestras Vacantes Disponibles
            </h3>

            <div class="bg-white divide-y divide-blue-100 rounded-lg shadow-md p-6">
                @forelse ($vacantes as $vacante)
                    <div class="py-6 md:flex md:justify-between md:items-center border-l-4 border-indigo-500 pl-4">
                        <div class="md:flex-1 md:pr-10">
                            <a href="{{ route('vacantes.show', $vacante->id) }}"
                               class="text-2xl sm:text-3xl font-bold text-gray-800 hover:text-indigo-600 transition">
                                {{ $vacante->titulo }}
                            </a>

                            <p class="mt-2 text-base text-blue-800 font-semibold flex items-center gap-2">
                                 {{ $vacante->empresa }}
                            </p>

                            <p class="text-sm font-semibold text-indigo-600 mt-1">
                                 {{ $vacante->categoria->categoria }}
                            </p>

                            <p class="text-sm text-blue-700 mt-1 font-medium">
                                 {{ $vacante->salario->salario }}
                            </p>

                            <p class="text-xs font-bold text-gray-600 mt-3 flex items-center gap-1">
                                 Último día para postularse:
                                <span class="font-normal text-gray-700">
                                    {{ $vacante->ultimo_dia->format('d/m/Y') }}
                                </span>
                            </p>
                        </div>

                        <div class="mt-6 md:mt-0">
                            <a href="{{ route('vacantes.show', $vacante->id) }}"
                               class="inline-block px-6 py-3 bg-gradient-to-r from-indigo-500 to-blue-600 text-white text-sm font-bold uppercase rounded-lg shadow hover:from-indigo-600 hover:to-blue-700 transition">
                                Ver Vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-6 text-center text-gray-600 text-base">No hay vacantes aún.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
