<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de costos en PDF</title>
    
    <!-- Enlaces a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>    
        body {
            margin-top: 110px;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
    
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background-image: url('images/LogoINIFAP.png');
            background-size: contain;
            background-position: right;
            background-repeat: no-repeat;
            height: 90px; /* ajusta la altura según tu necesidad */
            z-index: 1000; /* un valor alto para que esté por encima del contenido */
            margin-bottom: 20px; /* Ajusta el margen inferior del encabezado */
        }
    

    
        main {
            margin-top: 120px; /* Ajusta el margen superior del cuerpo según tu necesidad */
        }
    
        table {
            border-collapse: collapse;
            width: 100%;
        }
    
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    
        th {
            background-color: #f2f2f2;
        }
    
        h3 {
            color: black;
            text-align: center;
            font-family: 'Arial', sans-serif;
            /* Cambia el color del texto según tus preferencias */
        }

        h5 {
            color: black;
            font-family: 'Arial', sans-serif;
            /* Cambia el color del texto según tus preferencias */
        }
    
        /* Estilos para la impresión */
        @media print {
            body {
                margin-top: 120px; /* Ajusta el margen superior del cuerpo para imprimir */
            }
        }
    </style>
</head>

<body>

    <header>
        <!-- Puedes agregar aquí cualquier contenido adicional para el encabezado -->
    </header>

    <div id="header-space"></div>


   
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Resultado</h3>
                <h5>Información del cultivo</h5>
                 <!-- Comprueba si $cultivo es un objeto válido -->
                    <table class="table table-bordered">
                        <tr>
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


    <br>
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
                <tr style="background:#009933;" >
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;" >
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

    <br>
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
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
                <tr style="background:#009933;">
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
    
    <br>
    <div class="container">
        <div class="row">
        <div class="col-md-10">
            @php
                $costosAdicionales = $cultivo->costos->where('concepto', 'Costos adicionales');
                $numCostosAdicionales = $costosAdicionales->count();
            @endphp
    
            @if($numCostosAdicionales > 0)
            <h5>Costos adicionales</h5>
            <table class="table table-bordered" data-concepto="Costos adicionales">
                <tr style="background:#009933;">
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
                    <tr>
                        <th>Concepto</th>
                        <th>Precio</th>
                    </tr>
                    <tr>
                        <td>Costo total</td>
                        <td>${{ number_format($costoTotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Rendimiento</td>
                        <td>{{ number_format($rendimiento, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Precio</td>
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
                        <td>Relación costo-beneficio</td>
                        <td>{{ number_format($relacionCostoBeneficio, 2) }}</td>
                    </tr>   
            </table> 
        </div>
        </div>
    </div> 
 
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if($relacionCostoBeneficio >= 0.01)
                    <h5>La rentabilidad del cultivo es del: <span style="color: green;">{{ number_format($relacionCostoBeneficio * 100, 0) }}%</span> </h5>
                    <h5>El cultivo es rentable para el ciclo seleccionado</h5><br>
                @elseif($relacionCostoBeneficio > -0.01 && $relacionCostoBeneficio < 0.01)
                    <h5>La rentabilidad del cultivo es del: <span style="color: yellow;">{{ number_format($relacionCostoBeneficio * 100, 2) }}%</span> </h5>
                    <h5>El cultivo no genera ganancias ni pérdidas para el ciclo seleccionado</h5><br>
                @else
                    <h5>La rentabilidad del cultivo es del: <span style="color: red;">{{ number_format($relacionCostoBeneficio * 100, 2) }}%</span> </h5>
                    <h5>El cultivo no es rentable para el ciclo seleccionado</h5><br>
                @endif
            </div>
        </div>
    </div>

    <!-- Enlaces a Bootstrap JS y jQuery (necesarios para algunos componentes de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</body>
</html>