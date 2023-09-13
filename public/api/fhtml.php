<?php
function cabeceraHtml()
{
	$cabeceraHTML = '
	<!-- Datos -->
	<meta name="author" content="Inifap Zacatecas - ISC. José Israel Casas Flores (casas.israel@inifap.gob.mx)" />
	<meta name="description" content="En la página del Campo Experimental Zacatecas del INIFAP, podrá encontrar los datos de clima de las estaciones de monitoreo climático del estado de Zacatecas, además de aplicaciones para la toma de decisiones con estos datos; Publicaciones técnicas y científicas, además de otros servicios de interés.">
	<meta name="keywords" content="Agroclimatico, Clima, Zacatecas, Inifap" />
	<meta name="robots" content="follow,index,archive,noodp"/>
	<!-- ***** -->
    
	<link rel="shortcut icon" href="http://www.zacatecas.inifap.gob.mx/favicon.ico" type="image/x-icon">
	<link rel="icon" href="http://www.zacatecas.inifap.gob.mx/favicon.ico" type="image/x-icon">
	';
	
	echo $cabeceraHTML;
}

function cabeceraHtmlMo()
{
	$cabeceraHTML = '
	<!-- Datos -->
	<meta name="author" content="Inifap Zacatecas - ISC. José Israel Casas Flores (casas.israel@inifap.gob.mx)" />
	<meta name="description" content="En la página del Campo Experimental Zacatecas del INIFAP, podrá encontrar los datos de clima de las estaciones de monitoreo climático del estado de Zacatecas, además de aplicaciones para la toma de decisiones con estos datos; Publicaciones técnicas y científicas, además de otros servicios de interés.">
	<meta name="keywords" content="Agroclimatico, Clima, Zacatecas, Inifap" />
	<meta name="robots" content="follow,index,archive,noodp"/>
	<!-- ***** -->
    
   	<link rel="shortcut icon" href="http://www.zacatecas.inifap.gob.mx/favicon.ico" type="image/x-icon">
	<link rel="icon" href="http://www.zacatecas.inifap.gob.mx/favicon.ico" type="image/x-icon">
	';
	
	echo $cabeceraHTML;
}

