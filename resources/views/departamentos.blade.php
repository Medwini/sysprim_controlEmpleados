@extends('layouts.app')

@section('title', 'Sysprim - Departamentos')

@section('content')

    <div class="contenedor">
        <div class="cont_menup">
            <div class="bg-imagen">
    
            </div>
            <nav class="cont_inicio">
                <a href="/" class="btn_inicio">Inicio</a>
                <a href="#" class="btn_inicio">Estados Laborales</a>
                <a href="#" class="btn_inicio">Sexo</a>
                <a href="#" class="btn_inicio">Empleados</a>
            </nav>
        </div>

        <livewire:departamentos />
    </div>
@endsection