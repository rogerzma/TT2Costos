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
    <div class="container">
        <div class="row">
            <div class="col-md-2 5">
                <p>Nombre</p>
                <input class="form-control" placeholder="Area de texto" type="text"></div>
            <div class="col-md-2 5">
                <p>Tipo de cultivo</p>
                <select class="form-control" placeholder="Area de texto">
                    <option>Anual</option>
                    <option>Perenne</option>
                </select>
            </div>
            <div class="col-md-2 5">
                <p>Modalidad</p>
                <select class="form-control" placeholder="Area de texto">
                    <option>Riego</option>
                    <option>Temporal</option>
                </select>
                </div>
            <div class="col-md-2 5">
                <p>Ciclo del cultivo</p>
                <select class="form-control" placeholder="Area de texto">
                        <option>Primavera-verano</option>
                        <option>Otoño-invierno</option>
                    </select>
                </div>
            <div class="col-md-2 5">
                <p>Rendimiento</p>
                <input class="form-control" placeholder="Area de texto" type="text"></div>
        </div>

    <br><h5>Preparación del terreno</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>   

    <br><h5>Siembra</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div> 

    <br><h5>Fertilización</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>   

    <br><h5>Combate de maleza</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>  

    <br><h5>Control de plagas</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>  

    <br><h5>Control de enfermedades</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>   

    <br><h5>Cosecha</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>  

    <br><h5>Flete para siembra</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div>   

    <br><h5>Renta de la tierra</h5><br>

        <div class="row">
            <div class="col-md-2 5">
                <p>Concepto</p>
                <input class="form-control" placeholder="Ingrese el concepto" type="text"></div>
            <div class="col-md-2 5">
                <p>Unidad</p>
                <input class="form-control" placeholder="Ingrese la unidad de medición" type="text"></div>
            <div class="col-md-2 5">
                <p>Cantidad</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2 5">
                <p>Precio ($$ MXN)</p>
                <input class="form-control" placeholder="Ingrese la cantidad necesaria" type="text"></div>
            <div class="col-md-2">
                <br><br><a href="#">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right: 10px;"></span>
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
        </div>
    </div><br>

</div> 

<br><p>
    <button class="btn btn-primary" type="button">Registrar cultivo</button>
</p><br>

@endsection