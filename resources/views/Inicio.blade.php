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
                    <p>Seleccione una opción</p> 
                </div>
                <div class="col-md-3">

                    <!--SECCIÓN MODIFICABLE | MENU CONTEXTUAL -->
                    <div class="list-group">
                        <a class="list-group-item" style="text-decoration: none;" href="{{ route('welcome') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                        <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Modo administrador</a>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-3">    
                <p>
                <a href="{{ route('calculadora') }}" button class="btn btn-default" type="button">Calculadora de costos</a>
                </p></div> 
            <div class="col-md-3">    
                <p>
                <a href="{{ route('MapaPotencial') }}" button class="btn btn-default" type="button">Mapa Potencial</a>
                </p></div>
            <div class="col-md-3">    
                <p>
                    <a href="{{ route('filtrado') }}" button class="btn btn-default" type="button">Reportes</a>
                </p></div>
            </div>
        
            <div class="row">
                <div class="col-md-9">
                    <h4>Agrocosotos</h4>
                        <p align="justify">Los Agrocostos apoyan y dan certeza a los intermediarios financieros en la toma de decisiones 
                        de CRÉDITO y facilitan la operación de los servicios de fondeo, garantía y apoyos tecnológicos de INIFAP.</p>
                    <h5>Calculadora de costos</h5>
                        <p align="justify">En el apartado u oprimiendo el botón "Calculadora de costos" lo redirigirá a la herramienta 
                            que permite estimar de manera paramétrica costos de producción agrícola en una zona o región determinada.
                            Usted como usuario podrá seleccionar el cultivo para realizar su estimación, ya sea frijol, maíz, etc. Seleccionará
                            el ciclo del cultivo, ingresara el número de hectáreas en el que planea sembrar dicho cultivo, la modalidad que 
                            desea ya sea riego o temporal y por último ingresará el precio por tonelada.</p>
                    <h5>Mapa potencial</h5>
                        <p align="justify">En el apartado u oprimiendo el botón "Mapa Potencial" lo redirigirá al mapa interactivo creado con el fin
                            que usted como usuario pueda navegar por zacatecas para saber el potencial agrícola en ciertas zonas del estado y sus municipios,
                            el potencial agrícola nos referimos a la capacidad de uso agrícola, a la aptitud para el desarrollo de cultivos, la aptitud para la 
                            labranza y la aptitud para la implantación de obras para riego. Aquí al seleccionar un cultivo ya sea frijol, maíz, chile, etc. 
                            Le mostrará en el mapa un código de colores: Verde quiere decir que el potencial en dicha zona es alto, Amarrillo quiere decir que 
                            el potencial en dicha zona es medio y por último Rojo quiere decir que el potencial en dicha zona es bajo.</p>
                    <h5>Reportes</h5>
                        <p align="justify">En el apartado u oprimiendo el botón "Reportes" lo redirigirá al listado de reportes producidos por el INIFAP
                            zacatecas, en este apartado usted como usuario podrá filtrar dichos reportes ya sea por el cultivo como por ejemplo ajo, almendro etc.
                            La modalidad que desea ya sea riego o temporal, puede filtrar por los diferentes ciclos de cultivo primavera-verano etc.,
                            y por último el tipo de cultivo si es anual, perene etc.</p>

                        <h4>Cultivos más populares de la temporada</h4>

                        <div class="row">
                            <div class="col-md-9">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <br>
                        
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


</div>



    @endsection