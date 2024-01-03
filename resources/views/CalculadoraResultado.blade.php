@extends("layouts.appGOB")


@section("title", "Calculadora")



@section("content")

<div class="container">
    <ol class="breadcrumb top-buffer">
        <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
        <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
        <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
        <li class="active">Calculadora</li>
    </ol>
</div>

<div class="container">
        <div class="row">
        <div class="col-md-9">
            <h2>Calculadora Agrocostos</h2>
            <hr class="red">
            <h4>Seleccione las características del cultivo</h4><br>

        </div>
        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('welcome') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('MapaPotencial') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Mapa de potencial agrícola</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('filtrado') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Reportes</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Modo administrador</a>
            </div>
        </div>


        </div>
</div>

<div class="container">
    <div class="row">
        <form action="{{ route('calcular.costo') }}" method="post">
        @csrf
        <div class="col-md-3">
            <p><h5>Cultivo</h5></p>
            <select class="form-control" id="nombre" name="nombre">
                <option value="" disabled selected>Seleccione un cultivo</option>
                @foreach ($nombresUnicos as $nombreUnico)
                    <option value="{{ $nombreUnico }}" {{ $nombre == $nombreUnico ? 'selected' : '' }}>{{ $nombreUnico }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <p><h5>Ciclo de cultivo</h5></p>
            <select class="form-control" id="ciclo" name="ciclo">
                <option value="" disabled selected>Seleccione un ciclo de cultivo</option>
                <option value="Primavera-verano" {{ $ciclo == 'Primavera-verano' ? 'selected' : '' }}>Primavera-verano</option>
                <option value="Otoño-invierno" {{ $ciclo == 'Otoño-invierno' ? 'selected' : '' }}>Otoño-invierno</option>
            </select>
        </div>
        <div class="col-md-3">
            <p><h5>No. de hectáreas</h5></p>
            <input class="form-control" id="hectareas" name="hectareas" placeholder="Ingrese las hectáreas a calcular" type="text" value="{{ $hectareas }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-3">
            <p><h5>Modalidad</h5></p>
            <select class="form-control" id="modalidad" name="modalidad">
                <option value="" disabled selected>Seleccione la modalidad</option>
                <option value="Riego" {{ $modalidad == 'Riego' ? 'selected' : '' }}>Riego</option>
                <option value="Temporal" {{ $modalidad == 'Temporal' ? 'selected' : '' }}>Temporal</option>
            </select>
        </div>
        <div class="col-md-3">
            <p><h5>Precio por tonelada $ (MXN)</h5></p>
            <input class="form-control" id="precio_tonelada" name="precio_tonelada" placeholder="Ingrese el precio de cada tonelada" type="text" value="{{ $precio_tonelada }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-5">
            <p><h5>Si desea proyectar los costos a futuro, seleccione un año</h5></p>
            <select class="form-control" id="ano_proyeccion" name="ano_proyeccion">
                <option value="" disabled selected>Seleccione un año de proyección</option>
                <option value="ninguno" {{ $ano_proyeccion == 'ninguno' ? 'selected' : '' }}>Ninguno</option>
                <option value="2024" {{ $ano_proyeccion == '2024' ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ $ano_proyeccion == '2025' ? 'selected' : '' }}>2025</option>
                <option value="2026" {{ $ano_proyeccion == '2026' ? 'selected' : '' }}>2026</option>
                <option value="2027" {{ $ano_proyeccion == '2027' ? 'selected' : '' }}>2027</option>
                <option value="2028" {{ $ano_proyeccion == '2028' ? 'selected' : '' }}>2028</option>
                <option value="2029" {{ $ano_proyeccion == '2029' ? 'selected' : '' }}>2029</option>
            </select>
        </div>
        <div class="col-md-4">
            <br>
            <button type="submit" class="btn btn-primary" id="calcularButton">Calcular</button>
        </div>
    </form>
    </div>
</div><br>

@if (isset($cultivo))
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Resultado</h3>
            <h5>Información del cultivo</h5>
             <!-- Comprueba si $cultivo es un objeto válido -->
                <table class="table table-bordered">
                    <tr style="background:#009933; color:#FFF;">
                        <th>Nombre</th>
                        <th>Tipo de cultivo</th>
                        <th>Modalidad</th>
                        <th>Ciclo de cultivo</th>
                    </tr>
                    <tr>
                        <td>{{ $cultivo->nombre }}</td>
                        <td>{{ $cultivo->tipo }}</td>
                        <td>{{ $cultivo->modalidad }}</td>
                        <td>{{ $cultivo->ciclo }}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosTerreno = $cultivo->costos->where('concepto', 'Preparación del terreno');
            $numCostosTerreno = $costosTerreno->count();
        @endphp

        @if($numCostosTerreno > 0)
        <h5>Preparación del terreno</h5>
        <table class="table table-bordered" data-concepto="Preparación del terreno" style="border: 1px solid;">
            <tr style="background:#009933; color:#FFF;" >
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Preparación del terreno') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosSiembra = $cultivo->costos->where('concepto', 'Siembra');
            $numCostosSiembra = $costosSiembra->count();
        @endphp

        @if($numCostosSiembra > 0)
        <h5>Siembra</h5>
        <table class="table table-bordered" data-concepto="Siembra">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Siembra') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosFertilizacion = $cultivo->costos->where('concepto', 'Fertilización');
            $numCostosFertilizacion = $costosFertilizacion->count();
        @endphp

        @if($numCostosFertilizacion > 0)
        <h5>Fertilización</h5>
        <table class="table table-bordered" data-concepto="Fertilización">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Fertilización') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosMaleza = $cultivo->costos->where('concepto', 'Combate de maleza');
            $numCostosMaleza = $costosMaleza->count();
        @endphp

        @if($numCostosMaleza > 0)
        <h5>Combate de maleza</h5>
        <table class="table table-bordered" data-concepto="Combate de maleza">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Combate de maleza') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosPlagas = $cultivo->costos->where('concepto', 'Control de plagas');
            $numCostosPlagas = $costosPlagas->count();
        @endphp

        @if($numCostosPlagas > 0)
        <h5>Control de plagas</h5>
        <table class="table table-bordered" data-concepto="Control de plagas">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Control de plagas') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosEnfermedades = $cultivo->costos->where('concepto', 'Control de enfermedades');
            $numCostosEnfermedades = $costosEnfermedades->count();
        @endphp

        @if($numCostosEnfermedades > 0)
        <h5>Control de enfermedades</h5>
        <table class="table table-bordered" data-concepto="Control de enfermedades">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Control de enfermedades') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>


<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosFitosanitario = $cultivo->costos->where('concepto', 'Control fitosanitario');
            $numCostosFitosanitario = $costosFitosanitario->count();
        @endphp

        @if($numCostosFitosanitario > 0)
        <h5>Control fitosanitario</h5>
        <table class="table table-bordered" data-concepto="Control fitosanitario">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Control fitosanitario') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosLabores = $cultivo->costos->where('concepto', 'Labores culturales');
            $numCostosLabores = $costosLabores->count();
        @endphp

        @if($numCostosLabores > 0)
        <h5>Labores culturales</h5>
        <table class="table table-bordered" data-concepto="Labores culturales" style="border: 1px solid;">
            <tr style="background:#009933; color:#FFF;" >
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Labores culturales') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosLaboresM = $cultivo->costos->where('concepto', 'Labores manuales');
            $numCostosLaboresM = $costosLaboresM->count();
        @endphp

        @if($numCostosLaboresM > 0)
        <h5>Labores manuales</h5>
        <table class="table table-bordered" data-concepto="Labores manuales" style="border: 1px solid;">
            <tr style="background:#009933; color:#FFF;" >
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Labores manuales') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosRiego = $cultivo->costos->where('concepto', 'Riego y drenaje');
            $numCostosRiego = $costosLabores->count();
        @endphp

        @if($numCostosRiego > 0)
        <h5>Riego y drenaje</h5>
        <table class="table table-bordered" data-concepto="Riego y drenaje" style="border: 1px solid;">
            <tr style="background:#009933; color:#FFF;" >
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Riego y drenaje') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosCosecha = $cultivo->costos->where('concepto', 'Cosecha');
            $numCostosCosecha = $costosCosecha->count();
        @endphp

        @if($numCostosCosecha > 0)

        <h5>Cosecha</h5>
        <table class="table table-bordered" data-concepto="Cosecha">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Cosecha') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosFleteSiembra = $cultivo->costos->where('concepto', 'Flete para siembra');
            $numCostosFlete = $costosFleteSiembra->count();
        @endphp

        @if($numCostosFlete > 0)
        <h5>Flete para siembra</h5>
        <table class="table table-bordered" data-concepto="Flete para siembra">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Flete para siembra') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-10">
        @php
            $costosRentaTierra = $cultivo->costos->where('concepto', 'Renta de la tierra');
            $numCostosRenta = $costosRentaTierra->count();
        @endphp

        @if($numCostosRenta > 0)
        <h5>Renta de la tierra</h5>
        <table class="table table-bordered" data-concepto="Renta de la tierra">
            <tr style="background:#009933; color:#FFF;">
                <th>Insumo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
                <th>Subtotal</th>
            </tr>
            @php
                $totalFinal = 0; // Inicializa la variable del total final
                $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
            @endphp

                @foreach ($cultivo->costos->where('concepto', 'Renta de la tierra') as $costo)
                    <tr>
                        <td>{{ $costo->insumo }}</td>
                        <td>{{ $costo->unidad }}</td>
                        <td>{{ $costo->cantidad }}</td>
                        <td>${{ number_format($costo->precio, 2) }}</td>
                        @php
                            $subtotal = $costo->cantidad * $costo->precio;
                            $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                        @endphp
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
            @endforeach
            <tr>
                <th colspan="4">Total final</th>
                <th>${{ number_format($totalFinal, 2) }}</th>
            </tr>
        </table>
        @endif
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            @php
                $costosAdicionales = $cultivo->costos->where('concepto', 'Costos adicionales');
                $numCostosAdicionales = $costosAdicionales->count();
            @endphp

            @if($numCostosAdicionales > 0)
                <h5>Costos adicionales</h5>
                <table class="table table-bordered" data-concepto="Costos adicionales" style="border: 1px solid;">
                    <tr style="background:#009933; color:#FFF;" >
                        <th>Insumo</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>Costo unitario</th>
                        <th>Subtotal</th>
                    </tr>
                    @php
                        $totalFinal = 0; // Inicializa la variable del total final
                        $subtotalCultivo = 0; // Inicializa el subtotal para el cultivo actual
                    @endphp

                    @foreach ($cultivo->costos->where('concepto', 'Costos adicionales') as $costo)
                        <tr>
                            <td>{{ $costo->insumo }}</td>
                            <td>{{ $costo->unidad }}</td>
                            <td>{{ $costo->cantidad }}</td>
                            <td>${{ number_format($costo->precio, 2) }}</td>
                            @php
                                $subtotal = $costo->cantidad * $costo->precio;
                                $totalFinal += $subtotal; // Agrega el subtotal al subtotal del cultivo actual
                            @endphp
                            <td>${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4">Total final</th>
                        <th>${{ number_format($totalFinal, 2) }}</th>
                    </tr>
                </table>
            @endif
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
    <div class="col-md-10">
            <h5>Costos totales</h5>
            <table class="table table-bordered" data-concepto="Costos totales">
                <tr style="background:#009933; color:#FFF;">
                    <th>Concepto</th>
                    <th>Precio</th>
                </tr>
                <tr>
                    <td>Costo total por tonelada</td>
                    <td>${{ number_format($costoTotal, 2) }}</td>
                </tr>
                <tr>
                    <td>Rendimiento</td>
                    <td>{{ number_format($rendimiento, 2) }}</td>
                </tr>
                <tr>
                    <td>Precio de venta</td>
                    <td>${{ number_format($precio_tonelada, 2) }}</td>
                </tr>
                <tr>
                    <td>Ingreso bruto</td>
                    <td>${{ number_format($ingresoBruto, 2) }}</td>
                </tr>
                <tr>
                    <td>Ingreso neto</td>
                    <td>${{ number_format($ingresoNeto, 2) }}</td>
                </tr>
                <tr>
                    <td>Relación costo-beneficio ($$MXN)</td>
                    <td>{{ number_format($relacionCostoBeneficio, 2) }}</td>
                </tr>
        </table>
    </div>
    </div>
</div>


<div class="container">
    <h4>Semáforo de rentabilidad</h4>
    <div class="row">
        <div class="col-md-8">
            @if($relacionCostoBeneficio >= 0.01)
                <img src="{{ asset('images/verde.png') }}" alt="Semáforo verde" style="width: 200px; height: 80px;">
                <h5>La rentabilidad del cultivo es del: <span style="color: green;">{{ number_format($relacionCostoBeneficio * 100, 0) }}%</span> </h5>
                <h5>El cultivo es rentable para el ciclo seleccionado</h5><br>
                @elseif($relacionCostoBeneficio > -0.01 && $relacionCostoBeneficio < 0.01)
                <img src="{{ asset('images/amarillo.png') }}" alt="Semáforo amarillo" style="width: 200px; height: 80px;">
                <h5>El cultivo no genera ganancias ni pérdidas para el ciclo seleccionado</h5><br>
            @else
                <img src="{{ asset('images/rojo.png') }}" alt="Semáforo rojo" style="width: 200px; height: 80px;">
                <h5>El cultivo no es rentable para el ciclo seleccionado</h5><br>
            @endif
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalServ">Descargar reporte</button>

        </div>
    </div>
</div>

<div class="modal fade" id="modalServ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Descargar reporte</h4>
            </div>
            <form id="downloadForm" action="{{ route('crear.pdf') }}" method="post">
                @csrf
                <input type="hidden" name="cultivo_id" value="{{ $cultivo->id }}">
                <input type="hidden" name="nombre" value="{{ $nombre }}">
                <input type="hidden" name="ciclo" value="{{ $ciclo }}">
                <input type="hidden" name="hectareas" value="{{ $hectareas }}">
                <input type="hidden" name="modalidad" value="{{ $modalidad }}">
                <input type="hidden" name="precio_tonelada" value="{{ $precio_tonelada }}">
                <input type="hidden" name="ano_proyeccion" value="{{ $ano_proyeccion }}">
                <div class="modal-body">
                    <h4>Seleccione el formato deseado</h4>
                    <select name="formato" class="form-control">
                        <option value="pdf">PDF</option>
                        <option value="word">Word</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnDescargar" class="btn btn-primary" onclick="descargar()">Descargar</button>
                    <div id="loader-container" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i> Cargando...
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>

        </div>
    </form>
    </div>
</div>

  @else
    <div class="container">
        <div class="row">
        <div class="col-md-10">
            <p>Lo sentimos, no existe información para el cultivo seleccionado</p>
            </div>
        </div>
    </div>
  @endif

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
      function descargar() {
          // Guarda el contenido original del botón
          var contenidoOriginal = $('#btnDescargar').html();

          // Cambia el contenido del botón a "Cargando"
          $('#btnDescargar').html('<i class="fa fa-spinner fa-spin"></i> Cargando...');

          // Deshabilita el botón para evitar clics múltiples
          $('#btnDescargar').prop('disabled', true);

          // Envía el formulario para descargar el reporte
          $('#downloadForm').submit();

          // Después de un tiempo (puedes ajustar el tiempo según tus necesidades), restaura el contenido del botón
          setTimeout(function () {
              $('#btnDescargar').html(contenidoOriginal);
              // Vuelve a habilitar el botón
              $('#btnDescargar').prop('disabled', false);
          }, 3000); // Ejemplo: restaura el contenido original después de 3000 milisegundos (3 segundos)
      }
  </script>

@endsection
