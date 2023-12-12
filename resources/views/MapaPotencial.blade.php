@extends('layouts.appGOB')

@section("title", "MapaPotencial")

@section('content')

<div class="container">
    <ol class="breadcrumb top-buffer">
        <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
        <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
        <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
        <li class="active">Mapa de potencial</li>
    </ol>
</div>

    <!-- Contenido -->
<div class="container">
        <div class="row">
        <div class="col-md-9">
            <h2>Mapa de potencial agrícola</h2>
            <hr class="red">
            <p><b>Potencial Productivo de Especies Agrícolas en el Estado de Zacatecas</b></p> 
            <p>Selecciona el cultivo para saber su potencial.</p>
        </div>
        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('welcome') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('Calculadora') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Calculadora</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('filtrado') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Reportes</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Modo administrador</a>
            </div>
        </div>
        </div>
        <p><h4>Seleccione un cultivo.</h4></p>
        <div class="row">
        <div class="col-md-4">
        <select class="form-control">
            <option>Frijol</option>
            <option>Maiz</option>
            <option>Chile</option>
            <option>Tomate</option>
          </select>
        </div>
        </div>
        

        
        <div class="row">
        <div class="col-md-10">
        <p>Selecciona cualquier área de zacatecas para que se muestre el potencial</p>
            <iframe src="{{ asset('qgis2web_2023_11_30-11_52_49_112592/index.html') }}" width="900" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
        <p align="justify">Como parte de las estrategias para la conversión productiva agropecuaria y forestal en México, en los últimos años han tomado auge los estudios de diagnóstico de potencial productivo de especies vegetales. La determinación del potencial productivo de especies agrícolas, se realizó en el marco de un proyecto nacional. Para tal efecto, se seleccionaron las especies agrícolas más importantes por ambiente ecológico. Las especies seleccionadas para el estado de Zacatecas se presentan en el Cuadro</p>
        <p align="justify">El trabajo consistió en la conjunción de requerimientos agroclimáticos de las especies en cuestión, para ello, a nivel de taller de trabajo, se confrontó información obtenida de revisión bibliográfica, resultados de experimentos del INIFAP, así como la experiencia de investigadores. Una vez ajustados los requerimientos, se determinaron las áreas geográficas con diferente potencial, de acuerdo a imágenes básicas de clima, como temperatura y precipitación, y otras como altitud y pendiente.</p>
        <p align="justify">Para obtener las áreas potenciales, se utilizó la metodología de sobre posición de imágenes de los requerimientos mediante el uso de Sistemas de Información Geográfica (SIG) hasta obtener las áreas potenciales (Medina et al, 1997). Se utilizó el SIG IDRISI. Para cada especie se obtuvo la imagen de las áreas con potencial alto y medio, y en algunos casos potencial bajo, así como el número de hectáreas que representan (Cuadro 1). Para la elaboración de las fichas técnicas se revisó la tecnología disponible en el INIFAP y se consultó con expertos a nivel estatal y nacional.
            Los resultados aquí presentados son parte de la publicación:</p>
        </div>
        </div>

</div>


@endsection