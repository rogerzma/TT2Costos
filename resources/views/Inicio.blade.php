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
                        <p align="justify">Los Agrocostos apoyan y dan certeza a los intermediarios financieros en la toma de decisiones de CRÉDITO y facilitan la operación de los servicios de fondeo, garantía y apoyos tecnológicos de INIFAP.
                        El sistema de Agrocostos es una herramienta que permite estimar de manera paramétrica costos de producción agrícola en una zona o región determinada bajo una tecnología de producción específica.</p>
            <h4>Cultivos más populares de la temporada</h4>
                </div>
                
            </div>


            

        </div>

        

        </main>
    

</div>



    @endsection