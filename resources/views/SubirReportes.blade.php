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
        <div class="row">
			<div class="col-md-9">
			  <h2>Lista de reportes</h2>
			  <hr class="red">
			<p>Aquí se muestran los cultivos registrados para las diferentes operaciones del sistema.</p>
	
			</div>
			<div class="col-md-3">
				<div class="list-group">
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarCultivo') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar cultivo</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Lista de cultivos</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('register') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
				</div>
			</div>
		  </div> 
  
              <div class="row">
                <div class="col-md-9 table-responsive" style="margin-bottom:2em;">
                  <table class="table table-bordered table-striped">
                            <tr>
                             <th colspan="2" rowspan=2 style="background:#009933; color:#FFF;">Nombre Común</th>
                             <th rowspan="2" style="background:#009933; color:#FFF;">Nombre Científico</th>
                             <th colspan="3" style="background:#009933; color:#FFF;">Potencial</th>
                             <th rowspan="2" style="background:#009933; color:#FFF;">Opciones</th>
                            <tr>
                              <th style="background:#009933; color:#FFF;">Alto</th>
                              <th style="background:#009933; color:#FFF;">Medio</th>
                              <th style="background:#009933; color:#FFF;">Bajo</th>
                            <tr>
                              <th colspan="8" style="background:#cc6600; color:#FFF;">RIEGO</th>
                            <tr>
                              <td align="center" valign="middle"><a href="./PotAgric/AjoR.pdf"><img border="0" src="images/icopdf.png" /></a></td>
                              <td valign="middle">Ajo</td>
                              <td valign="middle"><i>Allium sativum</i> L.
                              <td valign="middle">351,494</td>
                              <td valign="middle">347,323</td>
                              <td valign="middle">&nbsp;</td>
                              <td valign="middle"> 
                                <a href="ActualizaReporte">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                              </td>
                            <tr>
                              <td align="center" valign="middle"><a href="./PotAgric/AlmendroR.pdf"><img border="0" src="images/icopdf.png" /></a></td>
                               <td valign="middle">Almendro</td>
                              <td valign="middle"><i>Prunus amygdalus</i> L.</td>
                              <td valign="middle">42,830</td>
                              <td valign="middle">276,337</td>
                              <td valign="middle">&nbsp;</td>
                              <td valign="middle"> 
                                <a href="ActualizaReporte">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                              </td>
                            <tr>
                              <td align="center" valign="middle"><a href="./PotAgric/AvenaR.pdf"><img border="0" src="images/icopdf.png" /></a>
                                <td valign="middle">Avena
                              <td valign="middle"><i>Avena sativa</i> L.
                              <td valign="middle">243,672
                              <td valign="middle">517,639
                              <td valign="middle">&nbsp;
                                <td valign="middle"> 
                                    <a href="ActualizaReporte">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                  </td>
                            <tr>
                              <td align="center" valign="middle"><a href=./PotAgric/CacahuateR.pdf><img border="0" src="images/icopdf.png" /></a>
                                <td valign="middle">Cacahuate
                              <td valign="middle">Arachis hypogea L.
                              <td valign="middle">1,544
                              <td valign="middle">7,449
                              <td valign="middle">&nbsp;
                                <td valign="middle"> 
                                    <a href="ActualizaReporte" span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                  </td>
                            <tr>
                              <td align="center" valign="middle"><a href=./PotAgric/CebadaR.pdf><img border="0" src="images/icopdf.png" /></a>
                                <td valign="middle">Cebada
                              <td valign="middle"><i>Hordeum</i> L. <i>vulgare</i>
                              <td valign="middle">272,275
                              <td valign="middle">536,775
                              <td valign="middle">&nbsp;
                                <td valign="middle"> 
                                  <a href="ActualizaReporte">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                  </a>
                                  <a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
                                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                  </a>
                                </td>
                            
                          </table>
                          <div class="row">
                            <div class="col-md-4">
                              <br><p>
                                <a href="{{ route('CreaReporte') }}" button class="btn btn-primary" type="button">Nuevo reporte</a>
                            </p><br>
                              </div></div>
              
                </div>

                <div class="modal fade" id="modalServ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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