@extends('layouts.app')

@section('title', 'Sysprim - Departamentos')

@section('content')

    <div class="contenedor">
        <div class="cont_menup">
            <div class="bg-imagen">
    
            </div>
            <nav class="cont_inicio">
                <a href="/" class="btn_inicio">Inicio</a>
                <a href="/estados" class="btn_inicio">Estados Laborales</a>
                <a href="/sexos" class="btn_inicio">Sexos</a>
                <a href="/departamentos" class="btn_inicio">Departamentos</a>
            </nav>
        </div>

        <livewire:empleados />
    </div>
@endsection