function menus($tMenu,$id)
{
	/*Potencial*/
	if($tMenu == 1)
	{
		$menu = '
		<div class="menu">
        <table border="0">
            <tr>
                <td width="21" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
                <td width="65" align="center" valign="middle"><a class="titulos" href="index.php">Inicio</a></td>
                <td width="150" align="center" valign="middle"><a class="titulos" href="potagricola.php">Potencial Agrícola</a></td>
                <td width="150" align="center" valign="middle"><a class="titulos" href="potforrajero.php">Potencial Forrajero</a></td>
            </tr>
            </table>
        </div>
		';
	}
	/*Publicaciones*/
	if($tMenu == 2)
	{
		$menu = '
		<div class="menu">
			<table width="464" border="0">
			  <tr>
				<td width="6" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
				<td width="53" align="center" valign="middle"><a class="titulos" href="index.php">Inicio</a></td>
				<td width="184" align="center" valign="middle"><a class="titulos" href="publicacionest.php">Publicaciones Técnicas</a></td>
				<td width="203" align="center" valign="middle"><a class="titulos" href="publicacionesc.php">Publicaciones Científicas</a></td>
			  </tr>
			</table>
        </div>
		';
	}
	if($tMenu == 3)
	{
		$menu = '
		<div class="menu">
        <table width="475" border="0">
          <tr>
            <td width="25" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
            <td width="104" align="center" valign="middle"><a class="titulos" href="estaciones.php">Monitoreo</a></td>
            <td width="179" align="left" valign="middle"><a class="titulos" href="mlluvia.php">Mapas de precipitación</a></td>
            <td width="149" align="left" valign="middle"><a class="titulos" href="mfrio.php">Mapas de horas frío</a></td>
          </tr>
        </table>
        </div>
		';
	}
	if($tMenu == 4)
	{
		$menu = '
		<div class="menu">
        <table width="580" border="0">
          <tr>
            <td width="23" align="center" valign="middle"><img src="../images/icon_home.png" width="20" height="20" /></td>
            <td width="51" align="center" valign="middle"><a class="titulos" href="../index.php">Inicio</a></td>
			<td width="105" align="center" valign="middle"><a class="titulos" href="../estaciones.php">Monitoreo</a></td>
            <td width="190" align="center" valign="middle"><a class="titulos" href="../plaga/index.php">Alerta Fitosanitaria</a></td>
            <td width="210" align="center" valign="middle"><a class="titulos" href="../riego/index.php">Calendarización del Riego</a></td>
          </tr>
        </table>
        </div>
		';
	}
	if($tMenu == 5)
	{
		$menu = '
		<div class="menu">
        <table width="580" border="0">
          <tr>
            <td width="30" align="center" valign="middle"><img src="../../images/icon_home.png" width="20" height="20" /></td>
            <td width="55" align="center" valign="middle"><a class="titulos" href="../../index.php">Inicio</a></td>
			<td width="100" align="center" valign="middle"><a class="titulos" href="../../estaciones.php">Monitoreo</a></td>
            <td width="70" align="center" valign="middle"><a class="titulos" href="../../aplicaciones.php?id='.$id.'">Cerrar</a></td>
            <td align="center" valign="middle"></td>
          </tr>
        </table>
        </div>
		';
	}
	if($tMenu == 6)
	{
		$menu = '
		<div class="menu">
        <table width="580" border="0">
          <tr>
            <td width="30" align="center" valign="middle"><img src="../images/icon_home.png" width="20" height="20" /></td>
            <td width="55" align="center" valign="middle"><a class="titulos" href="../index.php">Inicio</a></td>
			<td width="100" align="center" valign="middle"><a class="titulos" href="../estaciones.php">Monitoreo</a></td>
            <td width="70" align="center" valign="middle"><a class="titulos" href="../aplicaciones.php?id='.$id.'">Cerrar</a></td>
            <td align="center" valign="middle"></td>
          </tr>
        </table>
        </div>
		';
	}
	if($tMenu == 7)
	{
		$menu = '
		<div class="menu">
        <table width="800" border="0">
          <tr>
            <td width="25" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
			<td width="55" align="center" valign="middle"><a class="titulos" href="index.php" >&nbsp;Inicio</a></td>
            <td width="100" align="center" valign="middle"><a class="titulos" href="estaciones.php">Monitoreo</a></td>
			<td width="120" align="left" valign="middle"><a class="titulos" href="mlluvia.php?id='.$id.'&m=7">Mapas de Lluvia</a></td>
            <td width="120" align="left" valign="middle"><a class="titulos" href="tendencias.php?id='.$id.'&m=7">Graficas de Lluvia</a></td>
            <td width="70" align="center" valign="middle"><a class="titulos" href="../aplicaciones.php?id='.$id.'">Cerrar</a></td>
			<td align="center" valign="middle"></td>
          </tr>
        </table>
        </div>
		';
	}
	
	if($tMenu == 8)
	{
		$menu = '
		<div class="menu">
        <table width="800" border="0">
          <tr>
            <td width="25" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
			<td width="55" align="center" valign="middle"><a class="titulos" href="index.php" >&nbsp;Inicio</a></td>
            <td width="80" align="center" valign="middle"><a class="titulos" href="estaciones.php">Monitoreo</a></td>
			<td width="100" align="center" valign="middle"><a class="titulos" href="indice.php?id='.$id.'&m=8">Horas Frio</a></td>
            <td width="120" align="center" valign="middle"><a class="titulos" href="mfrio.php?id='.$id.'&m=8">Mapas Horas Frio</a></td>
            <td width="80" align="center" valign="middle"><a class="titulos" href="../aplicaciones.php?id='.$id.'">Cerrar</a></td>
			<td align="center" valign="middle"></td>
          </tr>
        </table>
        </div>
		';
	}
	if($tMenu == 9)
	{
		$menu = '
		<div class="menu">
         <table width="950" border="0">
          <tr>
            <td width="25" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
			<td width="55" align="center" valign="middle"><a class="titulos" href="index.php" >&nbsp;Inicio</a></td>
            <td width="65" align="center" valign="middle"><a class="titulos" href="estaciones.php">Monitoreo</a></td>
			<td width="190" align="center" valign="middle"><a class="titulos" href="indice.php?id='.$id.'&opcion=ucc&m=9";">Unidades Calor del Cultivo</a></td>
            <td width="180" align="center" valign="middle"><a class="titulos" href="indice.php?id='.$id.'&opcion=ucp&m=9">Unidades Calor Plaga</a></td>
            <td width="180" align="center" valign="middle"><a class="titulos" href="tendencias.php?id='.$id.'&m=9" >Graficas de Temperatura</a></td>
			<td width="180" align="center" valign="middle"><a class="titulos" href="mcalor.php?id='.$id.'&m=9" >Mapas Unidades Calor</a></td>
			<td width="75" align="center" valign="middle"><a class="titulos" href="../aplicaciones.php?id='.$id.'">Cerrar</a></td>
			<td align="center" valign="middle"></td>
          </tr>
        </table>
        </div>
		';
	}
	
	echo $menu;
}

