<div class="px-5 py-4 mb-3">
    <h2>Crear Categoria</h2>
    <form wire:submit.prevent='guardar'>
        <label for="exampleFormControlInput1" class="form-label">
            <span>Nombre</span>
            <input type="text" wire:model='nombre' class="form-control">
            @error('nombre')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>
        <label for="exampleFormControlInput1" class="form-label"></label>
            <span>descripcion</span>
            <textarea class="form-control w-25" type="text" wire:model='descripcion'>
            </textarea>
            @error('descripcion')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>
