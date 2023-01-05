<?php
session_start();
require("../../sesion/proteccion.php");

	 
?><head>

<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
<link href="menu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<script language="javascript">
function confirmar(mensaje)
{
 return confirm(mensaje);
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.Estilo1 {color: #FFFFFF}
-->
</style></head>
 <form>      <?php
$buscarpor=$_POST['buscarpor'];

include("../../../conexion/enchufarsolicitudes.php");
//include("../../../conexion/enchufarusuarios.php");
include("../../includes/fecha.php");

$result=mysql_query( "SELECT * from memorandum where id_usuario='$buscarpor'",$enchufarsolicitudes);


while($row=mysql_fetch_array($result))
{
 $id_usuario=$row['id_usuario'];	

include("../../../conexion/enchufarusuarios.php");
   
   $consultau=mysql_query("SELECT * FROM usuarios  where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);	
	
	
$id_reporte=$row['id_reporte'];
$id_usuario=$usuarios['id_usuario'];
$fecha_expedicion=$row['fecha_expedicion'];
$area_reportada=$row['area'];
$observaciones=$row['observaciones'];
$nombre_completo=$usuarios['titulo'].' '.$usuarios['nombres'].' '.$usuarios['apellidop'].' '.$usuarios['apellidom']
?>
<br />
<table width="376" border="0" align="center" class="fondotabla">
   
  <tr>
    <td>Fecha Expedici&ograve;n </td><input type="hidden" name="id_reporte" readonly="" value="<?php echo $id_reporte;?>" size="30" />
    <td><input type="text" name="fecha_expedicion" readonly="" value="<?php echo FechaFormateada($fecha_expedicion);?>" size="30" /></td>
  </tr>
  <tr>
       <td width="116">Docente</td>
      <td width="250"><input name="id_usuario" value="<?php echo $nombre_completo;?>" type="text" size="30" id="id_usuario" readonly=""  /></td>
  </tr>
     
  <tr>
       <td>Area Reportada</td>
       <td><input name="area" value="<?php echo $area_reportada; ?>" type="text" size="30" id="area" readonly="" /></td>
  </tr>
  <tr>
    <td>Observaciones</td>
    <td><textarea name="observaciones" readonly="readonly"><?php echo $observaciones;?></textarea></td>
  </tr>
 </table>
 
   
<table width="376" border="0" align="center" class="fondotabla" >
    <tr>
      <td width="76">&nbsp;</td>  
      <td width="86"><a href="eliminar_memorandum.php?id_reporte=<?php echo $id_reporte; ?> "><img src="../../imagenes/eliminar.png" width="32" height="32"  align="right" style="cursor: pointer;;" longdesc="Eliminar Memorandum"  onmouseover="this.style.background='#FFFFFF';" onMouseOut="this.style.background=''"/></a></td>
      
	  <td width="20">&nbsp;</td>
      <td width="176"><a href="reimprimir.php?id_reporte=<?php echo $id_reporte; ?>&id_usuario=<?php echo $id_usuario; ?>"><img src="../../imagenes/printer.png" style="cursor: pointer;;" onMouseOver="this.style.background='#FFFFFF';" onMouseOut="this.style.background=''" longdesc="Modificar Equipo"/></a></td>
    </tr>
  </table>
 </form>
  <?php
  
  }
//mysql_free_result($result);
?>

