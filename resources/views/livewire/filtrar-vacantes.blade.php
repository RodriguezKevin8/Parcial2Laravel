<div class="py-16 bg-gray-100">
    <h2 class="mb-10 text-3xl font-extrabold text-center text-indigo-600 md:text-4xl">
        Buscar y Filtrar Vacantes
    </h2>

    <div class="mx-auto max-w-7xl bg-white p-8 rounded-lg shadow-md">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="grid gap-6 md:grid-cols-3">
                <!-- Término -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 uppercase" for="termino">
                        Término de Búsqueda
                    </label>
                    <input
                        id="termino"
                        type="text"
                        placeholder="Ej: Laravel, React..."
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition"
                        wire:model='termino'
                    />
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 uppercase">
                        Categoría
                    </label>
                    <select
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition"
                        wire:model='categoria'>
                        <option value="">--Seleccione--</option>
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Salario -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 uppercase">
                        Salario Mensual
                    </label>
                    <select
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition"
                        wire:model='salario'>
                        <option value="">-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <input
                    type="submit"
                    value="Buscar"
                    class="w-full md:w-auto px-10 py-2 text-white font-bold uppercase bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 rounded shadow transition disabled:opacity-50 disabled:cursor-not-allowed"
                    @disabled(!$categoria && !$salario)
                />
            </div>
        </form>
    </div>
</div>
