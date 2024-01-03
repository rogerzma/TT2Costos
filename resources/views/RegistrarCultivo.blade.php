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
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Lista de cultivos</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('SubirReportes') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Ver y modificar reportes</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarUsuario') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
                </div>
            </div>
        </div>
        </div>


    <div class="container">
        <form id="Formulario" action="{{ route('crear.cultivo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2 5">
                <p>Nombre</p>
                <input class="form-control" placeholder="Ingrese el nombre del cultivo" type="text" name="nombre"></div>
                @error('nombre')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            <div class="col-md-2 5">
                <p>Tipo de cultivo</p>
                <select class="form-control" name="tipo">
                    <option value="" disabled selected>Seleccione un tipo de cultivo</option>
                    <option value="Anual">Anual</option>
                    <option value="Perenne">Perenne</option>
                </select>
                @if ($errors->has('tipo'))
                    <p class="text-danger">{{ $errors->first('tipo') }}</p>
                @endif
            </div>
            <div class="col-md-2 5">
                <p>Modalidad</p>
                <select class="form-control" name="modalidad">
                    <option value="" disabled selected>Seleccione la modalidad</option>
                    <option value="Riego">Riego</option>
                    <option value="Temporal">Temporal</option>
                </select>
                @if ($errors->has('modalidad'))
                    <p class="text-danger">{{ $errors->first('modalidad') }}</p>
                @endif
                </div>
            <div class="col-md-2 5">
                <p>Ciclo del cultivo</p>
                <select class="form-control" name="ciclo">
                        <option value="" disabled selected>Seleccione el ciclo de cultivo</option>
                        <option value="Primavera-verano">Primavera-verano</option>
                        <option value="Otoño-invierno">Otoño-invierno</option>
                    </select>
                    @if ($errors->has('ciclo'))
                    <p class="text-danger">{{ $errors->first('ciclo') }}</p>
                @endif
                </div>
            <div class="col-md-2 5">
                <p>Rendimiento</p>
                <input class="form-control" placeholder="Ingrese el rendimiento" type="text" name="rendimiento"></div>
                @if ($errors->has('rendimiento'))
                    <p class="text-danger">{{ $errors->first('rendimiento') }}</p>
                @endif
        </div>


            <br><h5>Preparación del terreno</h5>
            <div class="row fila-concepto">
                <br>
                <div class="col-md-2 5">
                    <input type="hidden" name="costo[0][concepto]" class="conceptoOriginal" value="Preparación del terreno">
                    <p>Insumo</p>
                    <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[0][insumo]">
                </div>
                <div class="col-md-2 5">
                    <p>Unidad</p>
                    <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[0][unidad]">
                </div>
                <div class="col-md-2 5">
                    <p>Cantidad</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[0][cantidad]">
                </div>
                <div class="col-md-2 5">
                    <p>Precio ($$ MXN)</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[0][precio]">
                </div>
                <div class="col-md-2">
                    <br><br>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 5">
                    <br>
                    <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
                </div>
            </div>


        <br><h5>Siembra</h5>

        <div class="row fila-concepto" >
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[1][concepto]" class="conceptoOriginal" value="Siembra" data-index="1">
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
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 5">
                <br>
                <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
            </div>
        </div>


        <br><h5>Fertilización</h5>

        <div class="row fila-concepto" >
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[2][concepto]" class="conceptoOriginal" value="Fertilización" data-index="2">
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
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 5">
                <br>
                <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
            </div>
        </div>

        <br><h5>Combate de maleza</h5>

        <div class="row fila-concepto" >
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[3][concepto]" class="conceptoOriginal" value="Combate de maleza" data-index="3">
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
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 5">
                <br>
                <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
            </div>
        </div>



    <br><h5>Control de plagas</h5>

        <div class="row fila-concepto">
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[4][concepto]" class="conceptoOriginal" value="Control de plagas" data-index="4">
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
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>


    <br><h5>Control de enfermedades</h5>

        <div class="row fila-concepto">
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[5][concepto]" class="conceptoOriginal" value="Control de enfermedades" data-index="5">
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
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Control fitosanitario</h5>

    <div class="row fila-concepto">
        <br>
        <div class="col-md-2 5">
            <input type="hidden" name="costo[6][concepto]" class="conceptoOriginal" value="Control fitosanitario" data-index="6">
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
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>


    <br><h5>Labores culturales</h5>
        <br>
        <div class="row fila-concepto">
            <div class="col-md-2 5">
                <input type="hidden" name="costo[7][concepto]" class="conceptoOriginal" value="Labores culturales" data-index="6">
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
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Labores manuales</h5>

    <div class="row fila-concepto">
        <br>
        <div class="col-md-2 5">
            <input type="hidden" name="costo[8][concepto]" class="conceptoOriginal" value="Labores manuales" data-index="8">
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
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
</div>
<div class="row">
    <div class="col-md-2 5">
        <br>
        <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
    </div>
