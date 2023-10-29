@extends("layouts.appGOB")

@section("title", "RegistrarCultivo")

@section("view-name", "RegistrarCultivo")

@section("content")

<div class="container">
    <ol class="breadcrumb top-buffer">
        <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
        <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
        <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
        <li class="active">Registrar cultivo</li>
    </ol>
</div>

        <div class="container">
            <div class="row">
            <div class="col-md-9">
                <br><h2>Registrar cultivo</h2>
                <hr class="red">
                <h5>Características generales</h5><br> 
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Lista de cultivos</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('SubirReportes') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Ver y modificar reportes</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('register') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
                </div>
            </div>
        </div>
        </div>


    <div class="container">
        <form action="{{ route('crear.cultivo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2 5">
                <p>Nombre</p>
                <input class="form-control" placeholder="Area de texto" type="text" name="nombre"></div>
            <div class="col-md-2 5">
                <p>Tipo de cultivo</p>
                <select class="form-control" name="tipo">
                    <option value="" disabled selected>Seleccione un tipo de cultivo</option>
                    <option value="Anual">Anual</option>
                    <option value="Perenne">Perenne</option>
                </select>
            </div>
            <div class="col-md-2 5">
                <p>Modalidad</p>
                <select class="form-control" name="modalidad">
                    <option value="" disabled selected>Seleccione la modalidad</option>
                    <option value="Riego">Riego</option>
                    <option value="Temporal">Temporal</option>
                </select>
                </div>
            <div class="col-md-2 5">
                <p>Ciclo del cultivo</p>
                <select class="form-control" name="ciclo">
                        <option value="Primavera-verano">Primavera-verano</option>
                        <option value="Otoño-invierno">Otoño-invierno</option>
                    </select>
                </div>
            <div class="col-md-2 5">
                <p>Rendimiento</p>
                <input class="form-control" placeholder="Area de texto" type="text" name="rendimiento"></div>
        </div>
    
    <input type="hidden" name="costo[0][concepto]" value="Preparación del terreno">
    <br><h5>Preparación del terreno</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[0][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[0][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[0][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[0][precio]"></div>
            <div class="col-md-2">
                 <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                 <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>   
    
    <input type="hidden" name="costo[1][concepto]" value="Siembra">
    <br><h5>Siembra</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[1][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[1][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[1][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[1][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>   

    <input type="hidden" name="costo[2][concepto]" value="Fertilizacion">
    <br><h5>Fertilización</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[2][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[2][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[2][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[2][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>  

    <input type="hidden" name="costo[3][concepto]" value="Combate de maleza">
    <br><h5>Combate de maleza</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[3][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[3][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[3][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[3][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>  


    <input type="hidden" name="costo[4][concepto]" value="Control de plagas">
    <br><h5>Control de plagas</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[4][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[4][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[4][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[4][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>  

    <input type="hidden" name="costo[5][concepto]" value="Control de enfermedades">
    <br><h5>Control de enfermedades</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[5][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[5][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[5][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[5][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>  


    <input type="hidden" name="costo[6][concepto]" value="Cosecha">
    <br><h5>Cosecha</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[6][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[6][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[6][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[6][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>  

    <input type="hidden" name="costo[7][concepto]" value="Flete para siembra">
    <br><h5>Flete para siembra</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[7][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[7][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[7][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[7][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>  

    <input type="hidden" name="costo[8][concepto]" value="Renta de la tierra">
    <br><h5>Renta de la tierra</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[8][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[8][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[8][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[8][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px; cursor: pointer; color:#1900ff" onclick="duplicarFila(this)"></span>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
        <br>
        <div class="row">
            <div class="col-md-2 5">
                <button type="submit" class="btn btn-primary pull-right">Registrar cultivo</button>
            </div>
    </div><br>
</form>

</div> 


<script>
    function duplicarFila(plusIcon) {
        var filaActual = $(plusIcon).closest('.row');
        var filaClonada = filaActual.clone();

        // Limpiar los valores de los campos clonados
        filaClonada.find('input').val('');

        // Encontrar el último índice
        var lastIndex = parseInt(filaClonada.find('input[name^="costo["]').last().attr('name').match(/\d+/)[0]);

        // Incrementar el índice para los campos clonados
        filaClonada.find('input[name^="costo["]').each(function() {
            var fieldName = $(this).attr('name').replace(/\d+/, lastIndex + 1);
            $(this).attr('name', fieldName);
        });

        // Agregar la fila clonada después de la fila actual
        filaActual.after(filaClonada);
    }

    function eliminarFila(trashIcon) {
        var filaActual = $(trashIcon).closest('.row');
        filaActual.remove();
    }
</script>


@endsection