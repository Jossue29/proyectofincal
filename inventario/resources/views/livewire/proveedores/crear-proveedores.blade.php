<div class="px-5 py-4 mb-3">
    <h2>Crear Proveedores</h2>
    <form wire:submit.prevent='guardar'>
        <label for="exampleFormControlInput1" class="form-label">
            <span>Nombre</span>
            <input type="text" wire:model='nombre' class="form-control">
            @error('nombre')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>
         <label for="exampleFormControlInput1" class="form-label">
            <span>direccion</span>
            <textarea type="text" wire:model='direccion' class="form-control"></textarea>
            @error('direccion')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>
        <label for="exampleFormControlInput1" class="form-label"></label>
            <span>Telefono</span>
            <input class="form-control w-25" type="number" wire:model='telefono'>
            @error('telefono')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>
          <label for="exampleFormControlInput1" class="form-label"></label>
            <span>Email</span>
            <input class="form-control w-25" type="email" wire:model='email'>
            @error('email')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>
