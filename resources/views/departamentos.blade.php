@extends('layouts.app')

@section('title', 'Sysprim - Departamentos')

@section('content')

        <div class="">
            <nav class="">
                <a href="/" class="btn me-2 fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-up" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#02a0df" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2c.641 0 1.212 .302 1.578 .771" />
                        <path d="M20.136 11.136l-8.136 -8.136l-9 9h2v7a2 2 0 0 0 2 2h6.344" />
                        <path d="M19 22v-6" />
                        <path d="M22 19l-3 -3l-3 3" />
                    </svg>
                </a>
                <a href="/estados" class="btn btn-nav me-2 fw-bold">Estados Laborales</a>
                <a href="/sexos" class="btn btn-nav me-2 fw-bold">Sexo</a>
                <a href="/empleados" class="btn btn-nav me-2 fw-bold">Empleados</a>
            </nav>
        </div>

        <livewire:departamentos />
@endsection