<div class="px-5 py-4 mb-3">
    <h2>Crear Producto</h2>
    <form wire:submit.prevent='guardar'>
        <!-- Campo Nombre del Producto -->
        <label for="nombreProducto" class="form-label">
            <span>Nombre del Producto</span>
            <input type="text" wire:model='nombre' class="border-2 form-control" id="nombreProducto">
            @error('nombre')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>

        <!-- Campo Descripción -->
        <label for="descripcionProducto" class="form-label">
            <span>Descripción</span>
            <textarea wire:model='descripcion' class="border-2 form-control" id="descripcionProducto"></textarea>
            @error('descripcion')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>

        <!-- Campo Precio -->
        <label for="precioProducto" class="form-label">
            <span>Precio</span>
            <input type="number" wire:model='precio' class="border-2 form-control" id="precioProducto">
            @error('precio')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>

        <!-- Campo Cantidad -->
        <label for="cantidadProducto" class="form-label">
            <span>Cantidad</span>
            <input type="number" wire:model='cantidad' class="border-2 form-control" id="cantidadProducto" readonly>
            @error('cantidad')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>

        <!-- Campo Seleccionar Categoría -->
        <label for="categoriaProducto" class="form-label">
            <span>Categoría</span>
            <select wire:model='categoria_id' class="border-2 form-control" id="categoriaProducto">
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>

        <!-- Campo Seleccionar Proveedor -->
        <label for="proveedorProducto" class="form-label">
            <span>Proveedor</span>
            <select wire:model='proveedor_id' class="border-2 form-control" id="proveedorProducto">
                <option value="">Seleccione un proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
            @error('proveedor_id')
                <em class="error">{{$message}}</em>
            @enderror
        </label>
        <br>

        <!-- Botón Guardar -->
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>
