<div>
    <div class="cont_titulo">
        <h2 class="titulo">Estatus</h2>
    </div>

    <div class="container shadow p-3 mb-5 bg-body rounded">
        @foreach($estados as $estado)
            @if ($edit)
                @if ($id_editar == $estado->id)
                    <div class="input-group my-1">
                        <input type="text" class="form-control" wire:model="valor_edit" />
                        <button class="btn btn-outline-success" wire:click="editar({{ $estado->id }})">Guardar</button>
                        <button class="btn btn-outline-secondary" wire:click="limpiar">Cancelar</button>
                    </div>
                    
                    @error('valor_edit')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3 my-1">
                        <label class="input-group-text" for="inputGroupSelect01">Función:</label>
                        <select class="form-select" wire:model="accion_edit"  id="inputGroupSelect01">
                            <option value="0" selected>Seleccione...</option>
                            <option value="1">Activo</option>
                            <option value="2">Retirar</option>
                            <option value="3">Desincorporar</option>
                            <option value="4">No aplica</option>
                        </select>
                    </div>
                    @error('accion_edit')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror
                @endif
            @endif   
        @endforeach
        @if (!$edit)
            @if ($nuevo)
                <div class="input-group my-1">
                    <input type="text" class="form-control" wire:model="valor" />
                    <button class="btn btn-outline-success" wire:click="crear">Guardar</button>
                    <button class="btn btn-outline-secondary" wire:click="limpiar">Cancelar</button>
                </div>
                @error('valor')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
                <div class="input-group mb-3 my-1">
                    <label class="input-group-text" for="inputGroupSelect01">Función:</label>
                    <select class="form-select" wire:model="accion"  id="inputGroupSelect01">
                        <option value="0" selected>Seleccione...</option>
                        <option value="1">Activo</option>
                        <option value="2">Retirar</option>
                        <option value="3">Desincorporar</option>
                        <option value="4">No aplica</option>
                    </select>
                </div>
                @error('accion')
                    <p class="error_m">• {{ $message }}</p>
                @enderror
                
            @else
                <button wire:click="nuevo" class="btn_nuevo">Nuevo</button>
            @endif
        @endif
        <p class="my-3 msg-crud">{{ $mensaje }}</p>
    </div>


    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Descripción</th>
                <th scope="col">Función</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estados as $estado)
                <tr>
                    <td>{{ $estado->id }}</td>
                    <td>{{ $estado->descripcion }}</td>
                    @switch ($estado->accion)
                        @case(1)
                            <td>Activo</td>
                        @break
                        @case(2)
                            <td>Retirar</td>
                        @break
                        @case(3)
                            <td>Desincorporar</td>
                        @break
                        @case(4)
                            <td>No Aplica</td>
                        @break
                        @default
                            <td>Desconocido</td>
                        @break
                    @endswitch
                    <td>
                        <button wire:click="hab_edit({{ $estado->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="eliminar({{ $estado->id }})" class="btn btn-danger">Eliminar</button>   
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
