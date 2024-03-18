<div>
    <div class="cont_titulo">
        <h2 class="titulo">Empleados</h2>
    </div>

    <div class="container shadow p-3 mb-5 bg-body rounded">
        @if (!$edit)
            @if ($nuevo)
                <form wire:submit.prevent="crear">
                    @csrf
                    <div class="input-group flex-nowrap my-3">
                        <span class="input-group-text" id="addon-wrapping">Cédula:</span>
                        <select class="form-select" wire:model="valor_tipo" id="inputGroupSelect01">
                            <option value="0" selected>Choose...</option>
                            <option value="V">V-</option>
                            <option value="E">E-</option>
                            <option value="G">G-</option>
                            <option value="J">J-</option>
                        </select>
                        <input type="text" wire:model="valor_ci" class="form-control" aria-describedby="addon-wrapping">
                    </div>
                    @error('valor_cedula')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror
                    <div class="input-group flex-nowrap my-3">
                        <span class="input-group-text" id="addon-wrapping">Nombre:</span>
                        <input type="text" wire:model="valor_nombre" class="form-control" aria-describedby="addon-wrapping">
                    </div>
                    @error('valor_nombre')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect02">Sexo:</label>
                        <select class="form-select" wire:model="valor_sexo"  id="inputGroupSelect02">
                            <option value="0" selected>Seleccione...</option>
                            @foreach($sexos as $sexo)
                                <option value="{{$sexo->id}}">{{$sexo->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('valor_sexo')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror

                    <div class="input-group flex-nowrap my-3">
                        <span class="input-group-text" id="addon-wrapping">Fecha Nacimiento:</span>
                        <input type="date" wire:model="valor_fecha_nac" class="form-control" aria-describedby="addon-wrapping">
                    </div>
                    @error('valor_fecha_nac')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect03">Departamento:</label>
                        <select class="form-select" wire:model="valor_departamento"  id="inputGroupSelect03">
                            <option value="0" selected>Seleccione...</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{$departamento->id}}">{{$departamento->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('valor_departamento')
                        <p class="error_m">• {{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button wire:click.prevent="limpiar" class="btn btn-warning">Cancelar</button>
                </form>
            @else
                <button wire:click="nuevo" class="btn_nuevo">Nuevo</button>
            @endif
        
        @else
            @foreach($empleados as $empleado)
                @if ($id_editar == $empleado->id)
                    <form wire:submit.prevent="editar({{ $empleado->id }})">
                        @csrf
                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Nombre:</span>
                            <input type="text" wire:model="edit_cedula" class="form-control" aria-describedby="addon-wrapping" disabled readonly>
                        </div>
                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Nombre:</span>
                            <input type="text" wire:model="edit_nombre" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                        @error('edit_nombre')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Sexo:</label>
                            <select class="form-select" wire:model="edit_sexo"  id="inputGroupSelect02">
                                <option value="0" selected>Seleccione...</option>
                                @foreach($sexos as $sexo)
                                    <option value="{{$sexo->id}}">{{$sexo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('edit_sexo')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror

                        <div class="input-group flex-nowrap my-3">
                            <span class="input-group-text" id="addon-wrapping">Fecha Nacimiento:</span>
                            <input type="date" wire:model="edit_fecha_nac" class="form-control" aria-describedby="addon-wrapping">
                        </div>
                        @error('edit_fecha_nac')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect03">Departamento:</label>
                            <select class="form-select" wire:model="edit_departamento"  id="inputGroupSelect03">
                                <option value="0" selected>Seleccione...</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}">{{$departamento->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('edit_departamento')
                            <p class="error_m">• {{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button wire:click.prevent="limpiar" class="btn btn-warning">Cancelar</button>
                    </form>
                @endif
            @endforeach
        @endif
        <p class="my-3 msg-crud">{{ $mensaje }}</p>
        @if ($mensajeCard != "")
            <p class="my-3 msg-crud" style="color:red;">• {{ $mensajeCard }}</p>
        @endif
    </div>

    <div class="container grid cont-card">
        
        @foreach($empleados as $empleado)
            <div class="card m-1 p-1" style="width: 20rem;">
                <div class="d-flex flex-row justify-content-between">
                    <button wire:click="hab_edit({{ $empleado->id }})" class="btn btn-primary" style="width: 49%;">Editar</button>
                    <button wire:click="eliminar({{ $empleado->id }})" class="btn btn-danger" style="width: 49%;">Eliminar</button>
                </div>
                <img class="card-img-top py-1" src="{{ asset('img/users.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        @switch ($empleado->sexo) 
                            @case (1)
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-female" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fd0061" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                    <path d="M12 14v7" />
                                    <path d="M9 18h6" />
                                </svg>
                            @break
                            @case (2)
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gender-male" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                    <path d="M19 5l-5.4 5.4" />
                                    <path d="M19 5h-5" />
                                    <path d="M19 5v5" />
                                </svg>
                            @break
                            @default
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            @break
                        @endswitch
                        {{ $empleado->nombre }}
                    </h5>
                    @foreach ($estados as $estado)
                        @if ($empleado->estado == $estado->id)
                            <p class="card-text">Estado: 
                            @switch ($estado->accion) 
                                @case (1)
                                    <span class="bg-success text-light fw-bold rounded-pill p-1">{{ $estado->descripcion }}</span>
                                @break
                                @case (2)
                                    <span class="bg-danger text-light fw-bold rounded-pill p-1">{{ $estado->descripcion }}</span>
                                @break
                                @case (3)
                                    <span class="bg-warning text-light fw-bold rounded-pill p-1">{{ $estado->descripcion }}</span>
                                @break
                                @case (4)
                                    <span class="bg-info text-light fw-bold rounded-pill p-1">{{ $estado->descripcion }}</span>
                                @break
                                @default
                                    <span class="bg-secondary text-light fw-bold rounded-pill p-1">{{ $estado->descripcion }}</span>
                                @break
                            @endswitch
                            </p>
                        @endif
                    @endforeach
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span>Identificación: </span>{{ $empleado->cedula }}</li>
                    <li class="list-group-item" wire:init='valorEdad({{ $empleado->id }})'><span>Edad: </span>{{ $empleado->edad }}</li>
                    @foreach($departamentos as $departamento)
                        @if ($empleado->departamento == $departamento->id)
                            <li class="list-group-item">{{ $departamento->descripcion }}</li>
                        @endif
                    @endforeach
                    
                    <li class="list-group-item"><span>Activo: </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M21 12h-13l3 -3" />
                        <path d="M11 15l-3 -3" />
                    </svg>
                    @if($empleado->hora_lleg > '00:00:00')
                        <span style="background-color:green;color:white;">{{ $empleado->hora_lleg }}</span>
                    @else
                        <span>{{ $empleado->hora_lleg }}</span>
                    @endif
                    - 
                    @if($empleado->hora_sal > '00:00:00')
                        <span style="background-color:green;color:white;">{{ $empleado->hora_sal }}</span>
                    @else
                        <span>{{ $empleado->hora_sal }}</span>
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M9 12h12l-3 -3" />
                        <path d="M18 15l3 -3" />
                    </svg>
                    </li>
                </ul>
                @if ($empleado->estado == 1)
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <button wire:click="entrada({{ $empleado->id }})" class="btn btn-outline-success" style="width: 49%;">Entrada</button>
                            <button wire:click="salida({{ $empleado->id }})" class="btn btn-outline-info" style="width: 49%;">Salida</button>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    @foreach ($estados as $estado)
                        @if ($empleado->estado == $estado->id)
                            
                        @else
                            @switch ($estado->accion) 
                                @case (1)
                                    <button type="button" wire:click="cambiarEstado({{ $estado->id }}, {{ $empleado->id }})" class="btn bg-success text-light my-1">{{ $estado->descripcion }}</button>
                                @break
                                @case (2)
                                    <button type="button" wire:click="cambiarEstado({{ $estado->id }}, {{ $empleado->id }})" class="btn bg-danger text-light my-1">{{ $estado->descripcion }}</button>
                                @break
                                @case (3)
                                    @if ($empleado->edad<=59)
                                        <button type="button" wire:click="cambiarEstado({{ $estado->id }}, {{ $empleado->id }})" class="btn bg-warning text-light my-1">{{ $estado->descripcion }}</button>
                                    @endif
                                @break
                                @case (4)
                                    <button type="button" wire:click="cambiarEstado({{ $estado->id }}, {{ $empleado->id }})" class="btn bg-info text-light my-1">{{ $estado->descripcion }}</button>
                                @break
                                @default
                                    <button type="button" wire:click="cambiarEstado({{ $estado->id }}, {{ $empleado->id }})" class="btn bg-secondary text-light my-1">{{ $estado->descripcion }}</button>
                                @break
                            @endswitch

                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
