<?php
	//ApiGenerarGraficas
	
	function graficaTR($t,$id,$n,$f)
	{
		if($t == "Temperatura"){
			$t = 1;}
		else if($t == "Precipitacion"){
			$t = 2;}
		else if($t == "Humedad Relativa"){
			$t = 3;}
		else if($t == "Radiacion"){
			$t = 4;}
		else if($t == "Velocidad del Viento"){
			$t = 5;}
		
		if($n == 1)
		{
			$nom = "_Temp";
		}
		else if($n == 2)
		{
			$nom = "_Pre";
		}
		else if($n == 3)
		{
			$nom = "_Hum";
		}	
		else if($n == 4)
		{
			$nom = "_Rad";
		}
		else if($n == 5)
		{
			$nom = "_Vel";
		}
		else
		{
			$nom = "";
		}
			
		$archivo = file(ruta_completa($id));
		
		if($f == "")
		{
			$f = obtenFecha($archivo);
		}
		
		$scriptJ .= "
		$('#graf".$nom."').highcharts({
				title: {
					text: 'Gráfica de ".leyenda($t).", Fecha: ".$f."'
				},
				subtitle: {
					text: 'Estación: ".nomgraf($id)."'
				},
				chart: {";
		
		if ($t == 2){ $scriptJ .= "type: 'column',"; }
		else { $scriptJ .= "type: 'line',"; }			
		
		$scriptJ .= "
					width:900,
					height: 300
				},
				colors: ['#".colorGrfa($t)."'],
				tooltip: {
					backgroundColor: 'transparent',
					borderColor: 'transparent',
					borderRadius: 0,
					shadow: false,
					style: {
						color: '#000',
						fontSize: '16px',
						padding: '10px'
					},
					valueSuffix: ' ".unidad($t)."'
				},
				 legend: {
					enabled: false
				},
				xAxis: {
					categories: ['00:00','','','','01:00','','','','02:00','','','','03:00','','','','04:00','','','','05:00','','','','06:00','','','','07:00','','','','08:00','','','','09:00','','','','10:00','','','','11:00','','','','12:00','','','','13:00','','','','14:00','','','','15:00','','','','16:00','','','','17:00','','','','18:00','','','','19:00','','','','20:00','','','','21:00','','','','22:00','','','','23:00','','',''],
					labels: {
						rotation: 90				
					},
					lineColor: '#F60',
					tickPosition: 'inside',
					title: {
						text: 'Hora'
					}
				},
				yAxis: {
					lineColor: '#F60',
					lineWidth: 1,
					tickColor: '#060',
					title: {
						text: '".leyenda($t)." (".unidad($t).")'
					}
				},
				plotOptions: {
					line: {
						dataLabels: {
							enabled: false
						},
						enableMouseTracking: true
					}
				},
				series: [{
					name: '".leyenda($t)."',
					data: [".obtenDatos(ruta_completa($id),$t,nomgraf($id),$f)."] 
				}]
		});
		";
		
		echo $scriptJ; 
	}
	
	function leyenda($t)
	{
		if($t == 1)
			$tn = "Temperatura";
		else if($t == 2)
			$tn = "Precipitacion";
		else if($t == 3)
			$tn = "Humedad Relativa";
		else if($t == 4)
			$tn = "Radiacion";
		else if($t == 5)
			$tn = "Velocidad del Viento";
		
		return $tn;
	}
	
	function obtenFecha($archivo)
	{
		$auxFecha = $archivo[count($archivo)-1];
		
		$fecha = explode(" ",$auxFecha);
		
		return $fecha[0];
	}
	
	function nomgraf($id_est){
	switch($id_est){
		case 15922:
			$name="Santo Domingo";break;
		case 15930:
			$name="CBTA Valparaiso";break;
		case 15933:
			$name="Campo Uno";break;
		case 26779:
			$name="El Saladillo";break;
		case 18664:
			$name="El Pardillo3";break;
		case 18670:
			$name="Tierra Blanca";break;
		case 18679:
			$name="La Victoria";break;
		case 18680:
			$name="Agronomia";break;
		case 18682:
			$name="Santa Rita";break;
		case 18777:
			$name="Providencia";break;
		case 18782:
			$name="Emiliano Zapata";break;
		case 18783:
			$name="Chaparrosa";break;
		case 18791:
			$name="El Alpino";break;
		case 18796:
			$name="Col. Hidalgo";break;
		case 18663:
			$name="Loreto";break;
		case 18802:
			$name="Abrego";break;
		case 18806:
			$name="Rancho Grande";break;
		case 18829:
			$name="Col. Progreso";break;
		case 18836:
			$name="Col. Emancipacion";break;
		case 18837:
			$name="Sierra Vieja";break;
		case 18842:
			$name="Villanueva";break;
		case 18851:
			$name="CEZAC";break;
		case 18882:
			$name="Biologia";break;
		case 18879:
			$name="CBTA Tepechitlan";break;
		case 15951:
			$name="Tanque de Hacheros";break;
		case 18849:
			$name="Marianita";break;
		case 15960:
			$name="COBAEZ";break;
		case 18779:
			$name="Agua Nueva";break;
		case 26684:
			$name="Cañitas";break;
		case 26786:
			$name="Col. Glez. Ortega";break;
		case 26772:
			$name="Estancia de Animas";break;
		case 26775:
			$name="Las Arcinas";break;
		case 18786:
			$name="Mesa de Fuentes";break;
		case 26766:
			$name="Mogotes";break;
		case 26767:
			$name="Momax";break;
		case 18798:
			$name="Santa Fe";break;
		case 50060:
			$name="Palmas Altas";break;
		case 86031:
			$name="UPSZ El Remolino";break;	
		}
		
		return $name;
	}

	function colorGrfa($tipo)
	{
		/* Temperatura */
		if($tipo == 1)
		{
			$color = "9D080D";
		}
		/* Precipitacion */
		else if($tipo == 2)
		{
			$color = "008ED6";
		}
		/* Humedad Relativa */
		else if($tipo == 3)
		{
			$color = "008E8E";
		}
		/* Radiacion */
		else if($tipo == 4)
		{
			$color = "F6BD0F";
		}
		else if($tipo == 5)
		{
			$color = "F60";
		}
		
		return $color;
	}
	
	function unidad($t)
	{
		if($t == 1)
			$tn = "°C";
		else if($t == 2)
			$tn = "mm";
		else if($t == 3)
			$tn = "%";
		else if($t == 4)
			$tn = "W/m²";
		else if($t == 5)
			$tn = "Km/hr";
		
		return $tn;
	}
	
	function obtenDatos($nom,$tipo,$estacion,$fecha)
	{
		if($tipo == 1)
		{
			$nombreG = "Temperatura";
			$nombreG2 = "Grados Centigrados";
		}
		else if($tipo == 2)
		{
			$nombreG = "Precipitacion";
			$nombreG2 = "Milimetros";
			
		}
		else if($tipo == 3)
		{
			$nombreG = "Humedad Relativa";
			$nombreG2 = "Porciento";
		}
		else if($tipo == 4)
		{
			$nombreG = "Radiacion";
			$nombreG2 = "W/m al cuadrado";
		}
		else if($tipo == 5)
		{
			$nombreG = "Velocidad del viento";
			$nombreG2 = "Km/hr";
		}	
		
		// abre el archivo
		$archivo = file($nom);
		
		if($fecha == '')
		{
			// fecha a graficar
			$fecha = obtenFecha($archivo); //"04-08-2009";//date("d-m-Y");
		}		
		
		$bandHora = true;
		$bandMFalla = false;
		$contHorasCom = 0;
		
		$contFallas = 0;
		
		$strXML = "";
		
		for($i=1;$i<=count($archivo);$i++)
		{
			if(($archivo[$i] == ''))
			{
				break;
			}
			else
			{	
				$datos = explode(",",$archivo[$i]);				
				$datFecha = explode(" ",$datos[0]);
				$hora = explode (":",$datFecha[1]);
			
				$horaFin = $hora[0].":".$hora[1];
				
				if($fecha == $datFecha[0])
				{
					$contHorasCom++;
					
					if ($datos[$tipo] == "*")
					{
						$cadAvg = avgTem($i,$archivo,$tipo);
						$cadAvgFr = explode(",", $cadAvg);
						
						if(($cadAvgFr[0] == "$"))
						{
							$datoFinal = $cadAvgFr[2];
							
							$firstDat = $cadAvgFr[3] + $cadAvgFr[1];
														
							for($i;$i<=count($archivo);$i++)
							{
								$datos = @explode(",",$archivo[$i]);
								$datFecha = @explode(" ",$datos[0]);
								$hora = @explode (":",$datFecha[1]);
								
								$horaFin = $hora[0].":".$hora[1];
				
								if(	$contFallas < $datoFinal)
								{
									$contHorasCom++;
									$strXML .= "".$firstDat.",";
									$contFallas ++;
									$firstDat = $firstDat + $cadAvgFr[1];
								}
								else
								{
									$contHorasCom--;
									$i--;
									break;
								}
							}
						}
						else
						{
							$strXML .= "".$cadAvg.","; 
						}
					
					}
					else
					{
						$strXML .= "".$datos[$tipo].",";		
					}	
				}
			}			
			
		}
		
		for($i=$contHorasCom;$i<=95;$i++)
		{
			$strXML .= "null,"; 
		}

		$strXML = substr($strXML, 0, -1);
		return $strXML;		
	}
	
	function sumaLluv($archivo)
	{
		$sumLluvia = 0;
		for($i=0;$i<=count($archivo);$i++)
		{
			if((@$archivo[$i] == ''))
			{
				break;
			}
			else
			{
				$datos = @explode(",",$archivo[$i]);
				$datFecha = @explode(" ",$datos[0]);
				
				if($fecha == $datFecha[0])
				{
					$sumLluvia = $sumLluvia + $datos[2];
				}
			}
		}
		
		return $sumLluvia;
	}
	
	function esHora($hora)
	{
		$horaFrag = explode(":", $hora);
		
		if ($horaFrag[1] == "00")
		{
			$horaF = $horaFrag[0].":".$horaFrag[1] ;
		}
		else
		{
			$horaF = "";
		}
		
		return  $horaF;
	}
	
	function avgTem($i,$archivo,$tipo)
	{
		$dato1 = @explode(",", $archivo[$i - 1]);
		$dato2 = @explode(",", $archivo[$i + 1]);
		
		
		if($dato1[$tipo] == "*")
		{
			$bandDat1 = true;
		}
		if($dato2[$tipo] == "*")
		{
			$bandDat2 = true;
		}
		
		if($bandDat1 == true || $bandDat2 == true)
		{
			$contFSeguidas = 0;
			
			for($j=$i;$j<=count($archivo);$j++)
			{
				$dato3 = @explode(",", $archivo[$j]);
				
				if(($dato3[$tipo] == "*"))
				{
					$contFSeguidas++;
				}
				else
					break;
			} 
			
			$datIni = @explode(",", $archivo[$i - 1]);
			$datFin = @explode(",", $archivo[($i + $contFSeguidas)]);
			
			$newAvg = $datFin[$tipo] - $datIni[$tipo];
			
			return "$".",".($newAvg/$contFSeguidas).",".$contFSeguidas.",".$datIni[$tipo];
		}
		else
		{
			$prom = ($dato1[$tipo] + $dato1[$tipo]) / 2; 
			return $prom;
		}
	}
	
	function obtenDiasArchivo($id,$nombre)
	{
		$arch = file(ruta_completa($id));
		unset($arreglo);
		$auxBand = false;
		
		$auxFechaI = explode(" ",$arch[1]);
		$fechaN = $auxFechaI[0];
		$arreglo[] = $fechaN;
		
		for($i=1;$i<=count($arch)-1;$i++)
		{	
			$auxFecha = explode(" ",$arch[$i]);
			
			if(!($auxFecha[0] == $fechaN))
			{
				$fechaN = $auxFecha[0];
				$arreglo[] = $fechaN;
			}		
		}
		
		echo "<p align='center' class='Estilo2'>Gr&aacute;ficas de d&iacute;as pasados:</p><table border=0 cellspacing=0 cellpadding=0 align=center Style='border:1px solid #ffa500'>
  				<tr><td class='Estilo3' border=1 Style='padding:1px 8px 2px 8px; background:#FFF;'><span class='Estilo1'>&nbsp;&nbsp;Día: </span><center>
				<form id='form1' name='form1' method='post' action='grafica.php' target='_blank'><label><select name='fech' id='fech'>";
				
				$contNo = 0;
				
				for($l=count($arreglo);$l>-1;$l--)   
				{   
				   $contNo++;
				   if($arreglo[$l] == obtenFecha($arch))
				   {
				   		break;
				   }
				}
				
				for($i=count($arreglo)-$contNo;$i>-1;$i--)   
				{   
				   echo "<option value='".$arreglo[$i]."'> ".$arreglo[$i]." </option>";
				}
        		
				echo "</select>
        	</label>
	   
	    <input type='submit' name='button' id='button' value='Mostrar Gr&aacute;ficas' />
        <input type='hidden' name='de' value='2' />
		<input type='hidden' name='id' value='".$id."' />
		<input type='hidden' name='est' value='".$nombre."' />
    	</form>";
		
		echo "<center></td>
		  </tr>
		  <tr>
			<td class='Estilo1' border=1 Style='padding:1px 8px 2px 8px; background:#FFF;'>Rango de Fechas que se puede consultar: <spam align='center' class='Estilo5'> ".$arreglo[0]." al ".$arreglo[count($arreglo)-$contNo]."</span>
				</td>
		  </tr>
		</table>";
	}
?>