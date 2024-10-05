@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Registrar Movimiento de Inventario</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="guardar">
                        <!-- Selección de Producto -->
                        <div class="mb-3 form-group">
                            <label for="producto_id">Producto</label>
                            <select wire:model="producto_id" class="form-control @error('producto_id') is-invalid @enderror" id="producto_id">
                                <option value="">Seleccione un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Selección del tipo de movimiento -->
                        <div class="mb-3 form-group">
                            <label for="tipo">Tipo de Movimiento</label>
                            <select wire:model="tipo" class="form-control @error('tipo') is-invalid @enderror" id="tipo">
                                <option value="">Seleccione el tipo de movimiento</option>
                                <option value="entrada">Entrada</option>
                                <option value="salida">Salida</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-3 form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" wire:model="cantidad" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" placeholder="Ingrese la cantidad">
                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de registro -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
