@extends('layouts.app')

@section('title', 'Sysprim - Inicio')

@section('content')

    <div class="contenedor">
        <div class="cont_menup">
            <div class="bg-imagen">
    
            </div>
            <nav class="cont_inicio">
                <a href="/estados" class="btn_inicio">Estados Laborales</a>
                <a href="/sexos" class="btn_inicio">Sexo</a>
                <a href="/empleados" class="btn_inicio">Empleados</a>
                <a href="/departamentos" class="btn_inicio">Departamentos</a>
            </nav>
        </div>
    </div>
@endsection