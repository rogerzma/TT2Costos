@extends('layouts.appGOB')

@section("title", "InicioAdministrador")

@section('content')

    <!-- Contenido -->

    <div class="container">
		<ol class="breadcrumb top-buffer">
			<li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
			<li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
			<li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
			<li class="active">Agrocostos</li>
		</ol>
	</div>

    <div class="container">
        <div class="row">
        <div class="col-md-9">
            <h2>Menu Administrador</h2>
            <hr class="red">
            <h4><p>Bienvenido al portal de agrocostos INIFAP, seleccione las opciones que desee realizar:</p></h4>
        </div>
        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('inicio') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Cerrar sesión</a>
            </div>
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