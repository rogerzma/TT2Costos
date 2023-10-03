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
            <h5>Seleccione las características del cultivo</h5><br> 
            
        </div>
        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('welcome') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('MapaPotencial') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Mapa de potencial agrícola</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('filtrado') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Reportes</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('login') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Modo administrador</a>
            </div>
        </div>
        
        
        </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p>Cultivo</p>
                    <select class="form-control">
                        <option>Frijol</option>
                        <option>Maiz</option>
                        <option>Chile</option>
                        <option>Tomate</option>
                      </select>
        </div>
    <div class="col-md-3">
        <p> Ciclo de cultivo</p>
                <select class="form-control">
                    <option>P-V</option>
                    <option>O-I</option>
                  </select>
    </div> 
            <div class="col-md-3">
                <p>No. de hectareas</p>
                <input class="form-control" placeholder="Ingrese las hectareas a calcular" type="text">
            </div>
    </div><br>
    <div class="row">
        <div class="col-md-3">
            <p>Modalidad</p>
                <select class="form-control">
                    <option>Riego</option>
                    <option>Temporal</option>
                  </select>
        </div>
            <div class="col-md-3">
                <p>Precio por tonelada $ (MXN)</p>
                <input class="form-control" placeholder="Ingrese el precio de cada tonelada" type="text">
            </div>
    </div><br>
    <div class="row">
        <div class="col-md-5">
            <p>Si desea proyectar los costos a futuro, seleccione un año</p>
                <select class="form-control" placeholder="Seleccione el año">
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                  </select>
        </div>
            <div class="col-md-4">
                <br>
                <button type="button" class="btn btn-primary">Calcular</button>
            </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalServ">Descargar reporte</button>
    </div>
</div>

<div class="modal fade" id="modalServ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Descargar reporte</h4>
        </div>
        <div class="modal-body">
                  <h4>Seleccione el formato deseado</h4>
                    <select class="form-control">
                        <option>PDF</option>
                        <option>Word</option>
                        <option>Excel</option>
                      </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Descargar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


@endsection