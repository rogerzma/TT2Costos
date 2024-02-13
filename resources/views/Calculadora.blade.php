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
                    <option value="{{ $nombreUnico }}">{{ $nombreUnico }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">

        </div>
    </div><br>
    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="col-md-4">


</div>

<script type="text/javascript">
    function validarFormulario() {
        var errores = []; // Array para registrar los errores

        // Obtener los valores de los campos del formulario
        var nombre = document.querySelector("input[name='nombre']").value;
        var ciclo = document.querySelector("select[name='ciclo']").value;
        var hectareas = document.querySelector("select[name='hectareas']").value;
        var modalidad = document.querySelector("select[name='modalidad']").value;
        var precio_tonelada = document.querySelector("input[name='precio_tonelada']").value;

        // Validar cada campo según tus criterios y registrar los errores
        if (nombre.trim() === "") {
            errores.push("Nombre");
        }
        if (ciclo === "") {
            errores.push("Ciclo");
        }
        if (hectareas === "") {
            errores.push("Hectáreas");
        }
        if (modalidad === "") {
            errores.push("Modalidad");
        }
        if (precio_tonelada.trim() === "") {
            errores.push("Precio por tonelada");
        } else {
            // Validar si el rendimiento no es numérico
            if (isNaN(precio_tonelada)) {
                errores.push("El valor del precio de tonelada no es numérico");
            }
            if (isNaN(hectareas)) {
                errores.push("El valor de hectáreas no es numérico");
            }
        }

        // Verificar si hay errores y mostrar el alert
        if (errores.length > 0) {
            var mensaje = "Falta información o la información ingresada no es válida en los siguientes campos:\n\n";
            for (var i = 0; i < errores.length; i++) {
                mensaje += "- " + errores[i] + "\n";
            }
            alert(mensaje);
            return false; // Evita que el formulario se envíe
        }

        // Aquí puedes agregar más validaciones y errores si es necesario

        return true; // Permite que el formulario se envíe
    }
</script>
@endsection
