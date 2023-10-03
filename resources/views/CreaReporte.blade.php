@extends("layouts.appGOB")

@section("title", "NuevoReporte")

@section("view-name", "NuevoReporte")

@section("content")

<div class="container">
    <ol class="breadcrumb top-buffer">
        <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
        <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
        <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
        <li><a href="{{ route('SubirReportes') }}">Subir reportes</a></li>
        <li class="active">Nuevo reporte</li>
    </ol>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-9">
        <h2>Nuevo reporte</h2>
        <hr class="red">
        <p>Seleccione las características del reporte a subir.</p> 
    </div>
    <div class="col-md-3">
        <div class="list-group">
          <a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarCultivo') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar cultivo</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Visualizar lista de cultivos</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('register') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
        </div>
    </div>
    </div>

    

    <div class="container">

      <div class="row"> 
          <div class="col-md-4">
            <p>
              <p><h4>Nombre del cultivo</h4></p>
              <input class="form-control" placeholder="Ingrese el nombre del cultivo" type="text">
            </p></div> 
            <div class="col-md-4">
              <p>
                <p><h4>Nombre científico</h4></p>
                <input class="form-control" placeholder="Ingrese el nombre científico" type="text">
              </p></div> 
              <div class="col-md-3">
                <p>
                  <p><h4>Tipo de cultivo</h4></p>
                    <select class="form-control" placeholder="Seleccione un tipo de cultivo">
                      <option>Anual</option>
                      <option>Perenne</option>
                    </select>
                </p></div> 
      </div>

      <div class="row"> 
            <div class="col-md-4">
              <p>
                <p><h4>Modalidad</h4></p>
                  <select class="form-control">
                    <option>Riego</option>
                    <option>Temporal</option>
                  </select>
            </p></div> 
            <div class="col-md-4">
              <p>
                <p><h4>Ciclo de cultivo</h4></p>
                  <select class="form-control">
                    <option>Primavera-verano</option>
                    <option>Otoño-invierno</option>
                  </select>
            </p></div> 
    </div>

    <div class="row"> 
      <div class="col-md-4">
        <p>
          <p><h4>Potencial alto (hec)</h4></p>
          <input class="form-control" placeholder="Ingrese las hectareas de potencial" type="text">
        </p></div> 
        <div class="col-md-4">
          <p>
            <p><h4>Potencial medio (hec)</h4></p>
            <input class="form-control" placeholder="Ingrese las hectareas de potencial" type="text">
          </p></div> 
          <div class="col-md-4">
            <p>
              <p><h4>Potencial bajo (hec)</h4></p>
              <input class="form-control" placeholder="Ingrese las hectareas de potencial" type="text">
            </p></div>
    </div>

    <div class="row"> 

    </div>

    <div class="row"> 
      <div class="col-md-4">
        <p>
          <p><h4>Seleccione el archivo a subir</h4></p>
          <div class="form-group hidden-xs ">
            <input type="file" id="exampleInputFile">
          </div>
        </p></div> 
        <div class="col-md-4">
          <p>
          </p></div> 
          <div class="col-md-4">
            <p>
              <p>
                <button type="submit" class="btn btn-primary pull-right">Subir reporte</button>
              </p>
            </p></div>
    </div>

    </div>

    

    </div>

@endsection