</div>

    <br><h5>Riego y drenaje</h5>
    <div class="row fila-concepto">
        <br>
        <div class="col-md-2 5">
            <input type="hidden" name="costo[9][concepto]" class="conceptoOriginal" value="Riego y drenaje" data-index="9">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[9][insumo]"></div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[9][unidad]"></div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[9][cantidad]"></div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[9][precio]"></div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
</div>
<div class="row">
    <div class="col-md-2 5">
        <br>
        <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
    </div>
</div>


    <br><h5>Cosecha</h5>

    <div class="row fila-concepto">
        <br>
        <div class="col-md-2 5">
            <input type="hidden" name="costo[10][concepto]" class="conceptoOriginal" value="Cosecha" data-index="10">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[10][insumo]"></div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[10][unidad]"></div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[10][cantidad]"></div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[10][precio]"></div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Flete para siembra</h5>

        <div class="row fila-concepto">
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[11][concepto]" class="conceptoOriginal" value="Flete para siembra" data-index="11">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[11][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[11][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[11][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[11][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>


    <br><h5>Renta de la tierra</h5>

        <div class="row fila-concepto">
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[12][concepto]" class="conceptoOriginal" value="Renta de la tierra" data-index="12">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[12][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[12][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[12][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[12][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>

        </div>
    </div>

    <br><h5>Costos adicionales</h5>

        <div class="row fila-concepto">
            <br>
            <div class="col-md-2 5">
                <input type="hidden" name="costo[13][concepto]" class="conceptoOriginal" value="Costos adicionales" data-index="13">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[13][insumo]"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[13][unidad]"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[13][cantidad]"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[13][precio]"></div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
    </div>
    <div class="row">
        <div class="col-md-2 5">
            <br>
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>

        </div>
    </div>

    <br>
        <br>
        <div class="row">
            <div class="col-md-2 5">
            </div>
            <div class="col-md-2 5">
            </div>
            <div class="col-md-2 5">
            </div>
            <div class="col-md-2 5">
                <input type="hidden" name="num_filas_costos" id="num_filas_costos" value="14">
                <button type="submit" class="btn btn-primary pull-right">Registrar cultivo</button>
            </div>
    </div><br>
</form>
    </div>
</div>

