<div class="px-5 py-4 mb-3">
        <h2 class="mb-6 text-2xl font-semibold">Editar Categoría</h2>

        @if (session()->has('message'))
            <div class="p-4 mb-6 text-white bg-green-500 rounded">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="p-4 mb-6 text-white bg-red-500 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="guardar">
            <div class="mb-4">
                <label for="nombre" class="form-label">Nombre de la categoría:</label>
                <input type="text" id="nombre" wire:model="nombre" class="form-control w-25">
                @error('nombre') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class="form-label">Descripción de la categoría:</label>
                <textarea id="descripcion" wire:model="descripcion" rows="4" class="form-control w-25"></textarea>
                @error('descripcion') 
                    <span class="text-sm text-red-500">{{ $message }}</span> 
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>
                <button type="button" onclick="window.location.href='/'" class="btn btn-secondary" >
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
