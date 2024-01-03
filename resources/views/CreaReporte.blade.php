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
          <a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarCultivo') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar cultivo</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Visualizar lista de cultivos</a>
					<a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarUsuario') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
        </div>
    </div>
    </div>

    <div class="container">
      <div class="alert alert-danger" id="emptyFieldsAlert" style="display: none;">
        Campos vacíos
      </div>

      <form id="reportForm" action="{{ route('crear.reporte') }}" method="POST" enctype="multipart/form-data">
      @csrf
       <div class="row">
          <div class="col-md-4">
            <p>
              <p><h4>Nombre del cultivo</h4></p>
              <input class="form-control" placeholder="Ingrese el nombre del cultivo" type="text" name="nombrecultivo">
              @error('nombrecultivo')<p class="text text-danger">Falta el nombre</p>@enderror
            </p></div>
            <div class="col-md-4">
              <p>
                <p><h4>Nombre científico</h4></p>
                <input class="form-control" placeholder="Ingrese el nombre científico" type="text" name="nombrecientifico">
                @error('nombrecientifico')<p class="text text-danger">Falta el nombre cientifico</p>@enderror
              </p></div>
              <div class="col-md-4">
                <p>
                  <p><h4>Tipo de cultivo</h4></p>
                    <select class="form-control" name="tipocultivo">
                      <option value="" disabled selected>Seleccione un tipo de cultivo</option>
                      <option value="Anual">Anual</option>
                      <option value="Perenne">Perenne</option>
                    </select>
                    @error('tipocultivo')<p class="text text-danger">Falta el tipo de cultivo</p>@enderror
                </p></div>
       </div>

       <div class="row">
            <div class="col-md-4">
              <p>
                <p><h4>Modalidad</h4></p>
                  <select class="form-control" name="modalidad">
                    <option value="" disabled selected>Seleccione la modalidad</option>
                    <option value="Riego">Riego</option>
                    <option value="Temporal">Temporal</option>
                  </select>
                  @error('modalidad')<p class="text text-danger">Falta la modalidad</p>@enderror
            </p></div>
            <div class="col-md-4">
              <p>
                <p><h4>Ciclo de cultivo</h4></p>
                  <select class="form-control" name="ciclocultivo">
                    <option value="" disabled selected>Seleccione el ciclo de cultivo</option>
                    <option value="Primavera-verano">Primavera-verano</option>
                    <option value="Primavera-verano">Primavera-otoño</option>
                    <option value="Primavera-verano">Primavera</option>
                    <option value="Otoño-invierno">Otoño-invierno</option>
                    <option value="Primavera-verano">Invierno</option>
                    <option value="Otoño-invierno">Verano-otoño</option>
                    <option value="Otoño-invierno">Otoño-primavera</option>
                    <option value="Primavera-verano">Temporada de lluvias</option>
                  </select>
                  @error('ciclocultivo')<p class="text text-danger">Falta el ciclo</p>@enderror
            </p></div>

     </div>

     <div class="row">
      <div class="col-md-4">
        <p>
          <p><h4>Potencial alto (hec)</h4></p>
          <input class="form-control" placeholder="Ingrese las hectareas de potencial" type="text" name="potencialalto">
          @error('potencialalto')<p class="text text-danger">Falta el potencial</p>@enderror
        </p></div>
        <div class="col-md-4">
          <p>
            <p><h4>Potencial medio (hec)</h4></p>
            <input class="form-control" placeholder="Ingrese las hectareas de potencial" type="text" name="potencialmedio">
            @error('potencialmedio')<p class="text text-danger">Falta el potencial</p>@enderror
          </p></div>
          <div class="col-md-4">
            <p>
              <p><h4>Potencial bajo (hec)</h4></p>
              <input class="form-control" placeholder="Ingrese las hectareas de potencial" type="text" name="potencialbajo">
              @error('potencialbajo')<p class="text text-danger">Falta el potencial</p>@enderror
            </p></div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <p>
          <p><h4>Seleccione el archivo a subir</h4></p>
          <div class="form-group hidden-xs">
            <input type="file" id="exampleInputFile" name="pdf">
            @error('pdf')<p class="text text-danger">Falta el reporte</p>@enderror
          </div>
        </p></div>
        <div class="col-md-4">
          <p>
          </p></div>
          <div class="col-md-4">
            <p>
              <p>
                <button type="button" class="btn btn-primary" id="validateReportButton">Subir reporte</button>
              </p>
            </p></div>
    </div>
    </form>

    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="errorModalLabel">Error al subir el reporte</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Por favor, complete todos los campos faltantes antes de subir el reporte.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
      $('#validateReportButton').click(function (e) {
        e.preventDefault(); // Evita que el formulario se envíe automáticamente

        if (validateForm()) {
          // Si el formulario es válido, continúa con el envío del formulario
          $('#reportForm').submit(); // Envía el formulario
        } else {
          $('#errorModal').modal('show'); // Muestra la ventana emergente de error
        }
      });

      // Función para validar el formulario
      function validateForm() {
        // Realiza la validación del formulario aquí
        var nombreCultivo = document.querySelector('[name="nombrecultivo"]').value;
        var nombreCientifico = document.querySelector('[name="nombrecientifico"]').value;
        var tipoCultivo = document.querySelector('[name="tipocultivo"]').value;
        var modalidad = document.querySelector('[name="modalidad"]').value;
        var cicloCultivo = document.querySelector('[name="ciclocultivo"]').value;
        var potAlto = document.querySelector('[name="potencialalto"]').value;
        var potMedio = document.querySelector('[name="potencialmedio"]').value;
        var potBajo = document.querySelector('[name="potencialbajo"]').value;
        var pdf = document.querySelector('[name="pdf"]').value;

        // Agrega más validaciones según tus necesidades

        // Verifica si algún campo obligatorio está vacío
        if (nombreCultivo === ''
        || nombreCientifico === ''
        || tipoCultivo === ''
        || modalidad === ''
        || cicloCultivo === ''
        || potAlto === ''
        || potMedio === ''
        || potBajo === ''
        || pdf === '') {
          return false; // Devuelve falso si hay campos vacíos
        }
        return true;
      }
    });
</script>



@endsection
