@extends("layouts.appGOB")

@section("title", "Calculadora")

@section("content")
    <br>
    <br>
    <br>
<div class="container">
        <div class="row">
        <div class="col-md-9">
            <h4>Calculadora Agrocostos</h4>
            <hr class="red">
            <h5>Seleccione las características del cultivo</h5><br> 
        </div>
        </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <p>Cultivo</p>
                <div class="btn-group" role="group">
                    <button id="btnFiltroCultivo" type="button" class="btn btn-default dropdown-toggle btn-md" data-toggle="dropdown" aria-expanded="false">
                        -Cultivo a seleccionar-
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCultivo">
                        <li><a href="#">Frijol</a></li>
                        <li><a href="#">Maiz</a></li>
                        <li><a href="#">Chile</a></li>
                        <li><a href="#">Tomate</a></li>
                    </ul>
                </div>
        </div>
    <div class="col-md-4">
        <p> Ciclo de cultivo</p>
            <div class="btn-group" role="group">
                    <button id="btnFiltroCultivo" type="button" class="btn btn-default dropdown-toggle btn-md" data-toggle="dropdown" aria-expanded="false">
                        -Elija el ciclo-
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCultivo">
                        <li><a href="#">P-V</a></li>
                        <li><a href="#">O-I</a></li>
                    </ul>
            </div>
    </div> 
            <div class="col-md-4">
                <p>No. de hectareas</p>
                <input class="form-control" placeholder="Ingrese las hectareas a calcular" type="text">
            </div>
    </div><br>
    <div class="row">
        <div class="col-md-4">
            <p>Modalidad</p>
                <div class="btn-group" role="group">
                    <button id="btnFiltroCultivo" type="button" class="btn btn-default dropdown-toggle btn-md" data-toggle="dropdown" aria-expanded="false">
                        -Seleccione la modalidad-
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCultivo">
                        <li><a href="#">Riego</a></li>
                        <li><a href="#">temporal</a></li>
                    </ul>
                </div>
        </div>
            <div class="col-md-4">
                <p>Precio por tonelada $ (MXN)</p>
                <input class="form-control" placeholder="Ingrese el precio de cada tonelada" type="text">
            </div>
    </div><br>
    <div class="row">
        <div class="col-md-8">
            <p>Si desea proyectar los costos a futuro, seleccione un año</p>
                <div class="btn-group" role="group">
                    <button id="btnFiltroCultivo" type="button" class="btn btn-default dropdown-toggle btn-md" data-toggle="dropdown" aria-expanded="false">
                        -Seleccione el año-
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCultivo">
                        <li><a href="#">2024</a></li>
                        <li><a href="#">2025</a></li>
                        <li><a href="#">2026</a></li>
                    </ul>
                </div>
        </div>
            <div class="col-md-4">
                <br>
                <button type="button" class="btn btn-primary">Calcular</button>
            </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h3>Resultado</h3>
        <h5>información del cultvo</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Nombre</td>
                    <td>Tipo de cultivo</td>
                    <td>Modalidad</td>
                    <td>Ciclo de cultivo</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>$</td>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Preparación del terreno</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Subsuelo</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Barbacha</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Rastra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Otro</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Siembra</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Semilla</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Siembra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Fertilización</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Fertilizante</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Mano de obra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Combate de maleza</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Mano de obra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Control de plagas</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Mano de obra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div> 

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Control de enfermedades</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Mano de obra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div> 

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Cosecha</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Costales</td>
                    <td>Pieza</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Mano de obra</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Tractorista</td>
                    <td>Pieza</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Trilla</td>
                    <td>Pieza</td>
                    <td>-</td>
                    <td>$</td>
                </tr>  
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Flete para siembra</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Flete para siembra</td>
                    <td>Pieza</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Flete para cosecha</td>
                    <td>Jornal</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Flete para consumir insumos</td>
                    <td>Pieza</td>
                    <td>-</td>
                    <td>$</td>
                </tr> 
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Renta de la tierra</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>Renta de la tierra</td>
                    <td>Servicio</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div> 

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Costos adicionales</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Unidad</td>
                    <td>Cantidad</td>
                    <td>Costo unitario</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>$</td>
                </tr>
                <tr>
                    <th colspan="3">Subtotal</th>
                    <th>$</th>
                </tr>    
        </table> 
    </div>
    </div>
</div> 

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5>Costos adicionales</h5>
        <table class="table table-bordered">
                <tr>
                    <td>Concepto</td>
                    <td>Precio</td>
                </tr>
                <tr>
                    <td>Costo total</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Rendimiento</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td>$</td>
                </tr>
                <tr>
                    <td>Ingreso bruto</td>
                    <td>$</td>
                </tr>   
                <tr>
                    <td>Ingreso neto</td>
                    <td>$</td>
                </tr>   
                <tr>
                    <td>Relación costo-beneficio</td>
                    <td>$</td>
                </tr>   
        </table> 
    </div>
    </div>
</div> 

<div class="container">
    <h4>Semáforo de rentabilidad</h4>
    <p>aqui va el semaforo</p>
    <div class="row">
    <div class="col-md-8">
        <h5>El cultivo es rentable para el ciclo seleccionado</h5><br> 
    </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary">Descargar reporte</button>
    </div>
</div>


@endsection