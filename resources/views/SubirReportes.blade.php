@extends('layouts.appGOB')

@section("title", "SubirReportes")

@section('content')

	<div class="container">


    <div class="col-md-12">
		<ol class="breadcrumb top-buffer">
			<li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
			<li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
			<li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
			<li><a href="{{ route('inicio') }}">Agrocostos</a></li>
			<li class="active">Ver y modificar reportes</li>
		</ol></div>
	</div>

	<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="row">
			<div class="col-md-9">
			  <h2>Lista de reportes</h2>
			  <hr class="red">
			<p>Aquí se muestran los cultivos registrados para las diferentes operaciones del sistema.</p>

			</div>
			<div class="col-md-3">
				<div class="list-group">
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarCultivo') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar cultivo</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Lista de cultivos</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarUsuario') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
				</div>
			</div>
		  </div>
              <div class="row">
                <div class="col-md-9 table-responsive" style="margin-bottom:2em;">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="2" rowspan=2 style="background:#009933; color:#FFF;">Nombre Común</th>
                            <th rowspan="2" style="background:#009933; color:#FFF;">Nombre Científico</th>
                            <th rowspan="2" style="background:#009933; color:#FFF;">Modalidad</th>
                            <th colspan="3" style="background:#009933; color:#FFF;">Potencial</th>
                            <th rowspan="2" style="background:#009933; color:#FFF;">Opciones</th>
                        </tr>
                        <tr>
                            <th style="background:#009933; color:#FFF;">Alto</th>
                            <th style="background:#009933; color:#FFF;">Medio</th>
                            <th style="background:#009933; color:#FFF;">Bajo</th>
                        </tr>

                        @foreach($reportes as $reporte)
                          <tr>
                              <td align="center" valign="middle">
                                  <a href="{{ route('descargar.pdf', ['id' => $reporte->id]) }}"><img border="0" src="images/PDF.png" /></a>
                              </td>
                              <td valign="middle">{{ $reporte->nombrecultivo }}</td>
                              <td valign="middle"><i>{{ $reporte->nombrecientifico }}</td>
                              <td valign="middle">{{ $reporte->modalidad }}</td>
                              <td valign="middle">{{ $reporte->potencialalto }}</td>
                              <td valign="middle">{{ $reporte->potencialmedio }}</td>
                              <td valign="middle">{{ $reporte->potencialbajo }}</td>
                              <td valign="middle">
                                  <form method="POST" action="{{ route('actualiza.reporte', ['id' => $reporte->id]) }}">
                                      @csrf
                                      @method('PUT')
                                      <a href="{{ route('editar.reporte', ['id' => $reporte->id]) }}">
                                          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                      </a>
                                      <a href="#" data-toggle="modal" data-target="#modalServ_{{ $reporte->id }}" data-report-id="{{ $reporte->id }}" style="color:#ff0000;">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                      </a>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                    </table>
                          <div class="row">
                            <div class="col-md-4">
                              <br><p>
                                <a href="{{ route('CreaReporte') }}" button class="btn btn-primary" type="button">Nuevo reporte</a>
                            </p><br>
                              </div></div>

                </div>

                @foreach($reportes as $reporte)
                <div class="modal fade" id="modalServ_{{ $reporte->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Advertencia</h4>
                    </div>
                    <div class="modal-body">
                      <p>El reporte se eliminará definitivamente y no podrá recuperarse, ¿está seguro de continuar?</p>
                    </div>
                    <div class="modal-footer">
                      <form method="POST" action="{{ route('eliminar.reporte', ['id' => $reporte->id]) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-primary">Eliminar</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </form>
                  </div>
                    </div>
                  </div>
                  </div>

                  @endforeach
            </div>


      </div>
	</div>


@endsection
