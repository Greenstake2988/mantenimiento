<?php 
require("../sesion/proteccion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.:: Sistema Mantenimiento (ISO) ::.</title>
<script type="text/javascript" src="../includes/jquery.js"></script>
<script type="text/javascript" src="../includes/thickbox.js"></script>
<link rel="stylesheet" type="text/css" href="../includes/thickbox.css"/>
<script language="JavaScript">
$(document).ready(function(){
tb_show("","../popup/popup.php?height=420&width=500&modal=true");
});
</script>

<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../editor/tiny_mce/tiny_mce.js"></script>
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

<script language="javascript">
function confirmar(mensaje)
{
 return confirm(mensaje);
}
</script>


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
<!--
.Estilo2 {color: #FF0000}
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
        <form  name="form1"  method="post" action="../FormatoHTML/FormTipo1.php" >
        
          <div><?php if($_SESSION['area']==1 and $_SESSION['sol']=='cc') { ?>
            <div align="right"><a href="../menuadmin.php"><img src="../imagenes/inicio.png" border="0" /></a></div>
			   <?php } else{ if($_SESSION['area']==10 and $_SESSION['sol']=='rms') { ?> <div align="right"><a href="../menuadmin.php"><img src="../imagenes/inicio.png" border="0" /></a></div><?php }}?>
          </div>
		  <p align="center" class="caption">&quot;Solicitud de Mantenimiento Correctivo &quot;</p>
		  <p align="center" class="caption">&nbsp; </p>
		  <table width="490" border="0" align="center" class="fondotabla">
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center" class="Estilo2">FOLIO</div></td>
              <td><?php 
			include('../../conexion/enchufarsolicitudes.php');
			if($_SESSION['sol']=='cc'){
			
		$consulta= mysql_query("SELECT max(folio+1) FROM solicitudes",$enchufarsolicitudes) 
or die ('Error en la conexioacute;con  el gestor al leer');
while($folio = mysql_fetch_row($consulta) ){
  echo' <input name="folio"  size="2" readonly=""  value="'.$folio[0].'"/>';
  $anio=date('/y');
    
    }
}
	else
	{
	
	//codigo ingresado el 19 de mayo de 2009 (codigo para recursos materiales)
	$consulta1= mysql_query("SELECT max(folio+1)  FROM solicitudes where solicita_a<>'cc'",$enchufarsolicitudes) 
or die ('Error en la conexioacute;con  el gestor al leer');
while($folio = mysql_fetch_row($consulta1) ){
  echo' <input name="folio"  size="2" readonly=""  value="'.$folio[0].'"/>';
    $anio=date('/y');
	
	//fin codigo recursos materiales
	}
}
?>
                <input name="ano" type="text"  value="<?php echo $anio;?>" size="2" readonly="" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center">FECHA</div></td>

              <td><input name="fecha_solicitud" type="text"   value="<?php echo date('Y/m/d');?>" size="10" readonly="" /></td>
            </tr>
            <tr>
              <td width="200">Recursos Materiales y Servicios </td>
              <td width="48"><input name="solicita_a" type="radio" value="rms" <?php if($_SESSION['sol']=='rms'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?>/></td>
              <td width="49"></td>
              <td width="171"><label></label></td>
            </tr>
            <tr>
              <td>Mantenimiento de Equipo </td>
              <td><input name="solicita_a" type="radio" disabled="disabled" value="me" /></td>
              <td>&nbsp;</td>
              <td><label></label></td>
            </tr>
            <tr>
              <td>Centro de C&oacute;mputo </td>
              <td><input name="solicita_a" type="radio" value="cc" <?php if($_SESSION['sol']=='cc'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?>  /></td>
              <td>&nbsp;</td>
              <td><label></label></td>
            </tr>
          </table>
          <br />
          <table width="491" border="0" class="tabla" align="center">
            <tr>
              <td width="130">&Aacute;rea Solicitante : </td>
              <td width="341"><?php 
			include('../../conexion/enchufarusuarios.php');
		$consulta= mysql_query("SELECT id_area,descripcion FROM area",$enchufarusuarios) 
or die ('Error en la conexioacute;con  el gestor al leer'); 
 echo '<select name="area">';
 while( $array_area = mysql_fetch_array($consulta) )
 	{
 ?>
 	 <option value ="<?php echo $array_area['id_area'];?>" <?php if ($array_area['id_area']==$_SESSION['area']) { echo " selected='selected'";} ?>><?php echo $array_area['descripcion'];?></option>
  <?php	 
    }
	echo "</select><br>";
	
?></td>
            </tr>
            <tr>
              <td>Nombre del Solicitante </td>
              <td><?php 
			include('../../conexion/enchufarusuarios.php');
		$consulta= mysql_query("SELECT id_usuario,nombres,apellidop,apellidom FROM usuarios",$enchufarusuarios) 
or die ('Error en la conexioacute;con  el gestor al leer');  
 echo '<select name= "nombre">';
 while( $array_nombre = mysql_fetch_array($consulta) ){
 ?>
	<option value ="<?php echo $array_nombre['id_usuario'];?>" <?php if ($array_nombre['id_usuario']==$_SESSION['id_usuario']) { echo " selected='selected'"; $usuario_para_popup=$array_nombre['nombres']." ".$array_nombre['apellidop']." ".$array_nombre['apellidom'];} ?>><?php echo $array_nombre['nombres']." ".$array_nombre['apellidop']." ".$array_nombre['apellidom'];?></option>
<?php
    }
	echo "</select>";	  
	
?></td>
            </tr>
          </table>
			<p align="center" class="textoarriba">Descripci&oacute;n del Servicio Solicitado o Falla a Reparar:</p>
          <p>
          <div align="center">
            <textarea name="falla"  cols="50" rows="5" ></textarea>
            </label>
          </div><br />
          <table width="247" border="0" align="center">
            <tr>
              <td><input type="submit" onclick="return confirmar('Esta Seguro de Guardar Esta Solicitud de Mantenimiento');" name="Submit" value="Enviar"  ></input></td>
              <td><input type="reset" name="" value="Limpiar"  /> </td>
		    </tr>
          </table>
      </form>
		  <br />

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
