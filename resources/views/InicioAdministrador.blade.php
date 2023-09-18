@extends('layouts.appGOB')

@section("title", "InicioAdministrador")

@section('content')

    <!-- Contenido -->

    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <h2>Menu Administrador</h2>
            <hr class="red">
            <h4><p>Bienvenido al portal de agrocostos INIFAP, seleccione las opciones que desee realizar:</p></h4>
        </div>
        </div>

        <div class="col-md-9">
            <div class="row">
            <h4><a href="{{ route('RegistrarCultivo') }}">Registrar cultivo</a><br></h4>
                <h4><a href="{{ route('ListaCultivos') }}">Visualizar lista de cultivos</a><br></h4>
                    <h4><a href="{{ route('SubirReportes') }}">Ver y modificar reportes</a><br></h4>
                        <h4><a href="{{ route('register') }}">Dar de alta a usuarios</a><br><br></h4>
        </div>
        </div>   
    </div>


@endsection