<script type="text/javascript">
    var contadorFilas = 14; // Inicializado a 0
    document.addEventListener("DOMContentLoaded", function() {
        // Busca todos los botones con la clase 'btn-agregar-costo'
        var botonesAgregarCosto = document.querySelectorAll('.btn-agregar-costo');

        // Agrega un manejador de eventos a cada botón
        botonesAgregarCosto.forEach(function(boton) {
            boton.addEventListener('click', function() {
                agregarFilaCosto(boton, contadorFilas);
                contadorFilas++; // Incrementa el contador
            });
        });
        document.getElementById("Formulario").addEventListener("submit", function(event) {
            var errores = validarFormulario(); // Llama a la función y obtén los errores

            if (errores.length > 0) {
                // Evitar el envío del formulario si hay errores
                event.preventDefault();

                // Mostrar un mensaje de error en una ventana emergente con los errores
                alert("Hubo errores en los siguientes campos: " + errores.join(", ") + ". Verifique que la información esté completa");
                if ($('.fila-concepto').length === 0) {
                    agregarFilaCosto(botonesAgregarCosto[0], contadorFilas);
                    contadorFilas++;
                }
            }
        });
    });

    function agregarFilaCosto(button, contadorFilas) {
        // Encuentra la fila de costo original
        var filaOriginal = $(button).closest('.row').prev('.fila-concepto');
        const conceptoOriginal = filaOriginal.find('.conceptoOriginal').val();

        // Clona la fila de costo original
        //var nuevaFila = filaOriginal.clone();

        var filasMismoConcepto = $('.fila-concepto').filter(function() {
            return $(this).find('.conceptoOriginal').val() === conceptoOriginal;
        });

        if (filasMismoConcepto.length > 0) {
            // Si existen filas con el mismo concepto, duplica la última encontrada
            var nuevaFila = filasMismoConcepto.last().clone();
        } else {
            // Si no existen filas con el mismo concepto, crea una nueva fila desde cero
            if (filasMismoConcepto.length > 0) {
        // Si existen filas con el mismo concepto, duplica la última encontrada
        var nuevaFila = filasMismoConcepto.last().clone();
    } else {
        // Si no existen filas con el mismo concepto, crea una nueva fila desde cero
        var nuevaFila = $("<div class='row fila-concepto'></div>");

        // Añade el contenido de la nueva fila
        nuevaFila.html(`
                <div class="col-md-2 5">
                    <input type="hidden" name="costo[${contadorFilas}][concepto]" class="conceptoOriginal" value="${conceptoOriginal}" data-index="${contadorFilas}">
                    <p>Insumo</p>
                    <input class="form-control" placeholder="Ingrese el concepto" type="text" name="costo[${contadorFilas}][insumo]">
                </div>
                <div class="col-md-2 5">
                    <p>Unidad</p>
                    <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[${contadorFilas}][unidad]">
                </div>
                <div class="col-md-2 5">
                    <p>Cantidad</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[${contadorFilas}][cantidad]">
                </div>
                <div class="col-md-2 5">
                    <p>Precio ($$ MXN)</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[${contadorFilas}][precio]">
                </div>
                <div class="col-md-2">
                    <br><br>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
                </div>
            `);
        }
        }

        // Incrementa el índice
        var nuevoIndice = contadorFilas;

        // Actualiza el índice en los nombres de entrada y en el atributo data-index
        nuevaFila.find("input[type='text'], input[type='hidden']").each(function () {
            var nombre = $(this).attr("name");
            nombre = nombre.replace(/\[\d+\]/g, "[" + nuevoIndice + "]");
            $(this).attr("name", nombre);
            $(this).data("index", nuevoIndice);
            // Si el nombre contiene "concepto", actualiza el valor
            if (nombre.includes("[concepto]")) {
                $(this).val(conceptoOriginal);
            }
        });

        // Limpia los campos de entrada en la fila duplicada, excepto el botón
        nuevaFila.find("input[type='text']").not(button).val("");



        // Inserta la nueva fila después de la fila original
        nuevaFila.insertAfter(filaOriginal);

        // Opcional: Enfoca el primer campo de entrada en la nueva fila
        nuevaFila.find("input[type='text']:first").focus();

        contadorFilas++;
        document.getElementById('num_filas_costos').value = contadorFilas;
    }
    // Función para eliminar una fila
    function eliminarFila(boton) {
        var fila = boton.closest('.fila-concepto'); // Busca la fila de concepto más cercana
        fila.parentNode.removeChild(fila);

        // Reindexar las filas después de eliminar una
        var filasConcepto = document.querySelectorAll('.fila-concepto');
        filasConcepto.forEach(function (fila, index) {
            fila.querySelectorAll("input[type='text'], input[type='hidden']").forEach(function (input) {
                var nombre = input.name.replace(/\[\d+\]/g, "[" + index + "]");
                input.name = nombre;
                input.dataset.index = index;
            });
        });

        contadorFilas--; // Decrementa el contador
        document.getElementById('num_filas_costos').value = contadorFilas; // Actualiza el valor del contador
    }


</script>
@endsection
