
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>
</head>
<script> 
function window.onbeforeprint(){ 
noprint.style.visibility = 'hidden'; 
noprint.style.position = 'absolute';
}
function window.onafterprint(){ 
noprint.style.visibility = 'visible'; 
noprint.style.position = 'relative'; 
}
</script> 

<body>
<form name="formato" method="post">
<?php
$id_reporte=$_GET['id_reporte'];
$id_usuario=$_GET['id_usuario'];

include("../../../conexion/enchufarsolicitudes.php");
//include("../../../conexion/enchufarusuarios.php");
$result=mysql_query( "SELECT * from memorandum where id_usuario='$id_usuario' and id_reporte='$id_reporte'",$enchufarsolicitudes);

while($row=mysql_fetch_array($result))
{
	include("../../../conexion/enchufarusuarios.php");
   
   $consultau=mysql_query("SELECT * FROM usuarios  where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);	
	
$id_reporte=$row['id_reporte'];
$id_usuario=$row['id_usuario'];
$fecha_expedicion=$row['fecha_expedicion'];
$fecha_reportada=$row['fecha_reportada'];
$area_reportada=$row['area'];
$en_horario_de=$row['horario'];
$formatohora=$row['formato'];
$observaciones=$row['observaciones'];
$nombre_completo=$usuarios['nombres'].' '.$usuarios['apellidop'].' '.$usuarios['apellidom'];


?>


  <table width="696" height="393" align="center">
  <tr>
    <td height="36" colspan="2" align="center" valign="top"><h4 align="center" class="Estilo1"><strong>DEPTO. APOYO INFORMATICO</strong><br />
    MEMORANDUM</h4>  </tr>
  <tr>
    <td height="83" colspan="2"><p class="Estilo1">Valladolid,Yucat&agrave;n a
        <?php include("../../includes/fecha.php");?>
        <?php  echo FechaFormateada($fecha_expedicion); ?>
        . <br />
        <br />
        Profr(a).: <?php echo $nombre_completo;?> Recibi: ___________________ <br />
        <br />
        Por medio de la presente se le notifica que han surgido las siguientes observaciones en cuanto al uso de los centros de computo o espacios AudioVisuales que su grupo ha ocupado.</p>
      <p align="justify" class="Estilo1"><strong>Area:</strong> <?php echo $area_reportada;?><strong> en la Fecha:</strong> <?php echo FechaFormateada($fecha_reportada);?> <strong>en el Horario de:</strong> <?php echo $en_horario_de.' '.$formatohora;?></p>
      <table width="685" height="78" border="0">
        <tr>
          <td width="696" height="61" valign="top"><span class="Estilo1">Observaciones:
              <label></label><?php echo $observaciones;?></span> <p class="Estilo1">&nbsp;</p>
            <p class="Estilo1">&nbsp;</p>
            <p class="Estilo1">&nbsp;</p></td>
        </tr>
      </table>
      <p align="justify" class="Estilo1">Solicitamos su apoyo para sensibilizar a los alumnos en el uso adecuado de los espacios y equipos del instituto, por su colaboraci&ograve;n muchas gracias. </p>
      </td>
  </tr>
  <tr>
    <td width="321" height="54"><p align="center" class="Estilo1">Atte.<br />
      L.I. Virgilio Antonio Chimal Couoh </p></td>
    <td width="363"><p align="center"><br />
      <?php //echo $nom_completo;?></p></td>
  </tr>
</table><table align="center">
			  <tr>
		    	 <td id="noprint"> 
		        	<input name="imprimir" type="button" onClick="window.print();" value="Imprimir"></input>
		      	 </td>
		  	  </tr>
		</table>
      <div align="center">
        <p>&nbsp;</p>
        <p>--------------------------------------------------------------------------------------------------------------<br /> 
        </p>
      </div>
      <table width="696" height="393" align="center">
    <tr>
      <td height="36" colspan="2" align="center" valign="top"><h4 align="center" class="Estilo1"><strong>DEPTO. APOYO INFORMATICO</strong><br />
        MEMORANDUM</h4></td>
    </tr>
    <tr>
      <td height="83" colspan="2"><p class="Estilo1">Valladolid,Yucat&agrave;n a
        <?php //include("../../includes/fecha.php");?>
          <?php  echo FechaFormateada($fecha_expedicion); ?>
        . &nbsp;<br />
        <br />
        Profr(a).: <?php echo $nombre_completo;?> Recibi: ___________________ <br />
        <br />
        Por medio de la presente se le notifica que han surgido las siguientes observaciones en cuanto al uso de los centros de computo o espacios AudioVisuales que su grupo ha ocupado.</p>
          <p align="justify" class="Estilo1"><strong>Area:</strong> <?php echo $area_reportada;?> <strong>en la F echa: </strong> <?php echo FechaFormateada($fecha_reportada);?> <strong>en el Horario de</strong>: <?php echo $en_horario_de.' '.$formatohora;?></p>
          <table width="685" height="82" border="0">
            <tr>
              <td width="696" height="78" valign="top"><span class="Estilo1">Observaciones: <?php echo $observaciones;?></span>
              <p class="Estilo1">&nbsp;</p>
              <p class="Estilo1">&nbsp;</p>
              <p class="Estilo1">&nbsp;</p></td>
            </tr>
        </table>
        <p align="justify" class="Estilo1">Solicitamos su apoyo para sensibilizar a los alumnos en el uso adecuado de los espacios y equipos del instituto, por su colaboraci&ograve;n muchas gracias. </p></td>
    </tr>
    <tr>
      <td width="321" height="54"><p align="center" class="Estilo1">Atte.<br />
        L.I. Virgilio Antonio Chimal Couoh </p></td>
      <td width="363"><p align="center"><br />
              <?php } //echo $nom_completo;?>
      </p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
