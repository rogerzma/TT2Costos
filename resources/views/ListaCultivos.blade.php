<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de cultivos</title>


    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->

  </head>
  <body>

    <!-- Contenido -->
    <main class="page">

      <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
                 <span class="sr-only">Interruptor de Navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"></a>
              </div>
              <div class="collapse navbar-collapse" id="subenlaces">
                <ul class="nav navbar-nav navbar-right">
            <li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/articulos">Blog</a></li>
            <li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/multimedia">Multimedia</a></li>
            <li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/prensa">
                  Prensa            </a>
              </li>
              <li class="landing-btn">
                      <a href="https://www.gob.mx/inifap/archivo/agenda">
                    Agenda            </a>
                </li>
            <li class="landing-btn">
                    <a href="https://www.gob.mx/inifap/archivo/acciones_y_programas">
                  Acciones y programas            </a>
              </li>
            <li class="landing-btn">
                    <a href="https://www.gob.mx/inifap/archivo/documentos">
                  Documentos            </a>
              </li>
              <li class="landing-btn">
                      <a href="https://vun.inifap.gob.mx/portalweb/_Transparencia">
                    Transparencia            </a>
                </li>
            <li class="landing-btn">
                    <a href="https://www.gob.mx/agricultura/es/#344">
                  Contacto            </a>
              </li>
              </ul>
            </div>
            </div>
          </nav>

          <div class="container">
            <ol class="breadcrumb top-buffer">
                <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
                <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
                <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
                <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
                <li class="active">Reportes</li>
            </ol>
        </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Lista de cultivos</h3>
            <hr class="red">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">    
                <p>Aquí se muestran los cultivos registrados para las diferentes operaciones del sistema.</p>
                </div> 
          
        <div class="row">
          <div class="col-sm-9 table-responsive" style="margin-bottom:2em;">
            <table class="table table-bordered table-striped">
                      <tr>
                       <th colspan="1" style="background:#009933; color:#FFF;">Nombre </th>
                       <th colspan="1" style="background:#009933; color:#FFF;">Tipo de cultivo</th>
                       <th colspan="1" style="background:#009933; color:#FFF;">Modalidad</th>
                       <th colspan="1" style="background:#009933; color:#FFF;">Opciones</th>
                      <tr>
                        <td valign="middle">Frijol</td>
                        <td valign="middle">Anual</td>
                        <td valign="middle">Riego</td>
                        <td valign="middle">
                            <a href="ActualizaCultivo" style="color:#001c99;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <a href="#" style="color:#ff0000;">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                      <tr>
                        <td valign="middle">Chile</td>
                        <td valign="middle">Anual</td>
                        <td valign="middle">Temporal</td>
                        <td valign="middle"> 
                            <a href="ActualizaCultivo" style="color:#00
                            0000001c99;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#modalServ" style="color:#ff0000;">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>
                            </a>
                      <tr>00
                        <td valign="middle">Maiz</td>
                        <td valign="middle">Anual</td>
                        <td valign="middle">Temporal</td>
                        <td valign="middle"> 
                            <a href="ActualizaCultivo" style="color:#001c99;">
                                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <a href="#" style="color:#ff0000;">
                                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                      <tr>
                        <td valign="middle">Fresa</td>
                        <td valign="middle">Perenne</td>
                        <td valign="middle">Riego</td>
                        <td valign="middle"> 
                            <a href="ActualizaCultivo" style="color:#001c99;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <a href="#" style="color:#ff0000;">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                
                    </table>
                    <div class="row">
                        <div class="col-md-6">    
                            <p>
                              <p>
                                <button type="button" class="btn btn-primary" style="font-size: 16px;">Nuevo cultivo</button></a>
                              </p>
                              
                            </p></div> 
                    </div>
          </div>

          <div class="modal fade" id="modalServ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Información</h4>
                </div>
                <div class="modal-body">
                       <h4>Servicios</h4>
                          <h5>
                          <img src="/images/templatemo_list.png" style="margin-right:10px;">Laboratorio de Suelos<br>
                          <img src="/images/templatemo_list.png" style="margin-right:10px;">Laboratorio de Entomología<br>
                          <img src="/images/templatemo_list.png" style="margin-right:10px;">Laboratorio de Fitopatología<br>
                          <img src="/images/templatemo_list.png" style="margin-right:10px;">Laboratorio de Biología Molecular<br>
                          <img src="/images/templatemo_list.png" style="margin-right:10px;">Laboratorio de Sistemas de Información Geográfica<br>
                          </h5>
                          <div>Más información, Campo Experimental Zacatecas <br>
                          <strong>55-38-71-87-00</strong>&nbsp;&nbsp;Ext: <strong>82328, 82337 </strong> <a href="mailto:inifap.zacatecas@inifap.gob.mx; arechiga.delia@inifap.gob.mx">Enviar Correo</a>.</div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
      </div>


      </div>

   </div>
      
    </select>
    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>