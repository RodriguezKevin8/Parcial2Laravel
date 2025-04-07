<div>
    <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 border-b border-gray-200 md:flex md:justify-between md:items-center hover:bg-gray-50 transition">
                <!-- Info de la vacante -->
                <div class="leading-6">
                    <a href="{{ route('vacantes.show', $vacante) }}"
                        class="text-xl font-bold text-indigo-700 hover:underline block">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm font-semibold text-gray-700">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>

                <!-- Acciones -->
                <div class="flex flex-col gap-3 mt-5 md:mt-0 md:flex-row items-stretch">
                    <a href="{{ route('candidatos.index', $vacante) }}"
                        class="px-4 py-2 text-xs font-semibold text-white uppercase rounded-lg bg-indigo-600 hover:bg-indigo-700 text-center">
                        {{ $vacante->candidatos->count() }} Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="px-4 py-2 text-xs font-semibold text-white uppercase rounded-lg bg-blue-600 hover:bg-blue-700 text-center">
                        Editar
                    </a>
                    <button wire:click="$dispatch('alerta_eliminar', { id: {{ $vacante->id }} })"
                        class="px-4 py-2 text-xs font-semibold text-white uppercase rounded-lg bg-red-600 hover:bg-red-700 text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-6 text-sm text-center text-gray-600">No hay vacantes para mostrar.</p>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alerta_eliminar', (event) => {
                Swal.fire({
                    title: "¿Eliminar Vacante?",
                    text: "No se podrá recuperar",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const { id } = event;
                        Livewire.dispatch('elminar_vacante', { id });

                        Swal.fire({
                            title: "¡Se eliminó la vacante!",
                            text: "Eliminado correctamente",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush
