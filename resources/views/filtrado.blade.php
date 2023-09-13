<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportes</title>


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
                  <li><a href="#">Agrocostos</a></li>
                  <li class="active">Reportes</li>
              </ol>
          </div>

      <div class="container">
        <hr>
        <h3>Reportes</h3>
        <hr class="red">
        

        <div class="row">
          <div class="col-md-6">    
              <p>
                <p><h3>Filtrar por cultivo.</h3></p>
                <div class="btn-group" role="group">
                  <button id="btnFiltroCultivo" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Filtro por cultivo
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCultivo">
                    <li><a href="#">Frijol</a></li>
                    <li><a href="#">Maiz</a></li>
                    <li><a href="#">Chile</a></li>
                    <li><a href="#">Tomate</a></li>
                  </ul>
                </div>
              </p></div> 
          <div class="col-md-6">    
              <p>
                <p><h3>Filtrar por modalidad.</h3></p>
                <div class="btn-group" role="group">
                  <button id="btnFiltroModalidad" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Filtro por modalidad
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroModalidad">
                    <li><a href="#">Riego</a></li>
                    <li><a href="#">Temporal</a></li>
                  </ul>
                </div>
              </p></div>
              <div class="col-md-6">    
                <p>
                  <p><h3>Filtrar por ciclo <br> de cultivo.</h3></p>
                  <div class="btn-group" role="group">
                    <button id="btnFiltroCiclo" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      Filtro por ciclo
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCiclo">
                      <li><a href="#">Primavera-verano</a></li>
                      <li><a href="#">Otoño-invierno</a></li>
                    </ul>
                  </div>
                </p></div>
                <div class="col-md-6">    
                  <p>
                    <p><h3>Filtrar por tipo <br> de cultivo.</h3></p>
                    <div class="btn-group" role="group">
                      <button id="btnFiltroCiclo" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Filtro por tipo
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="btnFiltroCiclo">
                        <li><a href="#">Anual</a></li>
                        <li><a href="#">Perene</a></li>
                      </ul>
                    </div>
                  </p></div>
                  <div class="col-md-6">    
                    <p>
                      <p>
                        <button type="button" class="btn btn-warning" style="font-size: 16px;">Calcular</button></a>
                      </p>
                    </p></div>

        <div class="row">
          <div class="col-md-10 table-responsive" style="margin-bottom:2em;">
            <table class="table table-bordered table-striped">
                      <tr>
                       <th colspan="2" rowspan=2 style="background:#009933; color:#FFF;">Nombre Común</th>
                       <th rowspan="2" style="background:#009933; color:#FFF;">Nombre Científico</th>
                       <th colspan="3" style="background:#009933; color:#FFF;">Potencial</th>
                      <tr>
                        <th style="background:#009933; color:#FFF;">Alto</th>
                        <th style="background:#009933; color:#FFF;">Medio</th>
                        <th style="background:#009933; color:#FFF;">Bajo</th>
                      <tr>
                        <th colspan="6" style="background:#cc6600; color:#FFF;">RIEGO</th>
                      <tr>
                        <td align="center" valign="middle"><a href="./PotAgric/AjoR.pdf"><img border="0" src="images/icopdf.png" /></a></td>
                        <td valign="middle">Ajo</td>
                        <td valign="middle"><i>Allium sativum</i> L.
                        <td valign="middle">351,494</td>
                        <td valign="middle">347,323</td>
                        <td valign="middle">&nbsp;</td>
                      <tr>
                        <td align="center" valign="middle"><a href="./PotAgric/AlmendroR.pdf"><img border="0" src="images/icopdf.png" /></a></td>
                         <td valign="middle">Almendro</td>
                        <td valign="middle"><i>Prunus amygdalus</i> L.</td>
                        <td valign="middle">42,830</td>
                        <td valign="middle">276,337</td>
                        <td valign="middle">&nbsp;</td>
                      <tr>
                        <td align="center" valign="middle"><a href="./PotAgric/AvenaR.pdf"><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Avena
                        <td valign="middle"><i>Avena sativa</i> L.
                        <td valign="middle">243,672
                        <td valign="middle">517,639
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CacahuateR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Cacahuate
                        <td valign="middle">Arachis hypogea L.
                        <td valign="middle">1,544
                        <td valign="middle">7,449
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CebadaR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Cebada
                        <td valign="middle"><i>Hordeum</i> L. <i>vulgare</i>
                        <td valign="middle">272,275
                        <td valign="middle">536,775
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CebollaR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Cebolla
                        <td valign="middle"><i>Allium cepa</i> L.
                        <td valign="middle">351,494
                        <td valign="middle">347,323
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/ChabacanoR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Chabacano
                        <td valign="middle"><i>Prunus armeniaca</i> L.
                        <td valign="middle">5,066
                        <td valign="middle">151,907
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/ChileR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Chile
                        <td valign="middle"><i>Capsicum annum</i> L.
                        <td valign="middle">238,368
                        <td valign="middle">490,756
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CirueloR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Ciruelo
                        <td valign="middle"><i>Prunus salicina Lindl</i>
                        <td valign="middle">24,010
                        <td valign="middle">131,234
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CirueloMexicanoR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Ciruelo mexicano
                        <td valign="middle"><i>Spondias mombin</i> L.
                        <td valign="middle">0
                        <td valign="middle">72,826
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/DuraznoR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Durazno
                        <td valign="middle"><i>Prunus persica</i> (L.) <i>Batsch</i>
                        <td valign="middle">42,830
                        <td valign="middle">276,337
                          <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/FrijolR.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Frijol
                        <td valign="middle"><i>Phaseolus vulgaris</i>
                        <td valign="middle">256,219
                        <td valign="middle">495,391
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/GuayaboR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Guayabo
                        <td valign="middle"><i>Psidium guajaba</i> L.
                        <td valign="middle">15,229
                        <td valign="middle">38,075
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/JitomateR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Jitomate
                        <td valign="middle"><i>Lycopersicum esculentum Mill</i>
                        <td valign="middle">3,121
                        <td valign="middle">609,564
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/MaizR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Ma&iacute;z
                        <td valign="middle"><i>Zea mays</i> L.
                        <td valign="middle">257,261
                        <td valign="middle">498,692
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/ManzanoR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Manzano
                        <td valign="middle"><i>Malus pumila Mill</i>
                        <td valign="middle">401
                        <td valign="middle">82,238
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/NopalTuneroR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Nopal tunero
                        <td valign="middle"><i>Opuntia spp</i>
                        <td valign="middle">31,735
                        <td valign="middle">27,801
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/PapaR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Papa
                        <td valign="middle"><i>Solanum tuberosum</i> L.
                        <td valign="middle">232,029
                        <td valign="middle">423,185
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/PeralR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Peral
                        <td valign="middle"><i>Pyrus communis</i> L.
                        <td valign="middle">49,282
                        <td valign="middle">88,476
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/SorgoR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Sorgo
                        <td valign="middle"><i>Sorghum bicolor</i> (L.) <i>Moench</i>
                        <td valign="middle">233,656
                        <td valign="middle">405,059
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/TrigoR.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Trigo
                        <td valign="middle"><i>Triticum aestivum</i>
                        <td valign="middle">243,672
                        <td valign="middle">517,639
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/VidRI.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Vid Regi&oacute;n I
                        <td valign="middle"><i>Vitis vinifera</i> L.
                        <td valign="middle">34,575
                        <td valign="middle">95,349
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/VidRII.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Vid Regi&oacute;n II
                        <td valign="middle"><i>Vitis vinifera</i> L.
                        <td valign="middle">316,509
                        <td valign="middle">280,639
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/VidRIII.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Vid Regi&oacute;n III
                        <td valign="middle"><i>Vitis vinifera</i> L.
                        <td valign="middle">25,910
                        <td valign="middle">10,011
                        <td valign="middle">&nbsp;
                      <tr>
                        <th colspan=6 style="background:#cc6600; color:#FFF;">TEMPORAL</th>
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/AgaveMezcalT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Agave mezcalero
                        <td valign="middle"><i>Agave salmiana Otto ex Salm-Dick</i>
                        <td valign="middle">418,382
                        <td valign="middle">228,362
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/AgaveTequilaT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Agave tequilero
                        <td valign="middle"><i>Agave tequilana Weber</i>
                        <td valign="middle">39,266
                        <td valign="middle">116,227
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/AvenaT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Avena
                        <td valign="middle"><i>Avena sativa</i> L.
                        <td valign="middle">53,967
                        <td valign="middle">276,632
                        <td valign="middle">565,119
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CacahuateT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Cacahuate
                        <td valign="middle"><i>Arachis hypogea</i> L.
                        <td valign="middle">2,716
                        <td valign="middle">11,358
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/CanolaT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Canola
                        <td valign="middle"><i>Brassica napus</i> L.
                        <td valign="middle">166,653
                        <td valign="middle">674,472
                        <td valign="middle">&nbsp;
                      <tr>
                        <td align="center" valign="middle"><a href=./PotAgric/CebadaT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Cebada
                        <td valign="middle"><i>Hordeum vulgare</i> L.
                        <td valign="middle">53,967
                        <td valign="middle">279,412
                        <td valign="middle">603,842
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/CirueloMexicanoT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Ciruelo mexicano
                        <td valign="middle"><i>Spondias mombin</i> L.
                        <td valign="middle">0
                        <td valign="middle">72,826
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/DuraznoT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Durazno
                        <td valign="middle"><i>Prunus persica</i> (L.) <i>Batsch</i>
                        <td valign="middle">48,936
                        <td valign="middle">43,581
                        <td valign="middle">4,968
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/FrijolT.pdf><img border="0" src="images/icopdf.png" /></a>
                          <td valign="middle">Frijol
                          <td valign="middle"><i>Phaseolus vulgaris</i>
                        <td valign="middle">82,119
                        <td valign="middle">298,542
                        <td valign="middle">580,583
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/GirasolT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Girasol
                        <td valign="middle"><i>Helianthus annus</i>
                        <td valign="middle">86,925
                        <td valign="middle">602,853
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/HabaT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Haba
                        <td valign="middle"><i>Vicia faba</i> L.
                        <td valign="middle">14,280
                        <td valign="middle">61,506
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/MaizT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Ma&iacute;z
                        <td valign="middle"><i>Zea mays</i> L.
                        <td valign="middle">74,601
                        <td valign="middle">298,416
                        <td valign="middle">587,950
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/NopalTuneroT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Nopal tunero
                        <td valign="middle"><i>Opuntia spp</i>
                        <td valign="middle">576,297
                        <td valign="middle">375,252
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/PitayoT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Pitayo
                        <td valign="middle"><i>Stenocereus queretaroensis (Weber) Buxbaum</i>
                        <td valign="middle">40,471
                        <td valign="middle">28,995
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/SorgoT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Sorgo
                        <td valign="middle"><i>Sorghum bicolor</i> (L.) <i>Moench</i>
                        <td valign="middle">3,890
                        <td valign="middle">47,158
                        <td valign="middle">&nbsp;
                      <tr bgcolor="#FFFFFF">
                        <td align="center" valign="middle"><a href=./PotAgric/TrigoT.pdf><img border="0" src="images/icopdf.png" /></a>
                        <td valign="middle">Trigo
                        <td valign="middle"><i>Triticum aestivum</i>
                        <td valign="middle">53,967
                        <td valign="middle">276,632
                        <td valign="middle">565,119
                    </table>
        
          </div>
      </div>


      </div>
      
      
      <div class="collapse navbar-collapse" id="subenlaces">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Enlace</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Desplegable <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Acción</a></li>
              <li><a href="#">Otra acción</a></li>
              <li><a href="#">Algo más aquí</a></li>
              <li class="divider"></li>
              <li><a href="#">Enlace separado</a></li>
            </ul>
          </li>
           <li><a href="#">Enlace</a></li>
        </ul>
      </div>
    </select>
    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>