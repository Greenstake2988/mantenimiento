<?php
// session_start();
//require("../sesion/proteccion.php");

?>
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
include('../../../conexion/enchufarusuarios.php');
$fecha_expedicion=$_POST['fecha_expedicion'];

$nombre=$_POST['nombre'];
$area=$_POST['area'];
$observaciones=substr($_POST['observaciones'],3,-4);
$fecha_reporte=$_POST['fecha_reporte'];
$en_horario_de=$_POST['tiempo'];
$id_reporte=$_POST['id_reporte'];
$formatohora=substr($_POST['tiempo'],6);

$consulta= mysql_query("SELECT id_usuario,nombres,apellidop,apellidom FROM usuarios where id_usuario=$nombre",$enchufarusuarios) 
or die ('Error en la conexioacute;con  el gestor al leer');  
 $array_nombre = mysql_fetch_row($consulta);
 
	 $nombres=$array_nombre[1];
	 $apellidop=$array_nombre[2];
	 $apellidom=$array_nombre[3];
	 $nom_completo=$nombres.' '.$apellidop.' '.$apellidom;
	 include('../../../conexion/enchufarsolicitudes.php');
	 
	 $validar="select  * from memorandum where  id_reporte='$id_reporte'";
  $resultado= mysql_query($validar,$enchufarsolicitudes);
     if (mysql_num_rows($resultado)!=0)
          {
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo "<center>Lo Siento Memoramdum existente,¡Intente de Nuevo!</center><br>";
			   echo'<a href="form_llenado.php"><center>Regressar</center></a>';
	
				//echo'<a href="../solicitar/form_solicita_manto.php"><center>volver</center></a>';
           }
else
	{
	 
	 $result= mysql_query("insert into memorandum (id_reporte,fecha_expedicion,id_usuario,area,fecha_reportada,horario,formato,observaciones) 		values('$id_reporte','$fecha_expedicion','$nombre','$area','$fecha_reporte','$en_horario_de','$formatohora','$observaciones')",$enchufarsolicitudes) or die ("error al Guardar");
}
?>
  <table width="696" height="393" align="center">
  <tr>
    <td height="36" colspan="2" align="center" valign="top"><h4 align="center" class="Estilo1"><strong>DEPTO. APOYO INFORMATICO</strong><br />
    MEMORANDUM</h4>  </tr>
  <tr>
    <td height="83" colspan="2"><p class="Estilo1">Valladolid,Yucat&agrave;n a
        <?php include("../../includes/fecha.php");?>
        <?php  echo FechaFormateada(date('Y/m/d')); ?>
        . <br />
        <br />
        Profr(a).: <?php echo $nom_completo;?> Recibi: ___________________ <br />
        <br />
        Por medio de la presente se le notifica que han surgido las siguientes observaciones en cuanto al uso de los centros de computo o espacios AudioVisuales que su grupo ha ocupado.</p>
      <p align="justify" class="Estilo1"><strong>Area:</strong> <?php echo $area;?><strong> en la Fecha:</strong> <?php echo FechaFormateada($fecha_reporte);?> <strong>en el Horario de:</strong> <?php echo $en_horario_de;?></p>
      <table width="685" height="78" border="0">
        <tr>
          <td width="696" height="61" valign="top"><span class="Estilo1"><strong>Observaciones:</strong>
              <label></label><?php echo $observaciones;?></span> 
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
              <?php echo FechaFormateada(date('Y/m/d'));?>
        . &nbsp;<br />
        <br />
        Profr(a).: <?php echo $nom_completo;?> Recibi: ___________________ <br />
        <br />
        Por medio de la presente se le notifica que han surgido las siguientes observaciones en cuanto al uso de los centros de computo o espacios AudioVisuales que su grupo ha ocupado.</p>
          <p align="justify" class="Estilo1"><strong>Area:</strong> <?php echo $area;?> <strong>en la F echa: </strong><?php echo FechaFormateada($fecha_reporte);?> <strong>en el Horario de</strong>: <?php echo $en_horario_de;?></p>
          <table width="685" height="82" border="0">
            <tr>
              <td width="696" height="78" valign="top"><span class="Estilo1"><strong>Observaciones:</strong> <?php echo $observaciones;?></span>
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
              <?php //echo $nom_completo;?>
      </p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
