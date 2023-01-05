<?php
require("sesion/proteccion.php");
$matricula = $_SESSION['mtl'];
$nombres = $_SESSION['nobs'];
$solicita_a=$_SESSION['sol'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<script type="text/javascript" src="includes/dtree.js"></script>
<link href="Templates/estilos.css" rel="stylesheet" type="text/css" />
<link href="Templates/dtree.css" rel="stylesheet" type="text/css" />
<link href="Templates/estilos_css.css" rel="stylesheet" type="text/css" />

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
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:255px;
	height:187px;
	z-index:1;
	left: 644px;
	top: 260px;
	visibility: inherit;
	overflow: automatico;
}
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
      <div align="right" ><a href="sesion/p_destruye_session.php"><img src='imagenes/cerrar_sesion.gif' alt='Salir Del Sistema' width='32' height='32' /></a>
        
<?php if($solicita_a=='cc'){?>
</div>
      <table width="20%" height="120" border="0" bordercolor="">
        <tr>
      <td width="90%" height="60">
	  <div class="dtree" align="left">
<br />
<fieldset title="Menu: Permite navegar por el sistema">

  <script type="text/javascript">
		<!--
		d = new dTree('d');
		d.config.target = "_self";
		d.add(0,-1,'Menu');
		d.add(1,0,'Solicitudes','#','Nos permite hacer una solicitud de mantenimiento');
		d.add(2,1,'Solicitar','solicitar/form_solicita_manto.php','Nos permite Hacer una solicitud de mantenimieto');
	  d.add(3,1,'Modificar Solicitud','modificar-solicitar/form_busca_modificar.php','Nos permite Modificar las solicitudes');
		d.add(4,0,'Registros de mantenimientos pendientes','#','Nos permite revisar los mantenimientos pendientes o bien cerra mantenimientos terminados');
		d.add(5,4,'Pendientes','pendientes/solo_pendientes.php','Nos Muestra el listado de mantenimientos pendientes');
		d.add(6,4,'Cerrar pendiente','pendientes/cerrar_pendientes.php','Nos permite cerrar los mantenimientos realizados');
		d.add(11,4,'Borrar pendiente','pendientes/form_busca_borrar.php','Nos permite borrar los mantenimientos realizados');
		d.add(7,0,'Estadistica','#','Nos Muestra la estadistica de los mantenimientos');
		d.add(12,7,'Demora de mantenimiento','busqueda_tiempo.php','Permite conocer el tiempo transcurrido para cerrar una solicitud mantenimiento');
                d.add(13,7,'Estadistica','fechas-estadistica.php','Nos Muestra la estadistica de los mantenimientos');
		d.add(8,0,'Memorandum','#','Nos permite llenar una hoja de memorandum');
		d.add(9,8,'Llenar Memorandum','memorandum_talleres/alta/form_llenado.php','Nos permite Lienar una hoja  de Memorandum');
		d.add(10,8,'Reimpresion y Eliminacion de Memorandum','memorandum_talleres/reimprimir/form_reimpresion.php');
		document.write(d);
		d.openAll();
			//-->
	</script>
	
</fieldset>	
</div>
      </td>
    </tr>
</table>
      <div id="apDiv1">
        <h4 align="center" class="titulos">Bienvenido</h4>
        <h4 align="center" class="titulos_extras"> Sistema  &quot;Mantenimiento Correctivo Y Preventivo &quot;</h4>
        <p  align="center" class="otras_letras"><?php echo 'Matricula: '.$matricula.'<br>'.'Nombre: '.$nombres;?></p>
      </div>
<?php }else{?>

<table width="20%" height="120" border="0" bordercolor="" align="left">
    <tr>
      <td width="90%" height="60">
	  <div class="dtree" align="left">
<br />
<fieldset title="Menu: Permite navegar por el sistema">

  <script type="text/javascript">
		<!--
		d = new dTree('d');
		d.config.target = "_self";
		d.add(0,-1,'Menu');
		d.add(1,0,'Solicitudes','#','Nos permite hacer una solicitud de mantenimiento');
		d.add(2,1,'Solicitar','solicitar/form_solicita_manto.php','Nos permite Hacer una solicitud de mantenimieto');
    d.add(3,1,'Modificar Solicitud','modificar-solicitar/form_busca_modificar.php','Nos permite Modificar las solicitudes');
		d.add(4,0,'Registros de mantenimientos pendientes','#','Nos permite revisar los mantenimientos pendientes o bien cerra mantenimientos terminados');
		d.add(5,4,'Pendientes','pendientes/solo_pendientes.php','Nos Muestra el listado de mantenimientos pendientes');
		d.add(6,4,'Cerrar pendiente','pendientes/cerrar_pendientes.php','Nos permite cerrar los mantenimientos realizados');
		d.add(7,0,'Estadistica','#','Nos Muestra la estadistica de los mantenimientos');
		d.add(12,7,'Demora de mantenimiento','busqueda_tiempo.php','Permite conocer el tiempo transcurrido para cerrar una solicitud mantenimiento');
    d.add(13,7,'Estadistica','fechas-estadistica.php','Nos Muestra la estadistica de los mantenimientos');
		d.add(8,0,'Memorandum','#','Nos permite llenar una hoja de memorandum');
		d.add(9,8,'Llenar Memorandum','memorandum_talleres/alta/form_llenado.php','Nos permite Lienar una hoja  de Memorandum');
		d.add(10,8,'Reimpresion y Eliminacion de Memorandum','memorandum_talleres/reimprimir/form_reimpresion.php');
		document.write(d);
		d.openAll();
			//-->
	</script>
	
</fieldset>	
</div>
      </td>
    </tr>
</table>
<div id="apDiv1" align="left">
        <h4 align="center" class="titulos">Bienvenido</h4>
        <h4 align="center" class="titulos_extras"> Sistema  &quot;Mantenimiento Correctivo Y Preventivo &quot;</h4>
        <p  align="center" class="otras_letras"><?php echo 'Matricula: '.$matricula.'<br>'.'Nombre: '.$nombres;?></p>
      </div>
  

<?php } ?>


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
