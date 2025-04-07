<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">
    <div class="mt-4">
        <x-input-label for="titulo" :value="('Titulo Vacante')" />
        <x-text-input 
        id="titulo" class="block mt-1 w-full"
                        type="text"
                        wire:model="titulo"
                       value="{{old('titulo')}}"
                       placeholde="Titulo de Vacante" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="salario" :value="('Salario Mensual')" />
        <select wire:model="salario" id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario )
                <option value="{{$salario->id }}">{{ $salario->salario }}</option>
            @endforeach
            </select>
            @error('salario')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="categoria" :value="('Categoría')" />
        <select wire:model="categoria" id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria )
                <option value="{{$categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
            </select>
            @error('categoria')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="empresa" :value="('Empresa')" />
        <x-text-input 
        id="empresa" class="block mt-1 w-full"
                        type="text"
                        wire:model="empresa"
                       value="{{old('empresa')}}"
                       placeholde="Empresa: ej, Netflix, etc" />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div class="mt-4">
    <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
    <x-text-input 
        id="ultimo_dia"
        class="block mt-1 w-full"
        type="date"
        wire:model="ultimo_dia"
    />
    <p class="text-sm text-gray-500 mt-1">Debe ser mínimo 7 días después de hoy.</p>

    @error('ultimo_dia')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputFecha = document.getElementById('ultimo_dia');

        const hoy = new Date();
        hoy.setDate(hoy.getDate() + 7); // suma 7 días
        const minFecha = hoy.toISOString().split('T')[0];

        inputFecha.min = minFecha;
    });
</script>
@endpush

    <div class="mt-4">
        <x-input-label for="descripcion" :value="('Descripción Puesto')" />
        <textarea wire:model="descripcion" id="" placeholder="Descripcion general de puesto, experiencia"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72">
        {{old('descripcion')}}</textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="imagen" :value="('Imagen')" />
        <x-text-input 
        id="imagen" class="block mt-1 w-full"
                        type="file"
                        wire:model="imagen"
                        accept="image/*"
                      />
        <div class="my-5 w-96">
            @if($imagen)
                <img src="{{$imagen->temporaryUrl()}}" alt="">
            @endif
        </div>
        @error('imagen')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <x-primary-button>
        Crear Vacante
    </x-primary-button>
</form>