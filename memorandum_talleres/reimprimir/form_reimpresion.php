<?php
session_start();
require("../../sesion/proteccion.php");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<script language="JavaScript" type="text/javascript" src="../../includes/ajaxlib.js"></script>
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
    <td bgcolor="#FF9900"><div align="right"><img src="../../../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
  <div align="right"><?php echo "<div align='right'><a href='../../menuadmin.php'><img src='../../imagenes/inicio.png' alt='Menu' width='32' height='32' /></a></div>"?></div>
       <form name="form_reimpresion" method="post" onsubmit="ConsultaDatos('buscar.php','resultado','buscarpor='+document.getElementById('buscarpor').value,'POST'); return false" action="#"><div align="left"></div>
	  
	   
	    <div align="left"></div>
        <p></p>
        <table  width="457" border="0" align="center" cellpadding="4" bgcolor="#CCCCCC" class="tabla" >
          <tr>
            <td colspan="2" ><p align="center">&nbsp;</p>
                <p align="center">Buscar Memorandum de Docentes </p>
                <p align="center">&nbsp;</p></td>
          </tr>
          <tr>
            <td ><font  size="3"><strong>Buscar 
              Por:
              <?php 
include("../../../conexion/enchufarsolicitudes.php");
//include("../../../conexion/enchufarusuarios.php");

$consulta=mysql_query( "SELECT id_usuario from memorandum",$enchufarsolicitudes)
//$consulta= mysql_query("select  distinct mantenimiento_iso.memorandum.id_usuario,usuarios.usuarios.titulo,usuarios.usuarios.nombres,usuarios.usuarios.apellidom,usuarios.usuarios.apellidop from mantenimiento_iso.memorandum,usuarios.usuarios  where mantenimiento_iso.memorandum.id_usuario=usuarios.usuarios.id_usuario") 
or die ("Error en la conexioacute;con  el gestor al leer");

 echo '<select name= "buscarpor" id="buscarpor" >';
  while( $row = mysql_fetch_row($consulta) ){
 $id_usuario_memo=$row[0];

 include("../../../conexion/enchufarusuarios.php");
   
   $consultau=mysql_query("SELECT * FROM usuarios  where id_usuario='$id_usuario_memo'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);

$nombre_completo=$usuarios['titulo'].' '.$usuarios['nombres'].' '.$usuarios['apellidop'].' '.$usuarios['apellidom'];
	 echo '<option value ="'; echo $row[0]; echo '">'; echo $nombre_completo; echo'</option>';
    }
	echo '</select>';	   ?>
            
            </strong></font></td>
            <td ><button  name="buscar" type="submit"  height="8" size="5">
             <img src="../../imagenes/buscar.png" width="32" height="42"/>
            </button></td>
          </tr>
		  
          <tr>
            <td width="381" >&nbsp;</td>
            <td width="54" ></td>
          </tr>
      </table>
      <p>
	  </form>
	  <div    id="resultado"  title="Resultado de la consulta" ></div>
      
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
