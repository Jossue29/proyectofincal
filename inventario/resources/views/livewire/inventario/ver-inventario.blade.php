<div class="px-5 py-4 mb-3">
    <h2>Movimientos de Inventario</h2>
    
    <!-- Filtros -->
    <label for="tipoFiltro" class="form-label">
        <span>Filtrar por Tipo</span>
        <select wire:model='tipo' class="border-2 form-control" id="tipoFiltro">
            <option value="">Todos</option>
            <option value="entrada">Entradas</option>
            <option value="salida">Salidas</option>
        </select>
    </label>
    <br>

    <label for="productoFiltro" class="form-label">
        <span>Filtrar por Producto</span>
        <select wire:model='producto_id' class="border-2 form-control" id="productoFiltro">
            <option value="">Todos</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
    </label>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Fecha Movimiento</th>
            </tr>
        </thead>
        <tbody id="movimientosTabla">
            @foreach($movimientos as $movimiento)
                <tr>
                    <td>{{ $movimiento->id }}</td>
                    <td>{{ $movimiento->producto->nombre }}</td>
                    <td>{{ $movimiento->tipo }}</td>
                    <td>{{ $movimiento->cantidad }}</td>
                    <td>{{ $movimiento->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>