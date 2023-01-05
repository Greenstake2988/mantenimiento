<?php session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>


<body>
<?php
include("../../conexion/enchufarsolicitudes.php");
$folio = $_GET['folio'];
$sql_orden = "select * from orden_mantenimiento where folio='$folio'";
$query_orden = mysql_query($sql_orden,$enchufarsolicitudes);
$datos_orden = mysql_fetch_array($query_orden);


	
	$anio=$datos_orden['anio_folio'];
	$t_manto=$datos_orden['tipo_manto'];
	$t_servicio=$datos_orden['servicio'];
	$nombre=$datos_orden['id_usuario'];
	$f_realizacion=$datos_orden['fecha_realizacion'];
	$t_realizado=$datos_orden['trabajo_realizado'];
	$m_utilizados=$datos_orden['materiales_usados'];
	$proveedor=$datos_orden['proveedor'];
	$folio_r=$datos_orden['folio_r'];
	$anio_r=$datos_orden['ano_r'];
	
$sql_solicitante = "select id_usuario from solicitudes where folio='$folio'";
$query_solicitante = mysql_query($sql_solicitante,$enchufarsolicitudes);
$id_solicitante = mysql_fetch_array($query_solicitante);
$id_solicitante = $id_solicitante['id_usuario'];


include("../../conexion/enchufarusuarios.php");
$sql="select nombres,apellidop,apellidom from usuarios where id_usuario='$nombre'";
$consulta=mysql_query($sql ,$enchufarusuarios);
$nombre_completo = mysql_fetch_array($consulta);
    $nombres=$nombre_completo['nombres'];
    $apellidop=$nombre_completo['apellidop'];
    $apellidom=$nombre_completo['apellidom'];
    $n_completo=$nombres.' '.$apellidop.' '.$apellidom;
	$sql="select nombres,apellidop,apellidom from usuarios where id_usuario='$id_solicitante'";
	$consulta=mysql_query($sql ,$enchufarusuarios);
	$nombre_completo = mysql_fetch_array($consulta);
    $nombres=$nombre_completo['nombres'];
    $apellidop=$nombre_completo['apellidop'];
    $apellidom=$nombre_completo['apellidom'];
    $n_completo_s=$nombres.' '.$apellidop.' '.$apellidom;


	
echo"<br>";	
?>
  </div>
    <table width="612" height="593" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="99" colspan="2" valign="top">
    <table width="704" border="0" cellpadding="0" cellspacing="0" class="tablacompleta">
      <tr>
          <td width="129" rowspan="3" valign="top" align="center"><img src="../../../../imagenes/logoMR200x200.jpg" width="91" height="91" /></td>
          <td width="224" valign="top">Nombre del Documento: Formato para Orden de Trabajo de Mantenimiento </td>
          <td width="177" valign="top">TecNM/D-AD-PO-001-04</td>
          </tr>
      <tr>
        <td width="224" rowspan="2" valign="top">&nbsp;Referencia al punto de la norma ISO &nbsp;9001:2008 6.3, 6.4</td>
          <td width="177" valign="top">&nbsp;Revisi&oacute;n: 5 </td>
          </tr>
      <tr>
        <td width="177" valign="top">&nbsp;P&aacute;gina 1 de 1</td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="2"><p align="center"><strong>ORDEN DE TRABAJO DE  MANTENIMIENTO</strong></p>
      <div>
        <p align="right">N&uacute;mero de control:
          <label class="subnegritas"><?php if($_SESSION['sol']=='cc'){ printf("%'03s\n", $folio);}else{ printf("%'03s\n", $folio_r);}?></label>
          <span class="subnegritas"><?php printf("%'03s\n", $anio);?></span>_______ </p>
    </div></td>
  </tr>
  <tr>
    <td height="113" colspan="2">
        <table width="704" class="tabla">
      <tr>
          <td valign="center" class="celdasbajo"><p><strong>Mantenimiento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Interno <?php  if ($t_manto=='int')
  {
  echo "<img src='../../../imagenes/x.jpg' />";} else { echo "<img src='../../../imagenes/nox.jpg' />";}
   
   ?> </strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Externo&nbsp;
          <?php  if ($t_manto=='ext')
  {
  echo "<img src='../../../imagenes/x.jpg' />";} else { echo "<img src='../../../imagenes/nox.jpg' />";}
   
   ?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p></td>
      </tr>
      <tr>
        <td valign="bottom" class="celdasbajo"><p><strong>Tipo de servicio:</strong> <?php echo $t_servicio;?></p></td>
      </tr>
      <tr>
			<td valign="bottom"><p><strong>Asignado a:</strong>
			  <?php if ($t_manto=='ext'){echo $proveedor;}else{echo $n_completo;}?>
			</p></td>
      </tr>
    </table>
      </td>
  </tr>
  <br />
  <tr>
    <td colspan="2" align="left" valign="top">
        <table width="704" align="left" class="tabla">
      <tr>
        <td colspan="2" class="celdasbajo"><p><strong>Fecha de realizaci&oacute;n: </strong><?php echo $f_realizacion;?></p></td>
      </tr>
      <tr>
        <td height="64" colspan="2" valign="top" class="celdasbajo"><strong>Trabajo Realizado:</strong></p>
          <p><?php echo $t_realizado;?></p></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" class="celdasbajo"><p><strong>Materiales utilizados:</strong></p>
          <p> <?php echo $m_utilizados;?></p></td>
      </tr>
      <tr>
        <td width="448" height="37" valign="top" class="celdasbajo2"><p><strong>Verificado y Liberado por:</strong><?php echo $verificado_por;?></p></td>
        <td width="452" valign="top" class="celdasbajo"><p><strong>Fecha y Firma:</strong></p></td>
      </tr>
      <tr>
          <td width="448" height="33" valign="top" class="celdaderecha"><p><strong>&nbsp;</strong><strong>Aprobado por:</strong>
          <?php if($_SESSION['sol']=='cc'){echo "DARRYL BRIAN CERVERA CANTO";}else{echo'MARCO AURELIO VIVAS &Aacute;LVAREZ';} ?>
        </p></td>
        <td width="452" valign="top"><p><strong>&nbsp;</strong><strong>Fecha y Firma:</strong></p></td>
      </tr>
    </table></td>
    </tr>
    <tr>
    <td colspan="2"><p>&nbsp;c.c.p. Departamento de Planeaci&oacute;n  Programaci&oacute;n y Presupuestaci&oacute;n&nbsp; y/o &aacute;rea  equivalente<br />
&nbsp;c.c.p. &Aacute;rea Solicitante.</p>
    <br /></td>
  </tr>
	  <tr>
    <td>
    <div align="left"><strong>&nbsp;TecNM/D-AD-PO-001-04</strong></div></td>
    <td><div align="right"><strong>Rev. 5 &nbsp;</strong></div></td>
  </tr>
</table>
</body>
</html>
