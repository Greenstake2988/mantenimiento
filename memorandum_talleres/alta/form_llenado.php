<?php
session_start();
require("../../sesion/proteccion.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>
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
 <script language="javascript" src="../../includes/reloj/mootools.v1.11.js"></script>
 <script language="javascript" src="../../includes/reloj/nogray_time_picker_min.js"></script>
 
<script language="JavaScript" type="text/javascript" src="../reloj/ajaxlib.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../../calendario/sistema.css" title="chocolate" />
<script type="text/javascript" src="../../calendario/calendar.js"></script>
<script type="text/javascript" src="../../calendario/calendar-sp.js"></script>
<script type="text/javascript" src="../../calendario/calendar-setup.js"></script>
<script type="text/javascript" src="../../editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

<script type="text/javascript" src="../../editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme: "advanced",
	editor_selector : "siEditor",
	language : "es",
	plugins: "table,paste,media,visualchars,nonbreaking,xhtmlxtras,filemanager,layer",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,blockquote,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left"
	
		});
</script>
<style type="text/css">
<!--
.Estilo8 {font-size: 9px}
-->
</style>
<style type="text/css">
<!--
.Estilo9 {font-size: 12px; }
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../../../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
 <?php echo "<div align='right'><a href='../../menuadmin.php'><img src='../../imagenes/inicio.png' alt='Menu' width='32' height='32' /></a></div>"?>
 <form name="memorandum" method="post" action="imprimir.php">
  <p align="center">DEPTO. APOYO INFORMATICO </p>
  <p align="center">MEMORANDUM</p>
  <table width="756" height="534" border="0" class="fondotabla" >
    <tr>
      <td colspan="7">Valladolid,Yucat&agrave;n a
	  <?php include("../../includes/fecha.php"); ?> 
        <?php  echo FechaFormateada(date('Y/m/d'));?>. <input type="hidden" name="fecha_expedicion" id="fecha_expedicion" size="15" readonly="true" value="<?php echo date('Y/m/d');?>" /></td>
      </tr>
    <tr>
      <td height="37" colspan="7"><p>Profr(a).:<?php 
			include('../../../conexion/enchufarusuarios.php');
		$consulta= mysql_query("SELECT id_usuario,nombres,apellidop,apellidom FROM usuarios where puesto='DOCENTE'",$enchufarusuarios) 
or die ('Error en la conexioacute;con  el gestor al leer');  
 echo '<select name= "nombre">';
 while( $array_nombre = mysql_fetch_array($consulta) ){
 ?>
	<option value ="<?php echo $array_nombre['id_usuario'];?>"><?php echo $array_nombre['nombres']." ".$array_nombre['apellidop']." ".$array_nombre['apellidom'];?></option>
<?php
    }
	echo "</select>";	  
	
?></p>        </td>
      </tr>
    <tr>
      <td colspan="7">Por medio de la presente se le notifica que han surgido las siguientes observaciones en cuanto al uso de los centros de computo o espacios AudioVisuales que su grupo ha ocupado.</td>
      </tr>
    <tr>
      <td width="262" height="55" align="center" valign="middle"><p align="left">Area:<label>
            <select name="area" id="area">
              <option value="SALON DE COMPUTO 1">SALON DE COMPUTO 1</option>
              <option value="SALON DE COMPUTO 2">SALON DE COMPUTO 2</option>
              <option value="SALON DE COMPUTO 3">SALON DE COMPUTO 3</option>
              <option value="SALON DE COMPUTO 4">SALON DE COMPUTO 4</option>
              <option value="LABORATORIO DE IDIOMAS">LABORATORIO DE IDIOMAS</option>
              <option value="AUDIODISUAL 1">AUDIOVISUAL 1</option>
              <option value="AUDIOVISUAL 2">AUDIOVISUAL 2</option>
              <option value="AUDIOVISUAL 3">AUDIOVISUAL 3</option>
              <option value="SALA DE USOS MULTIPLES">SALA DE USOS MULTIPLES</option>
              <option value="SALA DE JUNTAS 1">SALA DE JUNTAS 1</option>
              <option value="SALA DE JUNTAS 2">SALA DE JUNTAS 2</option>
              <option value="AUDITORIO">AUDITORIO</option>
              <option value="TALLER DE ALIMENTOS Y BEBIDAS">TALLER DE ALIMENTOS Y BEBIDAS</option>
              <option value="HOTELERIA">HOTELERIA</option>
              </select>
            </label>
          </p>
        <span class="Estilo8"></span></td>
      <td width="105">Fecha_a Reportar </td>
      <td width="122"><input type="text" name="fecha_reporte" id="fecha_reporte" size="15" readonly="true" value="<?php echo date('Y/m/d');?>" /></td>
      <td width="19"><img src="../../imagenes/picker.gif" alt="Date picker" width="17" height="15" longdesc="Selector de fecha"  name="picker" id="picker" style="cursor: pointer; border: 1px solid brown;" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />
	  <script type="text/javascript">
         	Calendar.setup({
       		inputField     :    "fecha_reporte",     // id of the input field
        	ifFormat       :    "%Y/%m/%d",      // format of the input field
        	button         :    "picker",  // trigger for the calendar (button ID)
        	align          :    "Tl",           // alignment (defaults to "Bl")
        	weekNumbers    :    false,
			singleClick    :    true
    						});
			</script></td>
      <td width="58"><div align="center">en Horario de </div></td>
      <td width="155"><br />
        

<input name="tiempo"  type="text" id="tiempo" size="8" readonly=""   maxlength="10" /> 
<a href="#" id="link_reloj">Abrir reloj</a>
<div id="contenedor_reloj" ></div>
<script language="javascript">
var tp2 = new TimePicker('contenedor_reloj', 'tiempo', 'link_reloj',{imagesPath:"../../includes/reloj/images/"});
</script>
		
      </td>
      <td width="1">&nbsp;</td>
      </tr>
    <tr>
      <td height="231" colspan="7" valign="top"><p>
        <p align="center">Observaciones:</p>
          <p>
            <div align="center">
            <textarea class="siEditor" name="observaciones" cols="60" rows="8" ></textarea>
            </label>
          </div><br /> </td>
    </tr>
    <tr>
      <td colspan="7"><p>Solicitamos su apoyo para sensibilizar a los alumnos en el uso adecuado de los espacios y equipos del instituto, por su colaboraci&ograve;n muchas gracias. </p>
        <p align="center">
          <label>Enviar e Imprimir <br />
          <input type="submit" name="Submit" value="Enviar" />
          </label>
        </p></td>
      </tr>
  </table>
  <p>
    <?php 
			include('../../../conexion/enchufarsolicitudes.php');
						
	$consulta_reporte= mysql_query("SELECT max(id_reporte+1)  FROM memorandum",$enchufarsolicitudes) 
or die ('Error en la conexioacute;con  el gestor al leer');
while($id_reporte = mysql_fetch_row($consulta_reporte) ){


  echo' <input type="hidden" name="id_reporte"  size="2" readonly=""  value="'.$id_reporte[0].'"/>';
    }
?></p>
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