function banner_inferior()
{
	echo '
		<table align="center" border="0" style="padding: 1.5em 0em;">
			  <tr>
				<td width="230" height="41" align="center" valign="middle" style="background:url(images/templatemo_footer_header.png) no-repeat"><font class="titBanner">INIFAP</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(images/templatemo_footer_header.png) no-repeat"><font class="titBanner">INIFAP Zacatecas</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(images/templatemo_footer_header.png) no-repeat"><font class="titBanner">Intranet</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(images/templatemo_footer_header.png) no-repeat"><font class="titBanner">Contacto</font></td>
			  </tr>
			  <tr>
				<td width="230" valign="top" align="left" style="color:#FFF;">Institución de excelencia científica y tecnológica por su capacidad de respuesta a las demandas de conocimiento y tecnológia en beneficio del sector forestal, agrícola y pecuario .
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
				Genera, valida y apoya la transferencia de tecnologías acorde a las necesidades de productores agropecuarios y forestales del Estado contribuyendo a mejorar sus condiciones de vida y a conservar los recursos naturales.
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
			<ul class="tmo_footer_list">
								<li><a href="http://www.inifap.gob.mx/">INIFAP México</a></li>
								<li><a href="https://mail.inifap.gob.mx/owa">Correo Oficial</a></li>
								<li><a href="http://sigi.inifap.gob.mx/">SIGI</a></li>
								<li><a href="http://uno.inifap.gob.mx/">UNO</a></li>		
					  </ul>
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
      Tel: 01 800 088 22 22<br />
      Extensiones:<br />
      <strong>Teléfono de Atención: 82337<br />
      Recepción Zacatecas: 82328</strong>
      <br />
      Correo electrónico: inifap.zacatecas@inifap.gob.mx
    </td>
			  </tr>
			</table>
		';
	}
	
	function banner_inferior2()
{
	echo '
		<table align="center" border="0" style="padding: 1.5em 0em;">
			  <tr>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">INIFAP</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">INIFAP Zacatecas</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">Intranet</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">Contacto</font></td>
			  </tr>
			  <tr>
				<td width="230" valign="top" align="left" style="color:#FFF;">Institución de excelencia científica y tecnológica por su capacidad de respuesta a las demandas de conocimiento y tecnológia en beneficio del sector forestal, agrícola y pecuario .
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
				Genera, valida y apoya la transferencia de tecnologías acorde a las necesidades de productores agropecuarios y forestales del Estado contribuyendo a mejorar sus condiciones de vida y a conservar los recursos naturales.
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
			<ul class="tmo_footer_list">
								<li><a href="http://www.inifap.gob.mx/">INIFAP México</a></li>
								<li><a href="https://mail.inifap.gob.mx/owa">Correo Oficial</a></li>
								<li><a href="http://sinaso.inifap.gob.mx/">SINASO</a></li>
								<li><a href="http://uno.inifap.gob.mx/">UNO</a></li>		
					  </ul>
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
      Tel: 01 800 088 22 22<br />
      Extensiones:<br />
      <strong>Teléfono de Atención: 82337<br />
      Recepción Zacatecas: 82328</strong>
      <br />
      Correo electrónico: inifap.zacatecas@inifap.gob.mx
    </td>
			  </tr>
			</table>
		';
	}
	function banner_inferior3()
{
	echo '
		<table align="center" border="0" style="padding: 1.5em 0em;">
			  <tr>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">INIFAP</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">INIFAP Zacatecas</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">Intranet</font></td>
				<td width="230" height="41" align="center" valign="middle" style="background:url(../../images/templatemo_footer_header.png) no-repeat"><font class="titBanner">Contacto</font></td>
			  </tr>
			  <tr>
				<td width="230" valign="top" align="left" style="color:#FFF;">Institución de excelencia científica y tecnológica por su capacidad de respuesta a las demandas de conocimiento y tecnológia en beneficio del sector forestal, agrícola y pecuario .
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
				Genera, valida y apoya la transferencia de tecnologías acorde a las necesidades de productores agropecuarios y forestales del Estado contribuyendo a mejorar sus condiciones de vida y a conservar los recursos naturales.
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
			<ul class="tmo_footer_list">
								<li><a href="http://www.inifap.gob.mx/">INIFAP México</a></li>
								<li><a href="https://mail.inifap.gob.mx/owa">Correo Oficial</a></li>
								<li><a href="http://sinaso.inifap.gob.mx/">SINASO</a></li>
								<li><a href="http://uno.inifap.gob.mx/">UNO</a></li>		
					  </ul>
				</td>
				<td width="230" valign="top" align="left" style="color:#FFF;">
      Tel: 01 800 088 22 22<br />
      Extensiones:<br />
      <strong>Teléfono de Atención: 82337<br />
      Recepción Zacatecas: 82328</strong>
      <br />
      Correo electrónico: inifap.zacatecas@inifap.gob.mx
    </td>
			  </tr>
			</table>
		';
	}
	
