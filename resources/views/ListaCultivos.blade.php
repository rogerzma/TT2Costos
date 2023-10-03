@extends('layouts.appGOB')

@section("title", "ListaCultivos")

@section('content')

	<div class="container">
		<ol class="breadcrumb top-buffer">
			<li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
			<li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
			<li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
			<li><a href="{{ route('inicio') }}">Agrocostos</a></li>
			<li class="active">Lista de cultivos</li>
		</ol>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-9">
			  <h2>Lista de cultivos</h2>
			  <hr class="red">
			<p>Aquí se muestran los cultivos registrados para las diferentes operaciones del sistema.</p>
	
			</div> 
			<div class="col-md-3">
				<div class="list-group">
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarCultivo') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar cultivo</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('SubirReportes') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Ver y modificar reportes</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('register') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
				</div>
			</div>
		  </div>
	
	<div class="row">
	<div class="col-sm-9 table-responsive" style="margin-bottom:2em;">
		<table class="table table-bordered table-striped">
				<tr>
				<th colspan="1" style="background:#009933; color:#FFF;">Nombre </th>
				<th colspan="1" style="background:#009933; color:#FFF;">Tipo de cultivo</th>
				<th colspan="1" style="background:#009933; color:#FFF;">Modalidad</th>
				<th colspan="1" style="background:#009933; color:#FFF;">Opciones</th>
				<tr>
					<td valign="middle">Frijol</td>
					<td valign="middle">Anual</td>
					<td valign="middle">Riego</td>
					<td valign="middle">
						<a href="ActualizaCultivo" style="color:#001c99;">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
							<span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>
						</a>
				<tr>
					<td valign="middle">Chile</td>
					<td valign="middle">Anual</td>
					<td valign="middle">Temporal</td>
					<td valign="middle"> 
						<a href="ActualizaCultivo" style="color:#00
						0000001c99;">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
							<span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>
						</a>
				<tr>
					<td valign="middle">Maiz</td>
					<td valign="middle">Anual</td>
					<td valign="middle">Temporal</td>
					<td valign="middle"> 
						<a href="ActualizaCultivo" style="color:#001c99;">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
							<span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>
						</a>
				<tr>
					<td valign="middle">Fresa</td>
					<td valign="middle">Perenne</td>
					<td valign="middle">Riego</td>
					<td valign="middle"> 
						<a href="ActualizaCultivo" style="color:#001c99;">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
							<span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>
						</a>
					</td>
			
				</table>
				<div class="row">
					<div class="col-md-6">    
						<p>
						<p>
							<a href="{{ route('RegistrarCultivo') }}" button class="btn btn-primary" type="button">Nuevo cultivo</a>
						</p>
						
						</p></div> 
				</div>
	</div>

  <div class="modal fade" id="modalServ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title" id="myModalLabel">Advertencia</h4>
		</div>
		<div class="modal-body">
			<p>El cultivo se eliminará definitivamente y no podrá recuperarse, ¿está seguro de continuar?</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>
	  </div>
	</div>
  </div>
</div>


</div>

</div>

@endsection