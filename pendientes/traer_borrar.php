<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.:: Sistema Mantenimiento (ISO) ::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />

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

<!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
        <form  name="form1" method="post" action="borrar_pendiente.php" >
		<?php 
		$buscar_folio=$_POST['buscar_folio'];
		$buscar_anio=$_POST['buscar_ano'];
		
		include("../../conexion/enchufarsolicitudes.php");
		//include("../../conexion/enchufarusuarios.php");
	
		//if (mysql_num_rows($consulta)!=0){echo "no hay datos";}
		//valido la busqueda para centro de computo
		if($_SESSION['sol']=='cc'){	
		$consulta=mysql_query( "SELECT folio,anio_folio,tipo_manto,servicio,fecha_realizacion,trabajo_realizado,materiales_usados  from orden_mantenimiento where folio='$buscar_folio' and anio_folio='$buscar_anio'",$enchufarsolicitudes);
	
	if (mysql_num_rows($consulta)==''){
	header('refresh: 2; url=form_busca_borrar.php');
	echo "<center>No Se ha encontrado el n�mero de Folio</center>"; exit();
  }
else 
{
	
	//manto computo.
while($folio = mysql_fetch_array($consulta)){
    $num_folio=$folio['folio'];
    $anio_folio=$folio['anio_folio'];
   $tipo_manto=$folio['tipo_manto'];
	$servicio=$folio['servicio'];
    $fecha_realizacion=$folio['fecha_realizacion'];
	$trabajo_realizado=$folio['trabajo_realizado'];
	$materiales_usados=$folio['materiales_usados'];

/*   //buscamos usuarios computo
   include("../../conexion/enchufarusuarios.php");
   
   $consultau=mysql_query("SELECT * FROM usuarios INNER JOIN area on usuarios.id_area=area.id_area where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);
   
   //usuarios	computo
    $nombres=$usuarios['nombres'];
    $apellidop=$usuarios['apellidop'];
    $apellidom=$usuarios['apellidom'];
    $descripcion=$usuarios['descripcion'];
	 $id_area=$usuarios['id_area'];
	$id_usuario=$usuarios['id_usuario'];
   $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom; */
      }
  }
 }
 //para recursos materiales
 
 else{	
 
  include("../../conexion/enchufarsolicitudes.php");
		$consulta1=mysql_query( "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes where folio='$buscar_folio' and anio_folio='$buscar_anio' and solicita_a<>'cc'",$enchufarsolicitudes);
	
	if (mysql_num_rows($consulta1)==''){
	header('refresh: 2; url=form_busca_modificar.php');
	echo "<center>No Se ha encontrado el n�mero de Folio</center>"; exit();}
	else 
{
while($folio = mysql_fetch_array($consulta1)){
    $num_folio=$folio['folio'];
    $anio_folio=$folio['anio_folio'];
   $fecha_solicitud=$folio['fecha'];
	$solicita_a=$folio['solicita_a'];
    $falla=$folio['falla_reparar'];
	$id_area=$folio['id_area'];
	$id_usuario=$folio['id_usuario'];
	
	include("../../conexion/enchufarusuarios.php");
	$consultau=mysql_query("SELECT * FROM usuarios INNER JOIN area on usuarios.id_area=area.id_area where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);
	
    $nombres=$usuarios['nombres'];
    $apellidop=$usuarios['apellidop'];
    $apellidom=$usuarios['apellidom'];
    $descripcion=$usuarios['descripcion'];
	 $id_area=$usuarios['id_area'];
	$id_usuario=$usuarios['id_usuario'];
   $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
 }
 }
 }
 		
		?>
          <p align="center" class="caption">&quot;Modificaci&oacute;n de Mantenimiento Correctivo&quot;</p>
          <p align="center">&nbsp; </p>
          <table width="490" border="0" align="center" class="tabla">
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center" class="Estilo2">FOLIO</div></td>
              <td><input name="folio" type="text"  value="<?php echo $num_folio;?>" size="2" readonly="" />
              <input name="ano" type="text"  value="<?php echo $anio_folio;?>" size="2" readonly="" />
              <input name="folio2" type="hidden"  value="<?php echo $num_folio;?>" size="2" readonly="" />
              <input name="ano2" type="hidden"  value="<?php echo $a&ntilde;o_folio;?>" size="2" readonly="" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center">FECHA</div></td>

              <td><input name="fecha_solicitud" type="text"   value="<?php echo $fecha_realizacion;?>" size="10" readonly="" /></td>
            </tr>
            <tr>
              <td width="200">Recursos Materiales y Servicios </td>
              <td width="48"><input name="solicita_a" type="radio" value="rms" <?php if($_SESSION['sol']=='rms'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?>  /></td>
              <td width="49">&nbsp;</td>
              <td width="171"><label>
              <input name="id_area" type="hidden"   value="<?php echo $id_area;?>" size="10" readonly="" />
              </label></td>
            </tr>
            <tr>
              <td>Mantenimiento de Equipo </td>
              <td><input name="solicita_a" type="radio" disabled="disabled" value="me" /></td>
              <td>&nbsp;</td>
              <td><label>
              <input name="id_usuario" type="hidden"   value="<?php echo $id_usuario;?>" size="10" readonly="" />
              </label></td>
            </tr>:
            <tr>
              <td>Centro de C&oacute;mputo </td>
              <td><input name="solicita_a" type="radio" value="cc"  <?php if($_SESSION['sol']=='cc'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?>  /></td>
              <td>&nbsp;</td>
              <td><label></label></td>
            </tr>
          </table>
		  <br />
          <table width="491" border="0" class="tabla" align="center">
            <tr>
              <td width="130">Asignado a : </td>
              <td width="341"><label>
                <input type="text" name="area" readonly="" size="45" value="<?php echo $descripcion;?>" />
              </label></td>
            </tr>
            <tr>
              <td>Nombre del Solicitante: </td>
              <td><input name="nombre_completo" type="text" id="nombre_completo" readonly="" value="<?php echo $nombre_completo;?>" size="45" /></td>
            </tr>
          </table>
          <p>
            <label></label>
          
          <p align="center" class="textpie">Descripci&oacute;n del Servicio Solicitado o Falla a Reparar:</p>
          <p>
		  <div align="center">
        <textarea name="falla" cols="50" rows="5" ><?php echo $trabajo_realizado;?></textarea>
          </div>  
      <div align="center">
        <textarea name="mat_usa" cols="50" row="5" ><?php echo $materiales_usados;?></textarea>
      </div>
          </p>
          <p>
            <label></label>
            <label></label>
          </p>
          <table width="247" border="0" align="center">
            <tr>
              <td><input type="submit" name="Submit" value="Actualizar" >
              </input></td>
              <td><input type="reset" name="" value="Deshacer"  /> </td>
            </tr>
          </table>
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
