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
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarCultivo') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar cultivo</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('SubirReportes') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Ver y modificar reportes</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarUsuario') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9 table-responsive" style="margin-bottom:2em;">
            @if(isset($cultivo) && count($cultivo) > 0)
                <table class="table table-bordered table-striped">
                    <tr>
                        <th colspan="1" style="background:#009933; color:#FFF;">Nombre</th>
                        <th colspan="1" style="background:#009933; color:#FFF;">Tipo de cultivo</th>
                        <th colspan="1" style="background:#009933; color:#FFF;">Modalidad</th>
                        <th colspan="1" style="background:#009933; color:#FFF;">Opciones</th>
                    </tr>
                    @foreach($cultivo as $cultivos)
                        <tr>
                            <td valign="middle">{{ $cultivos->nombre }}</td>
                            <td valign="middle">{{ $cultivos->tipo }}</td>
                            <td valign="middle">{{ $cultivos->modalidad }}</td>
                            <td valign="middle">
                                <form method="POST" action="{{ route('actualiza.cultivo', ['id' => $cultivos->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <a href="{{ route('editar.cultivo', ['id' => $cultivos->id]) }}">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modalServ_{{ $cultivos->id }}" style="color: #ff0000;">
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
                        <a href="{{ route('Calculadora') }}" button class="btn btn-primary" type="button">Calcuadora</a>
                    </p>
                      </div></div>
            @else
                <p>No hay cultivos registrados en la base de datos.</p>
            @endif
        </div>
    </div>

</div>


@foreach($cultivo as $cultivos)
    <div class="modal fade" id="modalServ_{{ $cultivos->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <form method="POST" action="{{ route('eliminar.cultivo', ['id' => $cultivos->id]) }}">
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

<!-- Script para actualizar la acción del formulario -->
<script>
    $('#modalServ').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // El botón que activa el modal
        var id = button.data('cultivo-id'); // Obtener el ID del atributo de datos

        // Actualizar la acción del formulario para incluir el ID
        var form = $('#deleteForm');
        form.attr('action', "{{ route('eliminar.cultivo', ['id' => 'REPLACE_ID']) }}".replace('REPLACE_ID', id));
    });
</script>

<script>
    $(document).ready(function () {
        $('a[data-cultivo-id]').on('click', function (event) {
            var cultivoId = $(this).data('cultivo-id');
            console.log('ID del cultivo: ' + cultivoId);
        });
    });
</script>

</div>

</div>

</div>

@endsection
