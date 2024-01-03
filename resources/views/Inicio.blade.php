@extends('layouts.appGOB')

@section("title", "Inicio")

@section('content')

<div class="container">
    <ol class="breadcrumb top-buffer">
        <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
        <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
        <li class="active">Agrocostos</li>
    </ol>
</div>

        <div class="container">
                <div class="row">
                <div class="col-md-9">
                    <h2>Agrocostos</h2>
                    <hr class="red">
                </div>
                <div class="col-md-3">

                    <!--SECCIÓN MODIFICABLE | MENU CONTEXTUAL -->
                    <div class="list-group">
                        <a class="list-group-item" style="text-decoration: none;" href="{{ route('welcome') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                        <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="images/templatemo_list.png" style="margin-right:10px;">Modo administrador</a>
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-md-9">
                    <h4>Descripción</h4>
                        <p align="justify">Los Agrocostos apoyan y dan certeza a los intermediarios financieros en la toma de decisiones
                        de CRÉDITO y facilitan la operación de los servicios de fondeo, garantía y apoyos tecnológicos de INIFAP.</p>
                    <h5>Calculadora de costos</h5>
                        <p align="justify">En el apartado u oprimiendo el botón "Calculadora de costos", el usuario podrá seleccionar el cultivo para realizar su estimación.
                            Permitirá que que el productor realice diferentes estimaciones de costos de los cultivos que desee, así como proyecciones a distintos plazos.</p>
                            <p>
                                <a href="{{ route('Calculadora') }}" button class="btn btn-default" type="button">Calculadora de costos</a>
                            </p>
                    <h5>Mapa potencial</h5>
                        <p align="justify">En el apartado "Mapa Potencial", el usuario podrá navegar por un mapa de Zacatecas para saber el potencial agrícola
                            de algún cultivo en ciertas zonas del estado y sus municipios.</p>
                            <p>
                                <a href="{{ route('MapaPotencial') }}" button class="btn btn-default" type="button">Mapa Potencial</a>
                             </p>
                            <h5>Reportes</h5>
                        <p align="justify">En el apartado "Reportes", el usuario podrá visualizar el listado de reportes que posee el INIFAP
                            Zacatecas. De igual manera, se podrán filtrar los diferentes reportes según las características y necesidades del usuario.</p>
                            <p>
                                <a href="{{ route('filtrado') }}" button class="btn btn-default" type="button">Reportes</a>
                            </p>

                        <h4>Cultivos más populares de la temporada</h4>

                        <div class="row">
                            <div class="col-md-9">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

                        <script>
                            const ctx = document.getElementById('myChart').getContext('2d');
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Chile verde', 'Frijol', 'Maíz grano', 'Tomate rojo', 'Maíz forrajero'],
                                    datasets: [{
                                        label: 'Toneladas',
                                        data: [423757, 423394, 402221, 182773, 1975944],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.7)',
                                            'rgba(54, 162, 235, 0.7)',
                                            'rgba(255, 206, 86, 0.7)',
                                            'rgba(75, 192, 192, 0.7)',
                                            'rgba(153, 102, 255, 0.7)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        <br>


</div>
 @endsection
