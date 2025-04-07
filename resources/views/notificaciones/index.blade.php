<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-xl shadow-md py-6 px-4 text-white text-center">
            <h2 class="text-3xl font-extrabold tracking-tight">
                {{ __('Notificaciones') }}
            </h2>
            <p class="mt-2 text-sm sm:text-base font-light text-blue-100">
                Revisa las actualizaciones sobre tus vacantes y candidatos en tiempo real.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Mis Notificaciones</h1>

                    @forelse ($notificaciones as $notificacion)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 mb-4 shadow-sm flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                            <div>
                                <p class="text-gray-700">
                                    Tienes un nuevo candidato en:
                                    <span class="font-semibold text-indigo-600">{{ $notificacion->data['nombre_vacante'] }}</span>
                                </p>
                                <p class="text-sm text-gray-500 mt-1">
                                    Recibido {{ $notificacion->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div>
                                <a href="#"
                                    class="inline-block px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-md transition">
                                    Ver Candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600 py-6">No hay notificaciones nuevas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
