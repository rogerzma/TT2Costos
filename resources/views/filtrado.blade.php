@extends("layouts.appGOB")

@section("title", "MapaPotencial")

@section('content')

    <!-- Contenido -->
    <div class="container">
        <div class="col-md-12">
        <ol class="breadcrumb top-buffer">
            <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
            <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
            <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
            <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
            <li class="active">Reportes</li>
        </ol></div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-9">
          <h2>Reportes</h2>
          <hr class="red">
        <p>Seleccione las características de filtrado para el reporte</p>

        </div>
        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('welcome') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('Calculadora') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Calculadora</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('MapaPotencial') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Potencial agrícola</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Modo administrador</a>
            </div>
        </div>
      </div>
      
      <form method="get" action="{{ route('filtrado') }}">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <h4>Filtrar por cultivo</h4>
                <select class="form-control" name="cultivo">
                    <option value="">Todos</option>
                        @foreach($nombrecultivosUnicos as $cultivo)
                        <option value="{{ $cultivo }}" @if(request('cultivo') == $cultivo) selected @endif>{{ $cultivo }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <h4>Filtrar por modalidad</h4>
                <select class="form-control" name="modalidad">
                    <option value="">Todos</option>
                        @foreach($modalidadesUnicas as $modalidad)
                        <option value="{{ $modalidad }}" @if(request('modalidad') == $modalidad) selected @endif>{{ $modalidad }}</option>
                        @endforeach          
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <h4>Filtrar por ciclo de cultivo</h4>
                <select class="form-control" name="ciclocultivo">
                    <option value="">Todos</option>
                        @foreach($ciclosUnicos as $ciclo)
                            <option value="{{ $ciclo }}" @if(request('ciclocultivo') == $ciclo) selected @endif>{{ $ciclo }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <h4>Filtrar por tipo de cultivo</h4>
                <select class="form-control" name="tipocultivo">
                    <option value="">Todos</option>
                        @foreach($tiposUnicos as $tipo)
                            <option value="{{ $tipo }}" @if(request('tipocultivo') == $tipo) selected @endif>{{ $tipo }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <br>
                <button type="submit" class="btn btn-warning" style="font-size: 16px;" id="filtrarButton">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-10 table-responsive" style="margin-bottom: 2em;">
            <br>
            <div class="row">
                <div class="col-md-11">
                    <span>
                        <div style="text-align: justify;">
                          Los resultados aquí presentados son parte de la publicación:
                          <br>
                          <br>
                          <div class="alert alert-warning" style="text-align: justify; font-size: 16px;">
                            Medina G., G., Rumayor R. A., Cabañas C. B., Luna F. M., Ruiz C. J. A., Gallegos V. C., Madero T. J., Gutiérrez S. R., Rubio D. S. y Bravo L. A. G. 2003. Potencial productivo de especies agrícolas en el estado de Zacatecas. Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias. Centro de Investigación Regional Norte Centro. Campo Experimental Zacatecas. Calera, Zacatecas, México. 157 p. (Libro Técnico No. 2).
                          </div>
                          <h5>NúMERO DE HECTáREAS CON POTENCIAL DE PRODUCCIóN DE ESPECIES AGRíCOLAS BAJO CONDICIONES DE RIEGO Y TEMPORAL EN EL ESTADO DE ZACATECAS.</h5>
                        </div>
                    </span>
                </div>
            </div>
                <table class="table table-bordered table-striped" id="reportesTable">
                    <tr>
                        <th colspan="2" rowspan=2 style="background:#009933; color:#FFF;">Nombre Común</th>
                        <th rowspan="2" style="background:#009933; color:#FFF;">Nombre Científico</th>
                        <th colspan="3" style="background:#009933; color:#FFF;">Potencial</th>
                    </tr>
                    <tr>
                        <th style="background:#009933; color:#FFF;">Alto</th>
                        <th style="background:#009933; color:#FFF;">Medio</th>
                        <th style="background:#009933; color:#FFF;">Bajo</th>
                    </tr>
                    @if($reportesRiego->count() > 0)
                    <tr>
                        <th colspan="6" style="background:#cc6600; color:#FFF;">RIEGO</th>
                    </tr>
                    
                    @foreach ($reportesRiego as $reporte)
                        <tr>
                            <td align="center" valign="middle">
                                <a href="{{ route('descargar.pdf', ['id' => $reporte->id]) }}"><img border="0" src="images/PDF.png" /></a>
                            </td>
                            <td valign="middle">{{ $reporte->nombrecultivo }}</td>
                            <td valign="middle"><i>{{ $reporte->nombrecientifico }}</i> L.</td>
                            <td valign="middle">{{ $reporte->potencialalto }}</td>
                            <td valign="middle">{{ $reporte->potencialmedio }}</td>
                            <td valign="middle">{{ $reporte->potencialbajo }}</td>
                        </tr>
                    @endforeach
            @endif
            @if($reportesTemporal->count() > 0)
            <tr>
                <th colspan="6" style="background:#cc6600; color:#FFF;">Temporal</th>
            </tr>
            
            @foreach ($reportesTemporal as $reporte)
                <tr>
                    <td align="center" valign="middle">
                        <a href="{{ route('descargar.pdf', ['id' => $reporte->id]) }}"><img border="0" src="images/PDF.png" /></a>
                    </td>
                    <td valign="middle">{{ $reporte->nombrecultivo }}</td>
                    <td valign="middle"><i>{{ $reporte->nombrecientifico }}</i> L.</td>
                    <td valign="middle">{{ $reporte->potencialalto }}</td>
                    <td valign="middle">{{ $reporte->potencialmedio }}</td>
                    <td valign="middle">{{ $reporte->potencialbajo }}</td>
                </tr>
            @endforeach
                </table>
                @else
                <p>No existen reportes para los filtros seleccionados.</p>
            @endif
        </div>
    </div>
</div>



@endsection