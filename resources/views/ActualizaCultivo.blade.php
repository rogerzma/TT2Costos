@extends("layouts.appGOB")

@section("title", "ActualizaCultivo")

@section("view-name", "ActualizaCultivo")

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
                <br><h2>Modificar cultivo</h2>
                <hr class="red">
                <h5>Características generales</h5><br> 
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('InicioAdministrador') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('ListaCultivos') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Lista de cultivos</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('SubirReportes') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Ver y modificar reportes</a>
                    <a class="list-group-item" style="text-decoration: none;" href="{{ route('RegistrarUsuario') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Registrar usuarios</a>
                </div>
            </div>
        </div>
        </div>


    <div class="container">
        <form id="Formulario" action="{{ route('actualiza.cultivo', ['id' => $cultivo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-md-2 5">
                <p>Nombre</p>
                <input class="form-control" placeholder="Ingrese el nombre del cultivo" type="text" name="nombre" value="{{ $cultivo->nombre }}">
            </div>
            <div class="col-md-2">
                <p>Tipo de cultivo</p>
                <select class="form-control" name="tipo">
                    <option value="" disabled selected>Seleccione un tipo de cultivo</option>
                    <option value="Anual" {{ $cultivo->tipo === 'Anual' ? 'selected' : '' }}>Anual</option>
                    <option value="Perenne" {{ $cultivo->tipo === 'Perenne' ? 'selected' : '' }}>Perenne</option>
                </select>
            </div>
            <div class="col-md-2 5">
                <p>Modalidad</p>
                <select class="form-control" name="modalidad">
                    <option value="" disabled selected>Seleccione la modalidad</option>
                    <option value="Riego" {{ $cultivo->modalidad === 'Riego' ? 'selected' : '' }}>Riego</option>
                    <option value="Temporal" {{ $cultivo->modalidad === 'Temporal' ? 'selected' : '' }}>Temporal</option>
                </select>
               </div>
            <div class="col-md-2 5">
                <p>Ciclo del cultivo</p>
                <select class="form-control" name="ciclo">
                        <option value="" disabled selected>Seleccione el ciclo de cultivo</option>
                        <option value="Primavera-verano" {{ $cultivo->ciclo === 'Primavera-verano' ? 'selected' : '' }}>Primavera-verano</option>
                        <option value="Otoño-invierno" {{ $cultivo->ciclo === 'Otoño-invierno' ? 'selected' : '' }}>Otoño-invierno</option>
                    </select>
                    </div>
            <div class="col-md-2 5">
                    <p>Rendimiento</p>
                    <input class="form-control" placeholder="Ingrese el rendimiento" type="text" name="rendimiento" value="{{ $cultivo->rendimiento }}">
                </div>
        </div>


            <br><h5>Preparación del terreno</h5><br>
            @foreach($costos as $index => $costo)
            @if($costo->concepto === 'Preparación del terreno')
            <div class="row fila-concepto">
                <div class="col-md-2 5">
                    <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Preparación del terreno">
                    <p>Insumo</p>
                    <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
                </div>
                <div class="col-md-2 5">
                    <p>Unidad</p>
                    <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
                </div>
                <div class="col-md-2 5">
                    <p>Cantidad</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
                </div>
                <div class="col-md-2 5">
                    <p>Precio ($$ MXN)</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
                </div>
                <div class="col-md-2">
                    <br><br>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
                </div>
            </div>
            @endif
            @endforeach
            <div class="row">
                <div class="col-md-2 5">
                    <br> 
                    <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
                </div>
            </div>
    
    
        <br><h5>Siembra</h5><br>

        @foreach($costos as $index => $costo)
            @if($costo->concepto === 'Siembra')
            <div class="row fila-concepto">
                <div class="col-md-2 5">
                    <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Siembra">
                    <p>Insumo</p>
                    <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
                </div>
                <div class="col-md-2 5">
                    <p>Unidad</p>
                    <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
                </div>
                <div class="col-md-2 5">
                    <p>Cantidad</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
                </div>
                <div class="col-md-2 5">
                    <p>Precio ($$ MXN)</p>
                    <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
                </div>
                <div class="col-md-2">
                    <br><br>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
                </div>
            </div>
            @endif
            @endforeach
          <div class="row">
            <div class="col-md-2 5">
                <br> 
                <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
            </div>
        </div>

    
    <br><h5>Fertilización</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Fertilización')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Fertilización">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    
    <br><h5>Combate de maleza</h5><br>

        @foreach($costos as $index => $costo)
        @if($costo->concepto === 'Combate de maleza')
        <div class="row fila-concepto">
            <div class="col-md-2 5">
                <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Combate de maleza">
                <p>Insumo</p>
                <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
            </div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
            </div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
            </div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
            </div>
            <div class="col-md-2">
                <br><br>
                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
            </div>
        </div>
        @endif
        @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Control de plagas</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Control de plagas')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Control de plagas">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>
    

    <br><h5>Control de enfermedades</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Control de enfermedades')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Control de enfermedades">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Control fitosanitario</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Control fitosanitario')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Control fitosanitario">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Labores culturales</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Labores culturales')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Labores culturales">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Labores manuales</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Labores manuales')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Labores manuales">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Riego y drenaje</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Riego y drenaje')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Riego y drenaje">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>


    <br><h5>Cosecha</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Cosecha')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Cosecha">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>

        </div>
    </div>

    <br><h5>Flete para siembra</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Flete para siembra')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Flete para siembra">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    
    <br><h5>Renta de la tierra</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Renta de la tierra')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Renta de la tierra">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-2 5">
            <br> 
            <button class="btn btn-warning pull-right btn-agregar-costo" type="button">Agregar Costo</button>
        </div>
    </div>

    <br><h5>Costos adicionales</h5><br>

    @foreach($costos as $index => $costo)
    @if($costo->concepto === 'Costos adicionales')
    <div class="row fila-concepto">
        <div class="col-md-2 5">
            <input type="hidden" name="costo[{{ $index }}][concepto]" class="conceptoOriginal" value="Costos adicionales">
            <p>Insumo</p>
            <input class="form-control" placeholder="Ingrese el insumo" type="text" name="costo[{{ $index }}][insumo]" value="{{ $costo->insumo }}">
        </div>
        <div class="col-md-2 5">
            <p>Unidad</p>
            <input class="form-control" placeholder="Ingrese la unidad de medición" type="text" name="costo[{{ $index }}][unidad]" value="{{ $costo->unidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Cantidad</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][cantidad]" value="{{ $costo->cantidad }}">
        </div>
        <div class="col-md-2 5">
            <p>Precio ($$ MXN)</p>
            <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text" name="costo[{{ $index }}][precio]" value="{{ $costo->precio }}">
        </div>
        <div class="col-md-2">
            <br><br>
            <span class="glyphicon glyphicon-trash" aria-hidden="true" style="cursor: pointer; color:#ff0000;" onclick="eliminarFila(this)"></span>
        </div>
    </div>
    @endif
    @endforeach
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
                <input type="hidden" name="num_filas_costos" id="num_filas_costos" value="{{ $numFilasTotal }}">
                <button type="submit" class="btn btn-primary pull-right">Registrar cultivo</button>
            </div>
    </div><br>
</form>
    </div>
</div> 

<script type="text/javascript">
    var contadorFilas = document.querySelectorAll('.fila-concepto').length;
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
            var nuevaFila = filaOriginal.clone();
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