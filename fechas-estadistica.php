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
<link rel="stylesheet" type="text/css" media="all" href="calendario/sistema.css" title="chocolate" />
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<script type="text/javascript" src="calendario/calendar.js"></script>
<script type="text/javascript" src="calendario/calendar-sp.js"></script>
<script type="text/javascript" src="calendario/calendar-setup.js"></script>



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
  <form name="estadistica-fechas" method="post" action="estadistica.php">
    <p align="right"><a href="estadistica.php"><img src="imagenes/inicio.png" border="0" /></a>
    <p>
      <table  width="516" height="228" border="0" align="center" cellpadding="4" bgcolor="#CCCCCC" class="tabla" >
          <tr>
            <td height="23" colspan="3" align="center" valign="middle" ><p class="title">Estad&iacute;stica de Mantenimientos</p>
            <p>Seleccione el Periodo a consultar</p></td>
          </tr>
          <tr>
            <th height="32" align="right" nowrap="nowrap" ><td align="center" valign="middle" >          
            <td width="158" rowspan="3" align="center" valign="middle" ><p>&nbsp;</p>
              <button  name="buscar" type="submit" onclick="return valFechas();"  height="10" size="5">
                <img src="imagenes/buscar.png" width="32" height="32"/>              </button>          
        </tr>
      <tr>
		  
            <th width="138" height="64" align="right" nowrap="nowrap" ><p>Del</p>
<td width="188" align="center" valign="middle" ><p>
              <input type="text" name="fecha1" id="fecha1" value="<?php echo date('Y/m/d');?>" size=15 readonly="true" />
              <img src="imagenes/picker.gif" alt="Date picker" width="17" height="15" longdesc="Selector de fecha"  name="picker" id="picker" style="cursor: pointer; border: 1px solid brown;" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />
              <script type="text/javascript">
         	Calendar.setup({
       		inputField     :    "fecha1",     // id of the input field
        	ifFormat       :    "%Y/%m/%d",      // format of the input field
        	button         :    "picker",  // trigger for the calendar (button ID)
        	align          :    "Tl",           // alignment (defaults to "Bl")
        	weekNumbers    :    false,
			singleClick    :    true
    						});
			    </script>
</p>            
          </tr>
          <tr>
            <td height="47" ><div align="right" class="Estilo2">Al</div>
            <td width="188" align="center" valign="middle" ><input type="text" name="fecha2" id="fecha2" value="<?php echo date('Y/m/d');?>" size="15" readonly="true" />
              <img src="imagenes/picker.gif" alt="Date picker" width="17" height="15" longdesc="Selector de fecha"  name="picker1" id="picker1" style="cursor: pointer; border: 1px solid brown;" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />
              <script type="text/javascript">
         	Calendar.setup({
       		inputField     :    "fecha2",     // id of the input field
        	ifFormat       :    "%Y/%m/%d",      // format of the input field
        	button         :    "picker1",  // trigger for the calendar (button ID)
        	align          :    "Tl",           // alignment (defaults to "Bl")
        	weekNumbers    :    false,
			singleClick    :    true
    						});
			  </script>            
          </tr>
      </table>
      <center>
         <p>&nbsp;</p>
</center>
    </p>
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
