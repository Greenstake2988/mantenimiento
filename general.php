<?php
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
?>
<form name="general" method="post" action="">
  
    <div align="center">
      <div align="center">
        <?php
        header('refresh:60;url=general.php');
        include("conexion/enchufarsolicitudes.php");
		include("conexion/enchufarusuarios.php");
	
		//if (mysql_num_rows($consulta)!=0){echo "no hay datos";}	
		$consulta=mysql_query( "select folio,anio_folio,fecha,falla_reparar,nombres,apellidop,apellidom,descripcion,area.id_area,usuarios.id_usuario from mantenimiento_iso.solicitudes inner join usuarios.usuarios ON mantenimiento_iso.solicitudes.Id_usuario=usuarios.usuarios.id_usuario inner join usuarios.area ON mantenimiento_iso.solicitudes.Id_area=usuarios.area.id_area where pendiente=0",$enchufarsolicitudes);
?>
      </div>
      <div>
      
        <div align="center">Solicitudes de Mantenimientos </div>
    </div>
    <table width="680" align="center" class="tablacontenedora">
<tr>
<th width="234" height="32" bgcolor="#CCCCCC"><div align="left">SOLICITANTE</div></th>
<th width="188" bgcolor="#CCCCCC"><div align="left">SOLICITA (FALLA) </div></th>
<th width="63" bgcolor="#CCCCCC"><div align="left">FECHA</div></th>
<th width="63" bgcolor="#CCCCCC"><div align="left">FOLIO</div></th>

</tr>
	
    <?php 

while ($folio=mysql_fetch_array($consulta))
{
   
	 
    $num_folio=$folio[0];
    $anio_folio=$folio[1];
    $fecha_solicitud=$folio[2];
    $falla=$folio[3];
    $nombres=$folio[4];
    $apellidop=$folio[5];
    $apellidom=$folio[6];
    $descripcion=$folio[7];
	$id_area=$folio[8];
	$id_usuario=$folio[9];
    $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
echo '<tr><td>'.$nombre_completo.'</td>';
echo '<td>'.$falla.'</td>';
echo '<td>'.$fecha_solicitud.'</td>';
echo '<td>'.$num_folio.''.$anio_folio.'</td>';

}
?>
</table>
<P>
<?php

include("conexion/enchufar.php"); 
$hoy=date('Y/m/d');
$result=mysql_query( "select  * FROM prestamos,usuarios.usuarios,paquete WHERE prestamos.id_paquete = paquete.id_paquete and usuarios.matricula=prestamos.matricula and prestamos.estado='1' and prestamos.fecha_inicial='$hoy'  order by fecha_inicial asc");
echo'<center><font size="4">Listado de Reservaciones</font></center><br>';
echo'<center><table width="880" height="50" border="1" class="tabla">';
echo'<tr>';
 echo'<td width="96" rowspan="2"><div align="center">Id
   Prestamo </div></td>
 ';
 echo'<td width="107" rowspan="2"><div align="center">Fecha
   Reservada </div></td>
 ';
  echo'<td width="142" rowspan="2"><div align="center">Paquete
    Reservado </div></td>
  ';
  echo'<td height="23" colspan="2"><div align="center">Hora </div></td>';
  echo"<td width='212' rowspan='2'><div align='center'>Usuario </div></td>";
  
   echo'';
 echo' </tr>';
  echo'<tr>';
  echo'<td width="95" height="23" valign="top"><div align="center">Inicial</div></td>';
   echo' <td width="111" valign="top"><div align="center">Final</div></td>';
  echo'</tr>';
echo'</table></center>';
   if(mysql_num_rows($result)!=0);
while($row=mysql_fetch_array($result))
{
echo'<br>';
 echo'<center><table width="880" height="50" border="0" align="center" class="tablacontenedora">';
 //echo'
 // <tr>';
 echo'<td width="94" height="44" valign="top"><div align="justify">'.$row[0].'</div></td>
 ';
   echo' <td width="104" valign="top"><div align="center">'.$row[2].'</div></td>
   ';
 echo'<td width="146" valign="top"><div align="justify">'.$row[26].'</div></td>
 ';
 echo'<td width="110" valign="top"><div align="">'.$row[3].'</div></td>
 ';
   echo' <td  width="110" valign="top"><div align="">'.$row[4].'</div></td>
   <td  width="214" valign="top"><div align="justify">'.$row[17].' '.$row[18].' '.$row[19].'</div></td>';
  
   //imprimo para campos observacion y motivo
   
 echo'<table width="880" height="50" border="0" class="bordetablapunteado">';
  echo'<tr>';
   echo'<td width="359"><div align="center"><strong>Motivo </strong></div></td>';
    echo'<td width="360"><div align="center"><strong>Observacion</strong></div></td>';
  echo'</tr>';
  echo'<tr>';
   echo'<td>'.$row[9].'</td>';
    echo'<td>'.$row[10].'</td>';
 echo'</tr>';
echo'</table>';
    
   
   //finalizo de imprimir los campos observacion y motivo
   
	?>
	
<?php     
	
echo ' </tr>';
echo'</table></center>';
   }
mysql_free_result($result);
?>


</form>
