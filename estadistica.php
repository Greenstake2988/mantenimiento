<?php 
session_start();
require("sesion/proteccion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.textpie {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
	color: #999999;
}
.textoarriba {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
	color: #666666;
}
body {
	background-color: #CCCCCC;
}
a:link {
	color: #990000;
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
  <form name="estadistica" method="post">
    <p align="right">
     <?php
	 	 
		 $fecha1=$_POST['fecha1'];
		 $fecha2=$_POST['fecha2'];
		 
	 	include ("../conexion/enchufarsolicitudes.php");
	 $solicitudes=mysql_query(" select count(pendiente) from solicitudes where fecha between "."'"."$fecha1"."'"."AND"."'" ."$fecha2 "."'"."AND solicita_a='cc'  " );
  while ($total_solicitudes=mysql_fetch_array($solicitudes))
	{
      $t_solicitudes=$total_solicitudes[0];
	  
	}  
    
   $atendidos=mysql_query("select count(pendiente) from solicitudes where fecha between "."'"."$fecha1"."'"."AND"."'" ."$fecha2 "."'"."AND solicita_a='cc' and pendiente=1  ");

    while ($total_atendidos=mysql_fetch_array($atendidos))
	{
      $t_atendidos=$total_atendidos[0];

	}
   $manto_por_atender=$t_solicitudes-$t_atendidos;
   $estadistica=round($t_atendidos/$t_solicitudes,7)*100;
  ?>

  <?php include("includes/fecha.php");?> 
       <a href="menuadmin.php"><img src="imagenes/inicio.png" border="0" /></a>
    <p>
      
      <center>
         <p>Valladolid, Yucat&aacute;n a
           <?php   echo FechaFormateada(date('Y/m/d'));?>
         </p>
         <p class="otras_letras">&quot;ESTADISTICA DE MANTENIMIENTOS&quot; </p>
         <p  class="textpie">DEL  <?php echo FechaFormateada($fecha1).''.' AL '.' '.FechaFormateada($fecha2).''?>  </p>
      </center>
    </p>
    <table width="331" border="0" align="center" class="fondotabla">
      <tr>
        <td width="197">TOTAL DE SOLICITUD DE MANTENIMIENTO.  </td>
        <td width="13"><div align="center">=</div></td>
        <td width="106"><div align="center"><?php echo $t_solicitudes;?></div></td>
      </tr>
      <tr>
        <td>TOTAL DE MANTENIMIENTO ATENDIDO. </td>
        <td><div align="center">=</div></td>
        <td><div align="center"><?php echo $t_atendidos; ?></div></td>
      </tr>
      <tr>
        <td>TOTAL DE MANTENIMIENTO POR ATENDER </td>
        <td><div align="center">=</div></td>
        <td><div align="center"><?php echo $manto_por_atender;?></div></td>
      </tr>
      <tr>
        <td colspan="3">----------------------------------------------------------------------------------------------------</td>
        </tr>
      <tr>
        <td>PORCENTAJE (%) DE MANTENIMIENTOS REALIZADOS </td>
        <td><div align="center">=</div></td>
        <td><div align="center"><?php echo $estadistica;?></div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;  </p>
  </form>
<!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td bgcolor="#333333" class="textpie"><div align="center">Instituto Tecnol&oacute;gico Superior de Valladolid<br />
      Km 3.5, Carretera Valladolid-Tizim&iacute;n, Tablaje Catastral No. 8850<br />
    C.P. 97780, Tel.. 9858566300, Valladolid, Yucat&aacute;n. </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="textpie"><div align="center">
      <table width="100%%" border="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
