<div class="p-6 sm:p-10 bg-white shadow-md rounded-lg">
    <!-- Título de la vacante -->
    <div class="mb-8">
        <h3 class="text-3xl font-extrabold text-gray-800 mb-4">
            {{ $vacante->titulo }}
        </h3>

        <!-- Información resumida -->
        <div class="p-6 grid md:grid-cols-2 gap-6 bg-gray-50 rounded-lg shadow-sm">
            <p class="text-sm text-gray-700">
                <span class="font-semibold uppercase text-xs text-gray-600 block">Empresa</span>
                {{ $vacante->empresa }}
            </p>
            <p class="text-sm text-gray-700">
                <span class="font-semibold uppercase text-xs text-gray-600 block">Último día para postularse</span>
                {{ $vacante->ultimo_dia->format('d, M, Y') }}
            </p>
            <p class="text-sm text-gray-700">
                <span class="font-semibold uppercase text-xs text-gray-600 block">Categoría</span>
                {{ $vacante->categoria->categoria }}
            </p>
            <p class="text-sm text-gray-700">
                <span class="font-semibold uppercase text-xs text-gray-600 block">Salario</span>
                {{ $vacante->salario->salario }}
            </p>
        </div>
    </div>

    <!-- Imagen + Descripción -->
    <div class="grid md:grid-cols-6 gap-6 items-start">
        <div class="md:col-span-2">
            <img class="rounded-lg shadow-sm"
                src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen vacante de ' . $vacante->titulo }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Descripción del Puesto</h2>
            <p class="text-gray-700 leading-relaxed">{{ $vacante->descripcion }}</p>
        </div>
    </div>

    <!-- Invitación a registrarse -->
    @guest
        <div class="mt-8 p-6 border-2 border-dashed border-indigo-300 text-center rounded-lg bg-indigo-50">
            <p class="text-sm text-gray-700">
                ¿Deseas aplicar a esta vacante?
                <a class="font-semibold text-indigo-600 hover:underline" href="{{ route('register') }}">
                    Obtén una cuenta y aplica a esta y muchas otras oportunidades.
                </a>
            </p>
        </div>
    @endguest

    <!-- Formulario para aplicar -->
    @cannot('create', App\Models\Vacante::class)
        <div class="mt-10">
            <livewire:postular-vacante :vacante="$vacante" />
        </div>
    @endcannot
</div>
