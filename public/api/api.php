<?php
	
	function conectar()
	{
		$user="www-data";
		$host="localhost";
		$db="paginaweb";
		if (!$link = pg_connect ("dbname=$db user=$user")){ die("Error en la conexion");}
		
		return $link;
	} //func. Conectarse
	
	function conectar2()
	{
		$user="www-data";
		$host="localhost";
		$db="dbreportes";
		if (!$link = pg_connect ("dbname=$db user=$user")){ die("Error en la conexion");}
		
		return $link;
	} 
	
	// obtiene las publicaciones a mostrar
	function obtenPublicaciones($tipoP)
	{
		$link = conectar();
		$cadena = "";
		
		if($tipoP == 1)
		{
			$query = "select * from pub_tecnicas where muestra = '1' order by id DESC";
		}
		else
		{
			$query = "select * from pub_cientificas where muestra = '1' order by id DESC";
		}
		
		// genera la consulta
		$resPub = pg_query($link,$query);
		
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			
			if($tipoP == 1)
			{
				$cadena .= '<center><img border="0" src="publicaciones/'.$arrayDatosPub['imagen'].'" width="77" height="107" /></center>';
			}
			
			$cadena .= '<li onmouseover="MM_showHideLayers(';
			$cadena .= "'portadaTec','','show')";
			$cadena .= '" onmouseout="MM_showHideLayers(';
			$cadena .= "'portadaTec','','hide')"; 
			$cadena .= '" >';
			
		
			if($arrayDatosPub['mensaje'] <> '')
			{
				$cadena .= '<a class="ligas" href="javascript:void(0);" onclick="alert(';
				$cadena .= "'".$arrayDatosPub['mensaje']."'";
				$cadena .= ')">'.$arrayDatosPub['publicacion'].'</a></li><br>';		
			}
			else
			{
				$cadena .= '<a href="modulo/mostrarPub.php?id='.$arrayDatosPub[0].'&t='.$tipoP.'" target="_new" >'.$arrayDatosPub['publicacion'].'</a></li><br>';
			}
		}
		
		//echo "->".$cadena;
		
		return $cadena;
	}
	
	// obtiene publicacion y suma uno
	function obtenPublicacionesTodas($tipoP,$a)
	{
		$link = conectar();
		$cadena = "";
		$cadenaF = "";
		
		if($tipoP == 1)
		{
			$query = "select * from pub_tecnicas where ano = '".$a."' order by ano, id DESC ";
		}
		else
		{
			$query = "select * from pub_cientificas where ano = '".$a."' order by ano, id ASC";
		}
		
		// genera la consulta
		$resPub = pg_query($link,$query);
		
		$cont = 0;
		
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			
			if($arrayDatosPub['5'] == '' && $arrayDatosPub['6'] <> '')
			{
				$cadena .= '<td align="center" style="width:20%;"><img border="0" src="publicaciones/'.$arrayDatosPub['imagen'].'" width="118" height="160" /></td><td align="left">'.$arrayDatosPub['publicacion'].'<br><a href="javascript:void(0);" onclick="MM_popupMsg(';
				$cadena .= "'".$arrayDatosPub['6']."'";
				$cadena .=')';
				$cadena .='"><img border="0" src="images/icopdf.png" /></a>';
				$cadena .= '</td>';
			}
			else if($arrayDatosPub['5'] <> '' && $arrayDatosPub['6'] <> '')
			{
				$cadena .= '<td align="center" style="width:20%;"><img border="0" src="publicaciones/'.$arrayDatosPub['imagen'].'" width="118" height="160" /></td><td align="left">'.$arrayDatosPub['publicacion'].'<br><a href="javascript:void(0);" onclick="MM_popupMsg(';
				$cadena .= "'".$arrayDatosPub['6']."'";
				$cadena .=');MM_openBrWindow(';			
				$cadena .= "'modulo/mostrarPub.php?id=".$arrayDatosPub['0']."&t=".$tipoP."','','toolbar=yes,location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes')";
				$cadena .='"><img border="0" src="images/icopdf.png" /></a>';
				$cadena .= '</td>';
			}
			else if($arrayDatosPub['5'] <> '' && $arrayDatosPub['6'] == '')
			{
				$cadena .= '<td align="center" style="width:20%;"><img border="0" src="publicaciones/'.$arrayDatosPub['imagen'].'" width="118" height="160" /></td><td align="left">'.$arrayDatosPub['publicacion'].'<br><a href="modulo/mostrarPub.php?id='.$arrayDatosPub['0'].'&t='.$tipoP.'" target="_new" ><img border="0" src="images/icopdf.png" /></a>';
				$cadena .= '</td>';
			}
		
			$cont = $cont + 1 ;
			
			if($cont == 2)
			{
				$cadenaF .= "<tr>".$cadena."</tr>";
				$cadena = "";
				$cont = 0;
			}
			
		}
		
		if($cont == 1)
		{
			$cadenaF .= '<tr>'.$cadena.'<td>&nbsp;</td><td>&nbsp;</td></tr>';
		}
		
		//echo "->".$cadena;
		
		
		$publicaciones = '<table class="table table-striped">
            </tr>'.$cadenaF.' </table>';
		
		
		return $publicaciones;
	}
	
	function nombreyPdfPub($id,$tipoP)
	{
		$link = conectar();
		
		if($tipoP == 1)
		{
			$query = "select publicacion, liga from pub_tecnicas where id = ".$id."";
		}
		else
		{
			$query = "select publicacion, liga, mensaje from pub_cientificas where id = ".$id."";
		}
		
		// genera la consulta
		$resPub = pg_query($link,$query);
		
		return  pg_fetch_array($resPub);
	}
	
	
	function sumapublicacion($id,$tipoP)
	{
		$link = conectar();
		
		if($tipoP == 1)
		{
			$query = "select cuenta from pub_tecnicas where id = ".$id."";
		}
		else
		{
			$query = "select cuenta from pub_cientificas where id = ".$id."";
		}
		
		$resPub = pg_query($link,$query);
		
		$arrayDatosPub = pg_fetch_array($resPub);
		
		if($tipoP == 1)
		{
			$query = "UPDATE pub_tecnicas SET cuenta=".($arrayDatosPub['cuenta'] + 1)." WHERE id = ".$id."";
		}
		else
		{
			$query = "UPDATE pub_cientificas SET cuenta=".($arrayDatosPub['cuenta'] + 1)." WHERE id = ".$id."";
		}
		
		$resPub = pg_query($link,$query);
		
	}
	
	function publicacionesCientificas($ano)
	{
		$link = conectar();
		
		$query = "select * from pub_cientificas where ano = '".$ano."' order by id DESC";
		
		$resPub = pg_query($link,$query);
		
		$cadena .= '<table class="table table-striped">';
		
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			
			$cadena .= '<tr>';
			
			if($arrayDatosPub['2'] == '')
			{
				$cadena .= '<td align="left" valign="middle">'.$arrayDatosPub['publicacion'].'';
				
				if($arrayDatosPub['7'] <> '')
				{
					$cadena .= "<br><font style='color:#36F; font-style:italic'>".$arrayDatosPub['7']."</font>"; 
				}
				
				$cadena .= '</td><td align="center" valign="middle"><ahref="javascript:void(0);" onclick="alert(';
				$cadena .= "'".$arrayDatosPub['6']."'";
				$cadena .= ')"><img border="0" src="images/icopdf.png" /></a></td>';
			}
			else
			{
				$cadena .= '<td align="left" valign="middle">'.$arrayDatosPub['publicacion'].'';
				
				if($arrayDatosPub['7'] <> '')
				{
					$cadena .= "<br><font style='color:#36F; font-style:italic'>".$arrayDatosPub['7']."</font>"; 
				}
					
				
				$cadena .= '</td><td align="center" valign="middle" ><a ';
				
				if($arrayDatosPub['6']<>"")
				{
					$cadena .= "onclick='alert(";
					$cadena .= '"'.$arrayDatosPub['6'].'"';
					$cadena .= ")'"; 
				}
				
				
				$cadena .= ' href="modulo/mostrarPub.php?id='.$arrayDatosPub['0'].'" target="_new"  ><img border="0" src="images/icopdf.png" /></a></td>';
			}
			
			$cadena .= '</tr>'; 
		}
		
		return $cadena."</table>";
	}
	
	function obtenDatosEstacion($id)
	{
		$queryEst = "select nombre_html, textlong, textlati, instalacion, altitud From t_estaciones where id_est = ".$id."";
		$link = conectar2();
		
		// genera la consulta
		$resEst = pg_query($link,$queryEst);
		
		return  pg_fetch_array($resEst);
	}
	
	function tablaPubTec()
	{
		$link = conectar();
		
		$query = "select ano from pub_tecnicas group by ano order by ano desc";
		
		$resPub = pg_query($link,$query);
		
		$cadena .= '<ul class="nav nav-tabs">';
		
		$i=1;
				   
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			if($i==1)
			{
				$cadena .= '<li class="active"><a data-toggle="tab" href="#tab-'.$arrayDatosPub['0'].'">'.$arrayDatosPub['0'].'</a></li>';
				$i++;
			}
			else
			{
				$cadena .= '<li><a data-toggle="tab" href="#tab-'.$arrayDatosPub['0'].'">'.$arrayDatosPub['0'].'</a></li>';
			}
		}
		
		$cadena .= '</ul><div class="tab-content table-responsive">';
		
		$resPub = pg_query($link,$query);
		
		$i=1;
		
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			if($i==1)
			{
				$cadena .= '<div class="tab-pane active" id="tab-'.$arrayDatosPub['0'].'">'.obtenPublicacionesTodas(1,$arrayDatosPub['0']).'</div>';
				$i++;
			}
			else
			{
				$cadena .= '<div class="tab-pane" id="tab-'.$arrayDatosPub['0'].'">'.obtenPublicacionesTodas(1,$arrayDatosPub['0']).'</div>';
			}
		}
		
		$cadena .= '</div>';
		
		return $cadena;
	}
	
	function fechaPubC()
	{
		$link = conectar();
		
		$query = "select ano from pub_cientificas group by ano order by ano desc";
		
		$resPub = pg_query($link,$query);
		
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			$cadena .= '<option value="#'.$arrayDatosPub['0'].'">'.$arrayDatosPub['0'].'</option>';
		}
					
		return $cadena;
	}
	
	function tablaPubC()
	{
		$link = conectar();
		
		$query = "select ano from pub_cientificas group by ano order by ano desc";
		
		$resPub = pg_query($link,$query);
		
		while ($arrayDatosPub = pg_fetch_array($resPub)) {
			$cadena .= '
				<a name="'.$arrayDatosPub['0'].'"></a>
                        <a href="#"  Title="Volver al inicio de la p&aacute;gina"><img src="images/volver.png" width="12" height="12" align="right"></a><h4 Style=" margin: 0 0 0 0;"><span Style="font-size:0.6em; color: #000; background: #E5E5E5; padding: 0.2em 0em;">&nbsp;Publicaciones cient&iacute;ficas '.$arrayDatosPub['0'].'&nbsp;</span></h4>'.publicacionesCientificas($arrayDatosPub['0']).'';
		}
					
		return $cadena;
	}
	
	function tabBoletines()
	{
		$link = conectar();
		
		$query = "select ano from boletines group by ano order by ano";
		$resAnos = pg_query($link,$query);
		
		$tabla .=  '<table class="table table-striped"><tr><td align="center" valign="middle"><strong>MES</strong></td>';
		
		//$ano = date("Y");
		
		while ($arrayAnos = pg_fetch_array($resAnos)) 
		{
			$tabla .= '<td align="center" valign="middle"><strong>'.($arrayAnos['0']).'</strong></td>';
		}
		$tabla .= '</tr>';
         
		$j=0;
		           
		for($i=1;$i<=12;$i++)
		{
			$tabla .= '<tr>';
			$tabla .= '<td align="center" valign="middle">'.mesNomBol($i).'</td>';
		
			$query = "select bol from boletines where mes = ".$i." order by ano, mes";
			//echo "<br>";
			
			$resPub = pg_query($link,$query);
			
			while ($arrayDatosPub = pg_fetch_array($resPub)) {
				
				if($arrayDatosPub['0'] == "")
				{
					$tabla .= '<td align="center" valign="middle"></a></td>';
				}
				else
				{
					$tabla .= '<td align="center" valign="middle"><a href="folletos/'.$arrayDatosPub['0'].'"><img class="img-responsive" src="images/icopdf.png"/></a></td>';
				}
				
				$j++;
			}
			
			for($h=$j;$h<6;$h++)
			{
				$tabla .= '<td align="center" valign="middle">&nbsp;</td>';	
			}
			
			$tabla .= '</tr>';
			$j=0;
		}	   
				   	      
		$tabla .= '</table>';
		
		return $tabla;
	}
	
	function reporteAutomatico()
	{
	/*	$dia = date("d");
		$mes = date("m");
		
		if($dia == "1" && $mes == "1")
		{
			if(file_exists("reporte/reportePC.txt") == FALSE && file_exists("reporte/reportePT.txt") == FALSE)
			{
				$conn = conectar();
				
				$queryPC = "select publicacion, cuenta from pub_cientificas order by cuenta desc";
				$queryPT = "select publicacion, cuenta from pub_tecnicas order by cuenta desc";
				
				$resPub = pg_query($conn,$queryPC);
				
				while ($arrayDatosPub = pg_fetch_array($resPub)) {
					$cadena .= 	$arrayDatosPub[0]."*".$arrayDatosPub[1]."\r\n";
				}
				
				$fid=fopen("reporte/reportePC.txt","a+"); 
				
				fwrite($fid, $cadena); 
				fclose($fid); 
				
				$resPub = pg_query($conn,$queryPT);
				
				while ($arrayDatosPub = pg_fetch_array($resPub)) {
					$cadena .= 	$arrayDatosPub[0]."*".$arrayDatosPub[1]."\r\n";
				}
				
				$fid=fopen("reporte/reportePT.txt","a+"); 
				
				fwrite($fid, $cadena); 
				fclose($fid); 
				
				$queryPC = "Update pub_cientificas set cuenta = 0";
				$queryPT = "Update pub_tecnicas set cuenta = 0";
				
				pg_query($conn,$queryPC);
				pg_query($conn,$queryPT);
				
			}
		}*/
	}
	
	function mesNomBol($mes)
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
	
?>