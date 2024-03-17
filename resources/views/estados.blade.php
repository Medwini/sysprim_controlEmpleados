@extends('layouts.app')

@section('title', 'Sysprim - Departamentos')

@section('content')

    <div class="contenedor">
        <div class="cont_menup">
            <div class="bg-imagen">
    
            </div>
            <nav class="cont_inicio">
                <a href="/" class="btn_inicio">Inicio</a>
                <a href="/departamentos" class="btn_inicio">Departamentos</a>
                <a href="/sexos" class="btn_inicio">Sexos</a>
                <a href="/empleados" class="btn_inicio">Empleados</a>
            </nav>
        </div>

        <livewire:estados />
    </div>
@endsection