<?php	
	function estaciones(){ 
		$arreglo = array ('18851'=>'Calera, CEZAC',
			'26684'=>'Ca&ntilde;itas, Ca&ntilde;itas',
			'18786'=>'Enrique Estrada, Mesa de Fuentes',
			'26766'=>'Fracisco Murgu&iacute;a, Mogotes',
			'18802'=>'Fresnillo, &Aacute;brego',
			'18836'=>'Fresnillo, Col. Emancipaci&oacute;n',
			'18664'=>'Fresnillo, El Pardillo 3',
			'18806'=>'Fresnillo, Rancho Grande',
			'18882'=>'Guadalupe, U.A. Biolog&iacute;a',
			'15922'=>'Jalpa, Santo Domingo',
			'50060'=>'Jerez, Palmas Altas',
			'18798'=>'Jerez, Santa Fe',
			'18682'=>'Jerez, Santa Rita',
			'86031'=>'Juchipila, UPSZ El Remolino',
			'18663'=>'Loreto, Loreto',
			'18849'=>'Mazapil, Marianita',
			'15951'=>'Mazapil, Tanque de Hacheros',
			'15933'=>'Miguel Auza, Campo Uno',
			'26767'=>'Momax, Momax',
			'18791'=>'Ojocaliente, El Alpino',
			'26779'=>'P&aacute;nfilo Natera, El Saladillo',
			'18679'=>'Pinos, La Victoria',
			'18829'=>'Rio Grande, Col. Progreso',
			'26786'=>'Sombrerete, Col. Gonzalez Ortega',
			'18796'=>'Sombrerete, Col. Hidalgo',
			'18782'=>'Sombrerete, Emiliano Zapata',
			'18777'=>'Sombrerete, Providencia',
			'18670'=>'Tabasco, Tierra Blanca',
			'18879'=>'Tepechitlan, CBTA Tepechitlan',
			'26775'=>'Trancoso, Las Arcinas',
			'15930'=>'Valparaíso, CBTA Valparaíso',
			'18779'=>'Villa de Cos, Agua Nueva',
			'18783'=>'Villa de Cos, Chaparrosa',
			'15960'=>'Villa de Cos, COBAEZ Villa de Cos',
			'18837'=>'Villa de Cos, Sierra Vieja',
			'26772'=>'Villa Glez. Ortega, Estancia de &Aacute;nimas',
			'18842'=>'Villanueva, Villanueva',
			'18680'=>'Zacatecas, U.A. Agronom&iacute;a'); 
		
		return $arreglo;
	}
	
	function graficasT(){ 
		$arreglo = array ('Monitoreo'=>'Monitoreo',
			'Publicaciones'=>'Publicaciones',
			'Potencial'=>'Potencial',
			'Plaga'=>'Plaga',
			'Riego'=>'Riego'); 
		
		return $arreglo;
	}

	// llena estaciones en el combo de estaciones
	function opciones($arreglo,$id)
	{
		//$op = "";
		
		foreach ($arreglo as $clave => $valor){
			
			if ($clave == $id)
			{
				$op .= "<option value=".$clave." selected>".$valor."</option>";	
			}
			else
			{
				$op .= "<option value=".$clave.">".$valor."</option>";	
			}
		}
		
		return $op;
	}
	
	function dimeFecha($fecha)
	{
		$fechaN = explode("-",$fecha);
		
		return $fechaN[2]." ". mesNom($fechaN[1])." ".$fechaN[0];
		
	}
	
	function mesNom($mes)
	{
		switch($mes){
		case "1":
			$name="Enero";break;
		case "2":
			$name="Febrero";break;
		case "3":
			$name="Marzo";break;
		case "4":
			$name="Abril";break;
		case "5":
			$name="Mayo";break;
		case "6":
			$name="Junio";break;
		case "7":
			$name="Julio";break;
		case "8":
			$name="Agosto";break;
		case "9":
			$name="Septiembre";break;
		case "10":
			$name="Octubre";break;
		case "11":
			$name="Noviembre";break;
		case "12":
			$name="Diciembre";break;
		}
		return $name;
	}
	
	function ruta_completa($id_est)
	{
		$path="/home/repuser/inifap/repNew/";
		$path="$path"."$id_est";
		
		$dir = opendir($path);

		while ($current = readdir($dir)){
			if( $current != "." && $current != "..") 
			{
				$arch_final = $current;
			}
		}
		
		$path="$path"."/"."$arch_final";
		
		return $path;
	}
	
	// Crea el Resumen de Tiempo Real en treal.php
	function tiempo_real($path,$id)
	{	
		$archivo = file($path);
		
		/********Prueba para atrasar estaciones*****/
		$diasR = hastaFecha($id);
		if($diasR > 0)
		{
			//$diasR = ($diasR * 96) + 1;
		}
		else
		{
			$diasR = 1;
		}
		
		$noLin = count($archivo)-$diasR;
		/*******************************************/
		
		$fecha = explode(" ",$archivo[$noLin]);
		$datos2 = explode(",",$fecha[1]);
		
		
		$cadena = '<font class="nombreDatosEstTR2"> Reporte en Tiempo Real<br />'.imprime_fecha($fecha[0]).' a las '.horaSinS($datos2[0]).' hr.</font>
				<div id="osx-modal" width="190" style="margin-top:10px;">
						<a href="#" class="osx" style="text-decoration:none" >
							<table width="189" border="0" align="center" class="classGraf" >
							  <tr>
								<td align="center" valign="middle"><img src="images/grafica.png" width="15" height="15" /></td>
								<td align="center" valign="middle">Gráfica en Tiempo Real</td>
							  </tr>
							</table>
						</a>
				</div>
		
		';
		
		$datos = obtenDatosEstacion($id); 
			
		$estacion = explode(",",$datos[0]);
            
        $cadena .=  '
<table width="760" border="0" class="tablaReprteTiempoReal">
              <tr align="left">
                <td colspan="2" align="left"><font class="nombreEstacionTR">'.$estacion[1].'</font></td>
                <td width="280" colspan="6" rowspan="3" align="right" valign="middle" style="padding: 0.9em 0em;" ><font class="nombreDatosEstTR">Longitud: '.$datos[1].'</font><br /><font class="nombreDatosEstTR">Latitud: '.$datos[2].'</font><br /><font class="nombreDatosEstTR">Altitud: '.$datos[4].' msnm.</font></td>
              </tr>
              <tr align="left">
                <td colspan="2"><font class="nombreMunicipioTR">'.$estacion[0].'</font></td>
                </tr>
              <tr>
                <td ><font class="nombreDatosEstTR" style="font: 16px Arial, Verdana, sans-serif;
color: #36F;">&nbsp;&nbsp;&nbsp;Fecha de Instalación: '.dimeFecha($datos[3]).'</font>
                <br><br></td>
                <td ></td>
                </tr>
              <tr>
                <td colspan="8" align="center" valign="middle">
				
				'.imprime_td_valores_tiempo_real($datos2,$archivo,$fecha[0]).'

				</td>
              </tr>
          </table>
		  ';
		
		return  $cadena;
	}
	
	function imprime_fecha($fecha) 
	{
		$fecha_exploded=explode("-",$fecha);
		$timestamp=mktime(0,0,0,$fecha_exploded[1],$fecha_exploded[0],$fecha_exploded[2]);
		setlocale(LC_TIME,"es_MX.UTF-8");
		$num_dia=$fecha_exploded[0];
		//$num_dia=date("d");
		$nombre_dia=strftime("%A",$timestamp);
		$nombre_mes=strftime("%B",$timestamp);
		
		if (strstr($nombre_dia,"rcoles")) $nombre_dia="mi&eacute;rcoles"; else if (strstr($nombre_dia,"bado")) $nombre_dia="s&aacute;bado";
	   	if (strcmp($fecha,date("d-m-Y"))!=0){return "El pasado <span class=tr_fecha_td_tr>$nombre_dia $num_dia de $nombre_mes del a&ntilde;o ".date("Y")."</span>";}
		
		return "Hoy <span class=tr_fecha_td_tr>$nombre_dia $num_dia de $nombre_mes del a&ntilde;o ".date("Y")."</span>";
	}
	
	function horaSinS($horaS)
	{
		$auxhora = explode(":",$horaS);
		
		$hora = $auxhora[0].":".$auxhora[1];
		
		return $hora;
	}
	
	function posicion_fecha($fecha,$archivo)
	{
		// cuenta sus elementos
		$noLin = count($archivo); 
		
		// recorre el erreglo
		for($i=0; $i <= $noLin; $i++)
		{
			// obtiene la fecha de la linea
			$fech = split(" ",$archivo[$i]);
			
			/* si son iguales la fecha que se busca con en fecha obtenida en 16 caracteres
			   se detiene si no sigue buscando */   
			if(strcmp($fecha,$fech[0]) == 0)
			{
				// obtiene el id, destruye el arreglo y termina el ciclo
				$id = $i;
				
				break 1;
			} 
		}
		
		unset($archivo);
		unset($noLin);
		unset($fecha);
		unset($fech);
		
		return $id;
	}
	
	function posicion_fecha_final($fecha,$archivo)
	{
		// cuenta sus elementos
		$noLin = count($archivo); 
		
		// recorre el erreglo
		for($i=0; $i <= $noLin; $i++)
		{
			// obtiene la fecha de la linea
			$fech = split(" ",$archivo[$i]);
			
			/* si son iguales la fecha que se busca con en fecha obtenida en 16 caracteres
			   se detiene si no sigue buscando */   
			if(strcmp($fecha,$fech[0]) == 0)
			{
				// obtiene el id, destruye el arreglo y termina el ciclo
				$id = $i;
			} 
		}
		
		unset($archivo);
		unset($noLin);
		unset($fecha);
		unset($fech);
		
		return $id;
	}
	
	function imprime_td_valores_tiempo_real($valores,$archivo,$fecha)
	{
		$resumen = array(-1000,"",1000,"",-1000,"",1000,"",-1000,"",0,1000,"",0);
		$sumTemp = 0;
		$contTemp = 0;
		$sumHr = 0;
		$contHr = 0;
		$sumPre = 0;
		$sumHr = 0; 
		$contHr = 0;
		$sumVi = 0; 
		$contVi = 0;
		$sumaDirM = 0;
		
		$i = posicion_fecha($fecha,$archivo);
		
		//$noLin = count($archivo);
		$noLin = posicion_fecha_final($fecha,$archivo);
			
		for($i;$i<$noLin;$i++)
		{
			$datos = explode(",",$archivo[$i]);
			$hora = explode(" ",$datos[0]);
			
			/* Calculos de Temperatura */
			if($resumen[0]<=$datos[1] && $datos[1]!='*'){$resumen[0]=$datos[1];$resumen[1]=$hora[1];}
			if($resumen[2]>=$datos[1] && $datos[1]!='*'){$resumen[2]=$datos[1];$resumen[3]=$hora[1];}
			if($datos[1]!='*'){$sumTemp+=$datos[1]; $contTemp++;}
			
			/* Calculos Humedad Relativa */
			if($resumen[4]<=$datos[3] && $datos[3]!='*'){$resumen[4]=$datos[3];$resumen[5]=$hora[1];}
			if($resumen[6]>=$datos[3] && $datos[3]!='*'){$resumen[6]=$datos[3];$resumen[7]=$hora[1];}
			if($datos[3]!='*'){$sumHr+=$datos[3]; $contHr++;}
			
			/* Presipitacion */
			if($datos[2]!='*'){$sumPre+=$datos[2];}
			
			/* Radiacion */
			if($datos[4]!='*'){$sumRad+=$datos[4];}
			
			/* Calculos Viento */
			if($resumen[8]<=$datos[5] && $datos[5]!='*'){$resumen[8]=$datos[5];$resumen[9]=$hora[1];$resumen[10]=$datos[6];}
			if($resumen[11]>=$datos[5] && $datos[5]!='*'){$resumen[11]=$datos[5];$resumen[12]=$hora[1];$resumen[13]=$datos[6];}
			if($datos[5]!='*'){$sumVi+=$datos[5]; $sumaDirM+=$datos[6]; $contVi++;}
		}
		
		$reporte = '
		<table width="661" align=center cellpadding=0 cellspacing=0 class="tablaDatosTR">
  <tr>
<td colspan=2  Style="border-top:1px solid #c6d6f2;"><font class="titulosS" align="left" valign="top"><br>Temperatura</font><td colspan=2 Style="border-top:1px solid #c6d6f2;" align="left" valign="bottom"><br>Resumen registrado:<td rowspan=2 width=21 style="border-left:1px solid #c6d6f2;  border-top:1px solid #c6d6f2;"><br><td colspan=2  Style="border-top:1px solid #c6d6f2;"><font class="titulosS" align="left" valign="top"><br>Humedad relativa</font><td colspan=2 Style="border-top:1px solid #c6d6f2;" align="left" valign="bottom"><br>Resumen registrado:
<tr>
  <th width=63 align="center" valign="middle" Style="padding-top:3px;"><img src="images/temp.png" width="41" height="46">
	<td width="79" ><font class="valoresS"> '.$valores[1].'&nbsp;&deg;C </font>
	<td width="42" Style="padding-right:5">Max<br>Min<br>Med
	<td width="143" Style="padding-right:10">'.$resumen[0].'&deg;C a las '.horaSinS($resumen[1]).' hr<br>'.$resumen[2].'&deg;C a las '.horaSinS($resumen[3]).' hr<br>'.number_format($sumTemp/$contTemp,1).'&deg;C
	<th width=50 align="center" valign="middle" Style="padding-top:3px;"><img src="images/humedad.png" width="35" height="35">
	<td width="87" ><font class="valoresS">&nbsp;'.$valores[3].'&nbsp;%</font>
	<td width="43" Style="padding-right:10">Max<br>Min<br>Med
	<td width="131" Style="padding-right:10">'.$resumen[4].'% a las '.horaSinS($resumen[5]).' hr<br>'.$resumen[6].'% a las '.horaSinS($resumen[7]).' hr<br>'.number_format($sumHr/$contHr,1).'%
<tr valign=top><td colspan=2  Style="border-top:1px solid #c6d6f2;"><font class="titulosS"><br>Precipitaci&oacute;n</font><td colspan=2 Style="border-top:1px solid #c6d6f2;" align="left" valign="bottom"><br>Resumen registrado:<td rowspan=2 style="border-left:1px solid #c6d6f2; border-top:1px solid #c6d6f2;"><br><td colspan=2  Style="border-top:1px solid #c6d6f2;"><font class="titulosS"><br>Radiaci&oacute;n</font><td colspan=2 Style="border-top:1px solid #c6d6f2;" align="left" valign="bottom"><br>Resumen registrado:
<tr>
  <th align="center" valign="middle"><img src="images/lluvia.png" width="54" height="41">
	<td  height=50><font class="valoresS">'.$valores[2].' mm</font>
	<td colspan=2>Total&nbsp;acumulada<br>&nbsp;&nbsp;&nbsp;'.number_format($sumPre,1).'&nbsp;mm
	<th align="center" valign="middle"><img src="images/sol.png" width="42" height="42">
	<td ><font class="valoresS">'.$valores[4].'&nbsp;W/m&#178;</font>
	<td colspan=2>Total&nbsp;registrada<br>&nbsp;&nbsp;&nbsp;'.number_format($sumRad,0).'&nbsp;W/m&#178;
  <tr valign=top><td colspan=4  Style="border-top:1px solid #c6d6f2;"><font class="titulosS"><br>Velocidad y direcci&oacute;n del viento<font class="titulosS"><td colspan=5 Style="border-top:1px solid #c6d6f2;" align="left" valign="bottom"><br>Resumen registrado:
<tr>
  <th align="center" valign="middle" Style="padding-top:3px;"><img src="images/viento.png" width="48">
<td ><font class="valoresS">'.$valores[5].'&nbsp;Km/hr</font>';

		if ($valores[5] > 0)
		{
			$reporte .=  "<td colspan=2><span Style=\"color:#000000\">proveniente del </span><span class=tr_valor>".dir_viento($valores[6])."</span>";
		}
		else
		{ 
			$reporte .=  "<td><br><td><br>";
		}
		
		$reporte .= "<td colspan=5>Max&nbsp;".number_format($resumen[8], 0)." Km/hr proveniente del ".dir_viento($resumen[10])." a las ".horaSinS($resumen[9])." hr<br>Min&nbsp;".number_format($resumen[11], 0)." Km/hr"; 
	
		if ($resumen[11] >=1) 
			$reporte .= " proveniente del ".dir_viento($resumen[13]);
			
		$reporte .= " a las ".horaSinS($resumen[12])." hr";
			
		$medViento = $sumVi/$contVi;			
		$reporte .= "<br>Med&nbsp;".number_format($medViento,1)." Km/hr";
		
		if (1 < $medViento)
			$reporte .= " proveniente del ".dir_viento($sumaDirM/$contVi);
			
		return $reporte."</td></tr></table>";
	}
	
	function dir_viento($v)
	{
		if ($v >=348.76) return "Norte";
		elseif ($v >=326.26) return "NNO";
		elseif ($v >=303.76) return "NO";
		elseif ($v >=281.26) return "ONO";
		elseif ($v >=258.76) return "Oeste";
		elseif ($v >=236.26) return "OSO";
		elseif ($v >=213.76) return "SO";
		elseif ($v >=191.26) return "SSO";
		elseif ($v >=168.76) return "Sur";
		elseif ($v >=146.26) return "SSE";
		elseif ($v >=123.76) return "SE";
		elseif ($v >=101.26) return  "ESE";
		elseif ($v >=78.76) return  "Este";
		elseif ($v >=56.26) return "ENE";
		elseif ($v >=33.76) return "NE";
		elseif ($v >=11.26) return "NNE";
		elseif ($v >=0) return "Norte";
	}
	
	function formularioRep($tipo,$id,$mes,$ano,$opcion,$me)
	{
		$formulario = '<table border="0" style="background:#FFF; border: #F90 solid 1px; margin-top: 5px; margin-left: 5px; margin-right: 5px; padding: 0.5em 0em;">
          <tr>
          	<td width="100"  align="center" valign="middle">&nbsp;<img src="images/templatemo_list.png" width="15" height="10" />&nbsp;Reporte de: </td>	
			  	<td width="190" align="left" valign="middle">
					<select name="id" >'.
						opciones(estaciones(),$id)
					.'</select>
				</td>';
		
		if($me == '')
		{
			if($tipo == 3)
			{
				$formulario .= '		
					<td width="100" align="left" valign="middle">
						<select name="opcion" size="1" id="opcion">'.
						opciones(tipoConsulta(),$opcion)    
						.'</select>
					</td>';
			}
		}
		
		if($tipo == 1 || $tipo == 3)
		{
						
			$formulario .= '		
				<td width="80" align="left" valign="middle">
                	<select name="mes" size="1" id="mes">'.
                    opciones(meses(),$mes)    
           	  		.'</select>
          		</td>
				<td width="50" align="left" valign="middle">
  					<select name="ano" size="1" id="ano">'.
                    opciones(anos(),$ano)    
           	  		.'</select>
				 </td>';
          
		}
		else if($tipo == 2 || $tipo == 3)
		{
			$formulario .= '<td width="50" align="left" valign="middle">
  					<select name="ano" size="1" id="ano">'.
                    opciones(anos(),$ano)    
           	  		.'</select>
				 </td>';
		}
		
		$formulario .= '  
          <td width="125" align="center" valign="middle">
		  	<input type="submit" class="botonRep" value="Mostrar Reporte" />';
			
			if($me <> '')
			{
				$formulario .= '<input type="hidden" name="opcion" id="opcion" value="'.$opcion.'" />
				<input type="hidden" name="m" id="m" value="'.$me.'" />';
			}
					
		  $formulario .= ' </td>
          </tr>
        </table>';
		
		return $formulario; 	
	}
	
	function meses(){ 
		$arreglo = array (
			"01"=>Enero,
            "02"=>Febrero,
            "03"=>Marzo,
            "04"=>Abril,
            "05"=>Mayo,
            "06"=>Junio,
            "07"=>Julio,
            "08"=>Agosto,
            "09"=>Septiembre,
            "10"=>Octubre,
            "11"=>Noviembre,
            "12"=>Diciembre
		); 
		
		return $arreglo;
	}
	
	function tipoConsulta(){ 
		$arreglo = array (
			"hf"=>"Horas frio",
            "ucc"=>"Unidades calor del cultivo",
            "ucp"=>"Unidades calor de plaga"
		); 
		
		return $arreglo;
	}
	
	function anos()
	{
		$anio = date(Y);
		
		$arreglo = array(
			$anio => $anio,
			$anio-1 => $anio-1
		);
		
		return $arreglo;	
	}
	
	function base_reporte($id,$tipo,$mes,$ano)
	{
		$datos = obtenDatosEstacion($id); 
			
		$estacion = explode(",",$datos[0]);
		
		$cadena = '
		<table width="760" border="0" class="tablaReprteTiempoReal2">
              <tr align="left">
                <td colspan="4" align="left"><font class="nombreEstacionTR">'.$estacion[1].'</font></td>
                <td width="280" colspan="6" rowspan="3" align="right" valign="top" style="padding: 0.9em 0em;" ><font class="nombreDatosEstTR">Fecha de Instalación: '.dimeFecha($datos[3]).'</font>
                <br /><font class="nombreDatosEstTR">Longitud: '.$datos[1].'</font><br /><font class="nombreDatosEstTR">Latitud: '.$datos[2].'</font><br /><font class="nombreDatosEstTR">Altitud: '.$datos[4].' msnm</font></td>
              </tr>
              <tr align="left">
                <td colspan="4"><font class="nombreMunicipioTR">'.$estacion[0].'</font></td>
                </tr>
              <tr>
                <td width="126">&nbsp;</td>
                <td width="118">&nbsp;</td>
                <td width="88">&nbsp;</td>
                <td width="126">&nbsp;</td>
                </tr>
              <tr>
                <td colspan="10" align="center" valign="middle">';
				
				if($tipo == "bc")
				{
					$cadena .= mensual($id,$mes,$ano);
				}
				else if($tipo == "hf")
				{
					$cadena .= horasFrio($id,$mes,$ano);
				}
				else if($tipo == "ucc")
				{
					$cadena .= unidadesCalor($id,$mes,$ano);
				}
				else if($tipo == "ucp")
				{
					$cadena .= unidadesCalorP($id,$mes,$ano);
				}
				else if($tipo == "ri")
				{
					$cadena .= riegoRep($id,$mes,$ano);
				}
				
				$cadena .= '</td>
              </tr>
          </table>';
		  
		  return $cadena;
	}
	
	function mensual($id,$mes,$ano)
	{
		$mensual = '
		<font class="nombreDatosEstTR2">Reporte hist&oacute;rico del mes de '.mesNom($mes).' del a&ntilde;o '.$ano.'</font>
		<table width="760" border="0" align="center" class="tablaReprteTiempoReal2">
<tr>
			<td rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF">Fecha</td>
			<td colspan=3 rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF">Temperatura (&deg;C)</td>
			<td rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF">Precipitaci&oacute;n (mm)</td>
			<td colspan=3 rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF">Humedad relativa (%)</td>
			<td rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF">Radiaci&oacute;n (W/m<sup>2</sup>)</td>
			<td colspan=3 align="center" valign="middle" bgcolor="#EAF4FF">Viento (Km/hr)</td>
            <td rowspan="2" align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Evapotranspiración <br />(mm)</td>
  </tr>
          <tr>
          	<td colspan=2 align="center" valign="middle" bgcolor="#EAF4FF">Velocidad</td>
            <td align="center" valign="middle" bgcolor="#EAF4FF">Direcci&oacute;n</td>
           </tr>
			<tr>
				<td align="center" valign="middle" bgcolor="#EAF4FF">(Día-Mes-A&ntilde;o)</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Max</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Min</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Med</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Acumulada</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Max</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Min</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Med</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Total</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Max</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Med</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF">Proveniente</td>
                <td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Acumulada</td> 
              </tr>';
			
			$mensual .= imprime_td_basico("bc",$id,$mes,$ano);

		return $mensual."</table>
		<div Style='font-weight:bolder;text-align:center;color:#000080;background:#D1EAFC;'>Si usted requiere datos anteriores a los que se pueden consultar en este sistema,<br>&nbsp;&nbsp;&nbsp;favor de solicitarlos al siguiente correo electr&oacute;nico: medina.guillermo@inifap.gob.mx&nbsp;&nbsp;&nbsp;</div>		
		";
	}
	
	
	function imprime_td_basico($opcion,$id_est,$mes,$ano)
	{
		$resumenA=resumenbd($id_est,$mes,$ano);
		$mensuales=mensualesbd($opcion,$id_est,$mes,$ano);
		
		if ($mensuales > 0){
			foreach($mensuales as $clave => $valor){
				$arr=array_values($valor);
				
				$resumen .= "<tr><td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".arreglaFecha($arr[0]);
				
				if ($arr[1]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[1],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[2]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[2],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[3]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[3],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[4]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[4],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[5]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".$arr[5].""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[6]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".$arr[6].""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[7]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[7],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[8]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[8],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[9]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[9],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[10]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[10],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[11]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".$arr[11].""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[12]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[12],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				
				$resumen .= "</tr>";
			}
		
		$resumen .= "<tr bgcolor=#f0f8ff><td align=center>Resumen";
			
		$arr = $resumenA;
			
		$resumen .= "<th>".@number_format($arr[0],1)."<th>".@number_format($arr[1],1)."<th>".@number_format($arr[2],1)."<th>".@number_format($arr[3],1)."<th>".@number_format($arr[4],0)."<th>".@number_format($arr[5],0)."<th>".@number_format($arr[6],0)."<th>".@number_format($arr[7],0)."<th>".@number_format($arr[8],1)."<th>".@number_format($arr[9],1)."<th>&nbsp;<th>".@number_format($arr[10],1)."</tr>";
		
		} else {
			$resumen .= "<tr><td colspan=12 height=30></td>";
		}
		
		return $resumen;		
	}
	
	function horasFrio($id,$mes,$ano)
	{
		$mensual = '
		<font class="nombreDatosEstTR2">Reporte histórico de frío de '.mesNom($mes).' del a&ntilde;o '.$ano.'</font>
		<table width="760" border="0" align="center" class="tablaReprteTiempoReal2">
			 <tr>
				<td rowspan="2" align="center" valign="middle" bgcolor="#EAF4FF">Fecha<br>(Dia-Mes-A&ntilde;o)</td>
				<td rowspan="2" align="center" valign="middle" bgcolor="#EAF4FF" >Temperatura<br>M&iacute;nima</td>
				<td colspan="2" align="center" valign="middle" bgcolor="#EAF4FF" >Horas Fr&iacute;o</td>
				<td rowspan="2" align="center" valign="middle" bgcolor="#EAF4FF" >Unidades Frio<br>Richardson</td>
				<td rowspan="2" align="center" valign="middle" bgcolor="#EAF4FF" >Horas Helada</td>
			  </tr>
			  <tr>
				<td align="center" valign="middle" bgcolor="#EAF4FF" >< 7.2 °C</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" >0 - 7.2 °C</td>
			  </tr>
		';
			
		$mensuales=mensualesbd("hf",$id,$mes,$ano);
		
		if ($mensuales > 0){
			foreach($mensuales as $clave => $valor){
				$arr=array_values($valor);
					
				$resumen .= "<tr><td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".arreglaFecha($arr[0]);
				
				if ($arr[1]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[1],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[2]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[2],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[3]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[3],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[4]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[4],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[5]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[5],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				
				$resumen .= "</tr>";
			}
		} else {
			echo "<tr><td colspan=9 height=30></td>";
		}
		
		$dirGarf = archivo_grafica($id,"HorasFrio",$ano,"hf_");
			
		return $mensual.$resumen."</table>
		<div Style='font-weight:bolder;text-align:center;color:#000080;background:#D1EAFC;'>Si usted requiere datos anteriores a los que se pueden consultar en este sistema,<br>&nbsp;&nbsp;&nbsp;favor de solicitarlos al siguiente correo electr&oacute;nico: medina.guillermo@inifap.gob.mx&nbsp;&nbsp;&nbsp;</div><br>	
		<a href='".$dirGarf."'><img class='grafTend' width='700px' height='400px' src='".$dirGarf."'></a><br>&nbsp;";
	}
	
	function unidadesCalor($id,$mes,$ano)
	{
		$mensual = '
		<font class="nombreDatosEstTR2">Reporte histórico de Unidades Calor para Cultivo de '.mesNom($mes).' del a&ntilde;o '.$ano.'</font>
		<table width="760" border="0" align="center" class="tablaReprteTiempoReal2">
			<tr >
				<td rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF" Style="color:#333333;border-bottom:1px dashed #e6e6fa;">Fecha<br>(Dia-Mes-A&ntilde;o)</td>
				<td colspan=3 align="center" valign="middle" bgcolor="#EAF4FF" >Unidades calor para cultivos de clima</td>
			</tr>
			<tr class=tr_titulos>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Templado<br>(Umbrales 5&nbsp;,&nbsp;25)</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Subtropical<br>(Umbrales 10&nbsp;,&nbsp;30)</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Tropical<br>(Umbrales 15&nbsp;,&nbsp;35)</td>
			</tr>
		';
			
		$mensuales=mensualesbd("ucc",$id,$mes,$ano);
		
		if ($mensuales > 0){
			foreach($mensuales as $clave => $valor){
				$arr=array_values($valor);
					
				$resumen .= "<tr><td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".arreglaFecha($arr[0]);
				
				if ($arr[1]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[1],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[2]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[2],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[3]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[3],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				
				$resumen .= "</tr>";
			}
		} else {
			echo "<tr><td colspan=9 height=30></td>";
		}
			
		return $mensual.$resumen."</table>
		<div Style='font-weight:bolder;text-align:center;color:#000080;background:#D1EAFC;'>Si usted requiere datos anteriores a los que se pueden consultar en este sistema,<br>&nbsp;&nbsp;&nbsp;favor de solicitarlos al siguiente correo electr&oacute;nico: medina.guillermo@inifap.gob.mx&nbsp;&nbsp;&nbsp;</div>";
	}
	
	function unidadesCalorP($id,$mes,$ano)
	{
		$mensual = '
		<font class="nombreDatosEstTR2">Reporte histórico de Unidades Calor Plaga de '.mesNom($mes).' del a&ntilde;o '.$ano.'</font>
		<table width="760" border="0" align="center" class="tablaReprteTiempoReal2">
			<tr>
				<td rowspan=2 align="center" valign="middle" bgcolor="#EAF4FF" Style="padding-left:3px;padding-right:3px;">Fecha<br>(Dia-Mes-A&ntilde;o)</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Gusano<br>elotero</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Picudo<br>del chile</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Palomilla<br>de la papa</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Barrenador<br>del durazno</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Palomilla<br>de la manzana</td>
			</tr>
			<tr>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Heliothis Zea</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Anthonomus eugenii</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Ptorimoea operculella</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Anarsia lineatella</td>
				<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Cydia pomonella</td>
			 </tr>
		';
			
		$mensuales=mensualesbd("ucp",$id,$mes,$ano);
		
		if ($mensuales > 0){
			foreach($mensuales as $clave => $valor){
				$arr=array_values($valor);
					
				$resumen .= "<tr><td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".arreglaFecha($arr[0]);
				
				if ($arr[1]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[1],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[2]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[2],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[3]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[3],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[4]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[4],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				if ($arr[5]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[5],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
				
				$resumen .= "</tr>";
			}
		} else {
			echo "<tr><td colspan=9 height=30></td>";
		}
			
		$dirGarf = archivo_grafica($id,"Calor",$ano,"uc_");
		
		if($dirGarf == "")
		{
			return $mensual.$resumen."</table>";
		}
		else
		{
			return $mensual.$resumen."</table>
			<div Style='font-weight:bolder;text-align:center;color:#000080;background:#D1EAFC;'>Si usted requiere datos anteriores a los que se pueden consultar en este sistema,<br>&nbsp;&nbsp;&nbsp;favor de solicitarlos al siguiente correo electr&oacute;nico: medina.guillermo@inifap.gob.mx&nbsp;&nbsp;&nbsp;</div><br>	
			<a href='".$dirGarf."'><img class='grafTend' width='700px' height='400px' src='".$dirGarf."'></a><br>&nbsp;";
		}
	}
	
	
	function mensualesbd($opcion, $id_est, $mes, $ano){
		switch ($opcion){
			case bc:
				$q="SELECT fecha,tmax,tmin,tmed,pt,hrmax,hrmin,hrmed,radiacion,velmax,velmed,dirviento,eto from t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
				break;
	
			case hf:
				$q="SELECT fecha,tmin,horasf,horasf2,uf,horash FROM t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' ORDER BY fecha ";
				break;
	
			case ucc:
				$q="SELECT fecha,horasc525,horasc1030,horasc1535 FROM t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
				break;
	
			case ucp:
				$q="SELECT fecha,bug_maiz,bug_chile,bug_papa,bug_durazno,bug_manzana FROM t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
				break;
		}
		
		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$c = pg_connect ("dbname=$db user=$user")){ die("Error en la conexion");}
		$result = pg_query($c, $q);
		pg_close($c);
		if($result == NULL)return NULL;
		if(pg_num_rows($result)<1){return -1;}
		return pg_fetch_all($result);
	}
	
	function resumenbd($id_est,$mes,$ano){
		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$c = pg_connect ("dbname=$db user=$user")){
			die("Error en la conexion");
		}
		$q="SELECT max(tmax) as tmax,min(tmin) as tmin,avg(tmed) as tmed,sum(pt),max(hrmax) as hrmax, min(hrmin) as hrmin, avg(hrmed) as hrmed, sum(radiacion) as rad, max(velmax) as velmax, avg(velmed) as velmed, sum(eto) as eto from t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%'";
		$result = pg_query($c, $q);
		pg_close($c);
		if (!$result) return	NULL;
		 return pg_fetch_array($result);
	}
	
	function archivo_grafica($id_est,$tipo,$ano_tendencias,$id_graf)
	{
		$name=name_est_graf($id_est);
		
		$path="".$tipo."/".$tipo."_".$ano_tendencias."/".$id_graf.$name."_".$ano_tendencias."_archivos/";
		
						
		if(is_dir($path) == FALSE)
		{
			$path = "";
			$path="".$tipo."/".$tipo."_".$ano_tendencias."/".$id_graf.$name."_".($ano_tendencias-1)."_archivos/";
		}
			
		$dir = opendir($path);

		while ($current = readdir($dir)){
			if( $current != "." && $current != "..") 
			{				
				if (strstr($current,".gif") || strstr($current,".png")) 
				{
					$grafica=$path.$current;
				}
			}
		}
		
		return $grafica;
	}
	
	function name_est_graf($id_est){
		switch($id_est){
			case 15922:
				$name="santodomingo";break;
			case 15930:
				$name="cbtavalparaiso";break;
			case 15933:
				$name="campouno";break;
			case 26779:
				$name="elsaladillo";break;
			case 18664:
				$name="elpardillo3";break;
			case 18670:
				$name="tierrablanca";break;
			case 18679:
				$name="lavictoria";break;
			case 18680:
				$name="escagronomia";break;
			case 18682:
				$name="santarita";break;
			case 18777:
				$name="providencia";break;
			case 18782:
				$name="emilianozapata";break;
			case 18783:
				$name="chaparrosa";break;
			case 18791:
				$name="elgranchaparral";break;
			case 18796:
				$name="colhidalgo";break;
			case 18663:
				$name="loreto";break;
			case 18802:
				$name="abrego";break;
			case 18806:
				$name="ranchogrande";break;
			case 18829:
				$name="colprogreso";break;
			case 18836:
				$name="colemancipacion";break;
			case 18837:
				$name="sierravieja";break;
			case 18842:
				$name="villanueva";break;
			case 18851:
				$name="cezac";break;
			case 18882:
				$name="zacgpe";break;
			case 18879:
				$name="cbtatepechitlan";break;
			case 15951:
				$name="tanquedehacheros";break;
			case 18849:
				$name="marianita";break;
			case 15960:
				$name="cobaez";break;
			case 18779:
				$name="aguanueva";break;
			case 26684:
				$name="canitas";break;
			case 26786:
				$name="colglezortega";break;
			case 26772:
				$name="estanciadeanimas";break;
			case 26775:
				$name="lasarcinas";break;
			case 18786:
				$name="mesadefuentes";break;
			case 26766:
				$name="mogotes";break;
			case 26767:
				$name="momax";break;
			case 86031:
				$name="upszelremolino";break;
			case 50060:
				$name="palmasaltas";break;
			case 18798:
				$name="santafe";break;
			default:
				$name=-1;
		}
		return $name;
	}

	function riegoRep($id,$mes,$ano)
	{
			$mensual = '
			<font class="nombreDatosEstTR2">Reporte histórico de evapotranspiración del mes '.mesNom($mes).' del a&ntilde;o '.$ano.'</font>
			<table width="760" border="0" align="center" class="tablaReprteTiempoReal2">
				<tr>
					<td align="center" valign="middle" bgcolor="#EAF4FF" Style="padding-left:3px;padding-right:3px;">Fecha<br>(Dia-Mes-A&ntilde;o)</td>
					<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Precipitaci&oacute;n<br>(mm)</td>
					<td align="center" valign="middle" bgcolor="#EAF4FF" class=line_vert>Evapotranspiraci&oacute;n<br>(mm)</td>
				 </tr>';
				
			$mensuales=mensualesdb_riego("",$id,$mes,$ano);
			
			if ($mensuales > 0){
				foreach($mensuales as $clave => $valor){
					$arr=array_values($valor);
						
					$resumen .= "<tr><td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".$arr[0];
				
					if ($arr[1]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[1],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
					if ($arr[2]!=NULL) $resumen .= "<td align='center' valign='middle' Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\">".@number_format($arr[2],1).""; else $resumen .= "<td Style=\"color:#333333;border-bottom:1px dashed #e6e6fa;\"><br>";
					
					$resumen .= "</tr>";
				}
			} else {
				$resumen .= "<tr><td colspan=9 height=30></td>";
			}
			
			$resumen .= "<tr bgcolor=#f0f8ff><td align=center>Resumen";
						
					$arr = resumendb_riego("",$id,$mes,$ano);
						
					$resumen .= "<th>".@number_format($arr[0],1)."<th>".@number_format($arr[1],1)."</tr>";	
				
			return $mensual.$resumen."</table>
			<div Style='font-weight:bolder;text-align:center;color:#000080;background:#D1EAFC;'>Si usted requiere datos anteriores a los que se pueden consultar en este sistema,<br>&nbsp;&nbsp;&nbsp;favor de solicitarlos al siguiente correo electr&oacute;nico: medina.guillermo@inifap.gob.mx&nbsp;&nbsp;&nbsp;</div>";
	}

	function mensualesdb_riego($opcion, $id_est, $mes, $ano)
	{
		$q="SELECT fecha,pt,eto from t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$c = pg_connect ("dbname=$db user=$user")){ die("Error en la conexion");}
		$result = pg_query($c, $q);
		pg_close($c);
		if($result == NULL)return NULL;
		if(pg_num_rows($result)<1){return -1;}
		return pg_fetch_all($result);
	}

	function resumendb_riego($opcion,$id_est,$mes,$ano)
	{
		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$c = pg_connect ("dbname=$db user=$user")){
			die("Error en la conexion");
		}
		$q="SELECT sum(pt) as precipitacion ,sum(eto) as evapotranspiracion from t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%'";
		$result = pg_query($c, $q);
		pg_close($c);
		if (!$result) return	NULL;
		return pg_fetch_array($result);
	}

	function disponibilidad($opcion, $id_est, $mes, $ano){
		switch ($opcion){
			case bc:
				$q="SELECT fecha,tmax,tmin,tmed,pt,hrmax,hrmin,hrmed,radiacion,velmax,velmed,dirviento,eto from t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
				break;
	
			case hf:
				$q="SELECT fecha,tmin,horasf,horasf2,uf,horash FROM t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' ORDER BY fecha ";
				break;
	
			case ucc:
				$q="SELECT fecha,horasc525,horasc1030,horasc1535 FROM t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
				break;
	
			case ucp:
				$q="SELECT fecha,bug_maiz,bug_chile,bug_papa,bug_durazno,bug_manzana FROM t_reportes where id_est=$id_est and fecha::text like '$ano-$mes-%' order by fecha";
				break;
		}

		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$c = pg_connect ("dbname=$db user=$user")){ die("Error en la conexion");}
		$result = pg_query($c, $q);
		pg_close($c);
		
		return pg_num_rows($result);
	}
	
	function unCero($num)
	{
		if($num <= 9)
		{
			$num = "0".$num;
		}
		
		return $num;
	}
	
	function dir_viento2($v)
	{
		if ($v >=348.76) return "1";
		elseif ($v >=326.26) return "2";
		elseif ($v >=303.76) return "3";
		elseif ($v >=281.26) return "4";
		elseif ($v >=258.76) return "5";
		elseif ($v >=236.26) return "6";
		elseif ($v >=213.76) return "7";
		elseif ($v >=191.26) return "8";
		elseif ($v >=168.76) return "9";
		elseif ($v >=146.26) return "10";
		elseif ($v >=123.76) return "11";
		elseif ($v >=101.26) return  "12";
		elseif ($v >=78.76) return  "13";
		elseif ($v >=56.26) return "14";
		elseif ($v >=33.76) return "15";
		elseif ($v >=11.26) return "16";
		elseif ($v >=0) return "1";
	}
	
	function arreglaFecha($fecha)
	{
		$auxFecha = explode("-", $fecha);
		
		return $auxFecha[2]."-".$auxFecha[1]."-".$auxFecha[0];
	}
	
	function hastaFecha($id)
	{
		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$link = pg_connect ("dbname=$db user=$user")){ die("Error en la conexion");}
		
		$q="SELECT da from t_estaciones where id_est=".$id.";";
		
		$result = pg_fetch_row(pg_query($link, $q));
		
		return $result[0];
	}
?>