function menuEstaciones2($id)
{
	echo '
	<div class="menu">
	<table width="850" border="0">
         <tr>
           <td width="25" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
           <td width="55" align="center" valign="middle"><a class="titulos" href="index.php" >&nbsp;Inicio</a></td>
           <td width="70" align="center" valign="middle"><a class="titulos" href="estaciones.php">&nbsp;Estaciones</a></td>
           <td width="115" align="center" valign="middle"><a class="titulos" href="treal.php?id='.$id.'">&nbsp;Tiempo Real</a></td>
	       <td width="75" align="center" valign="middle"><a class="titulos" href="historico.php?id='.$id.'">&nbsp;Histórico</a></td>
           <td width="85" align="center" valign="middle"><a class="titulos" href="tendencias.php?id='.$id.'">&nbsp;Tendencias</a></td>
           <td width="55" align="center" valign="middle"><a class="titulos" href="indice.php?id='.$id.'">&nbsp;Indice</a></td>
           <td width="62" align="center" valign="middle"><a class="titulos" href="mlluvia.php">&nbsp;Mapas</a></td>
           <td width="80" align="center" valign="middle"><a class="titulos" href="boletines.php">&nbsp;Boletines</a></td>
           <td width="83" align="center" valign="middle"><a class="titulos" href="pronostico.php">&nbsp;Pronóstico</a></td>
           <td class="resaltadoM" width="99" align="center" valign="middle"><a class="titulos" id="sel">&nbsp;Aplicaciones</a>
			   <div id="element" class="tooltipMsgM" align="left">
				  <img src="images/templatemo_list.png"  />&nbsp;&nbsp;<a class="titulos2" href="plaga/index.php" target="_top">Alerta Fitosanitaria</a><br />
				  <hr> 
				  <img src="images/templatemo_list.png"  />&nbsp;&nbsp;<a class="titulos2" href="riego/index.php" target="_top">Calendarización del Riego</a><br />
			   </div>		   
		   </td>
         </tr>
    </table>
</div>';
}

function menuEstaciones($id)
{
	echo '
	<div class="menu">
	<table width="850" border="0">
         <tr>
           <td width="25" align="center" valign="middle"><img src="images/icon_home.png" width="20" height="20" /></td>
           <td width="95" align="center" valign="middle"><a class="titulos" href="index.php" >&nbsp;Inicio</a></td>
           <td width="121" align="center" valign="middle"><a class="titulos" href="estaciones.php">&nbsp;Estaciones</a></td>
           <td width="125" align="center" valign="middle"><a class="titulos" href="treal.php?id='.$id.'">&nbsp;Tiempo Real</a></td>
	       <td width="121" align="center" valign="middle"><a class="titulos" href="historico.php?id='.$id.'">&nbsp;Histórico</a></td>
           <td width="121" align="center" valign="middle"><a class="titulos" href="aplicaciones.php?id='.$id.'">&nbsp;Aplicaciones</a></td>
           <td width="121" align="center" valign="middle"><a class="titulos" href="boletines.php?id='.$id.'">&nbsp;Boletines</a></td>
           <td width="121" align="center" valign="middle"><a class="titulos" href="pronostico.php?id='.$id.'">&nbsp;Pronóstico</a></td>
         </tr>
    </table>
</div>';
}
?>