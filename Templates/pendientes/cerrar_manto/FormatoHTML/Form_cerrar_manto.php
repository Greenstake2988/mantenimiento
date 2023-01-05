<?php session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript"> 
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
<form name="imp_cerrar_manto">
  <div align="right">
    <?php 
$folio=$_POST['folio'];
$año=$_POST['ano'];
$t_manto=$_POST['t_manto'];
$t_servicio=$_POST['t_servicio'];
$nombre=$_POST['nombre'];
$f_realizacion=$_POST['fecha_realizacion'];
$t_realizado=$_POST['t_realizado'];
$m_utilizados=$_POST['m_utilizados'];
$verificado_por=$_POST['verificado_por'];
$pendientes=1;
$proveedor=$_POST['proveedor'];
$folio_r=$_POST['folio_r'];
$año_r=$_POST['ano_r'];

include("../../../../conexion/enchufarusuarios.php");
$consulta=mysql_query( "select nombres,apellidop,apellidom from usuarios where id_usuario='$nombre'",$enchufarusuarios);
$nombre_completo = mysql_fetch_array($consulta);
    $nombres=$nombre_completo['nombres'];
    $apellidop=$nombre_completo['apellidop'];
    $apellidom=$nombre_completo['apellidom'];
    $n_completo=$nombres.' '.$apellidop.' '.$apellidom;
	

include("../../../../conexion/enchufarsolicitudes.php");
	//verifico si este mantenimiento ha sido cerrado.(terminado)
if($_SESSION['sol']=='cc'){
$validar="select  * from orden_mantenimiento where  folio='$folio' and servicio='Informático'";
$resultado= mysql_query($validar,$enchufarsolicitudes);
if (mysql_num_rows($resultado)!=0)
{
echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo "<center>Lo Siento Este Orden de Mantenimiento se ha cerrado(terminado),¡Intente de Nuevo!</center><br>";
	echo'<a href="../../cerrar_pendientes.php"><center>Seleccionar Otro</center></a>';
}
else
{
if($t_manto=='ext'){
	$guardar= mysql_query("insert into orden_mantenimiento (folio,año_folio,tipo_manto,servicio,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente,proveedor) values('$folio','$año','$t_manto','$t_servicio','$f_realizacion','$t_realizado','$m_utilizados','$pendientes','$proveedor')",$enchufarsolicitudes) or die ("error al Guardar");
echo'
		<table>
		<tr>
		<td id="noprint"> 
		<input name="imprimir" type="button" onClick="window.print();" value="Imprimir"></input>
		</td>
		</tr>
		</table>';
		
		$modificar="Update solicitudes Set folio='$folio',año_folio='$año',pendiente='$pendientes' where folio='$folio' and año_folio='$año' and solicita_a='cc'";
$resultado=mysql_query($modificar,$enchufarsolicitudes);
               }
			   else{
			   
			   $guardar= mysql_query("insert into orden_mantenimiento (folio,año_folio,tipo_manto,servicio,id_usuario,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente) values('$folio','$año','$t_manto','$t_servicio','$nombre','$f_realizacion','$t_realizado','$m_utilizados','$pendientes')",$enchufarsolicitudes) or die ("error al Guardar");
echo'
		<table>
		<tr>
		<td id="noprint"> 
		<input name="imprimir" type="button" onClick="window.print();" value="Imprimir"></input>
		</td>
		</tr>
		</table>';
		
		$modificar="Update solicitudes Set folio='$folio',año_folio='$año',pendiente='$pendientes' where folio='$folio' and año_folio='$año' and solicita_a='cc'";
$resultado=mysql_query($modificar,$enchufarsolicitudes);
			   
			   }
  }
}
 else
 {
 $validar="select  * from orden_mantenimiento where  folio='$folio' and servicio<>'Informático'";
$resultado= mysql_query($validar,$enchufarsolicitudes);
if (mysql_num_rows($resultado)!=0)
{
echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo "<center>Lo Siento Este Orden de Mantenimiento se ha cerrado(terminado),¡Intente de Nuevo!</center><br>";
	echo'<a href="../../cerrar_pendientes.php"><center>Seleccionar Otro</center></a>';
}
else
{//else para recursos materiales
if($t_manto=='ext'){
	$guardar= mysql_query("insert into orden_mantenimiento (folio,año_folio,tipo_manto,servicio,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente,proveedor,folio_r,año_r) values('$folio','$año','$t_manto','$t_servicio','$f_realizacion','$t_realizado','$m_utilizados','$pendientes','$proveedor','$folio_r','$año_r')",$enchufarsolicitudes) or die ("error al Guardar");
echo'
		<table>
		<tr>
		<td id="noprint"> 
		<input name="imprimir" type="button" onClick="window.print();" value="Imprimir"></input>
		</td>
		</tr>
		</table>';
		
		$modificar="Update solicitudes Set folio='$folio',año_folio='$año',pendiente='$pendientes' where folio='$folio' and año_folio='$año' and solicita_a<>'cc'";
$resultado=mysql_query($modificar,$enchufarsolicitudes);
      }
	  else{ 
	  $guardar= mysql_query("insert into orden_mantenimiento (folio,año_folio,tipo_manto,servicio,id_usuario,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente,año_r,folio_r) values('$folio','$año','$t_manto','$t_servicio','$nombre','$f_realizacion','$t_realizado','$m_utilizados','$pendientes','$año_r','$folio_r')",$enchufarsolicitudes) or die ("error al Guardar");
echo'
		<table>
		<tr>
		<td id="noprint"> 
		<input name="imprimir" type="button" onClick="window.print();" value="Imprimir"></input>
		</td>
		</tr>
		</table>';
		
		$modificar="Update solicitudes Set folio='$folio',año_folio='$año',pendiente='$pendientes' where folio='$folio' and año_folio='$año' and solicita_a<>'cc'";
$resultado=mysql_query($modificar,$enchufarsolicitudes);
         }
   }
}
 //ya mero termino
$consulta=mysql_query( "select nombres,apellidop,apellidom,folio from mantenimiento_iso.solicitudes inner join usuarios.usuarios ON mantenimiento_iso.solicitudes.Id_usuario=usuarios.usuarios.id_usuario inner join usuarios.area ON mantenimiento_iso.solicitudes.Id_area=usuarios.area.id_area where folio=$folio and año_folio='$año' ",$enchufarsolicitudes);
if (mysql_num_rows($consulta)==""){
	header('refresh: 2; url=form_busca_modificar.php');
	echo "<center>No Se ha encontrado el número de Folio</center>"; exit();}
	else 
{
$folio = mysql_fetch_array($consulta);
    $nombres=$folio[0];
    $apellidop=$folio[1];
    $apellidom=$folio[2];
    $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
 }
?>
  </div>
  <table width="612" height="750" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="101" colspan="2" valign="top"><table width="654" border="0" cellpadding="0" cellspacing="0" class="tablacompleta">
      <tr>
        <td width="129" rowspan="3" valign="top"><img src="../../../../imagenes/60anios.png" alt="60 a&ntilde;os" width="96" height="90" /></td>
          <td width="224" valign="top">Nombre del Documento: Formato para Orden de Trabajo de Mantenimiento </td>
          <td width="177" valign="top">SNEST/D-AD-PO-001-04</td>
          <td width="120" rowspan="3" valign="top"><img src="../../../../imagenes/logoMR200x200.jpg" width="96" height="90" /></td>
          </tr>
      <tr>
        <td width="224" rowspan="2" valign="top">&nbsp;Referencia al punto de la norma ISO &nbsp;9001:2008 6.3, 6.4</td>
          <td width="177" valign="top">&nbsp;Revisi&oacute;n: 3 </td>
          </tr>
      <tr>
        <td width="177" valign="top">&nbsp;P&aacute;gina 1 de 1</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><div align="left"></div>
      <p align="center"><strong>ORDEN DE TRABAJO DE  MANTENIMIENTO</strong></p>
      <div>
        <p align="right">N&uacute;mero de control:
          <label class="subnegritas"><?php if($_SESSION['sol']=='cc'){ printf("%'03s\n", $folio[3]);}else{ printf("%'03s\n", $folio_r);}?></label>
          <span class="subnegritas"><?php printf("%'03s\n", $año);?></span>_______ </p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><table width="654" class="tabla">
      <tr>
        <td width="756" valign="bottom" class="celdasbajo"><p><strong>Mantenimiento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Interno <?php  if ($t_manto=='int')
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
        <td width="756" valign="bottom" class="celdasbajo"><p><strong>Tipo    de servicio:</strong> <?php echo $t_servicio;?></p></td>
      </tr>
      <tr>
			<td width="756" valign="bottom"><p><strong>Asignado a:</strong>
			  <?php if ($t_manto=='ext'){echo $proveedor;}else{echo $n_completo;}?>
			</p></td>
      </tr>
    </table>
    <br /></td>
  </tr>
  <br />
  <tr>
    <td height="442" colspan="2"><table width="654" class="tabla">
      <tr>
        <td colspan="2" class="celdasbajo"><p><strong>Fecha de realizaci&oacute;n: </strong><?php echo $f_realizacion;?></p></td>
      </tr>
      <tr>
        <td colspan="2" class="celdasbajo"><p><strong>Trabajo    Realizado:</strong></p>
          <p><?php echo $t_realizado;?></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p></td>
      </tr>
      <tr>
        <td colspan="2" valign="top" class="celdasbajo"><p><strong>Materiales    utilizados:</strong></p>
          <p> <?php echo $m_utilizados;?></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          </td>
      </tr>
      <tr>
        <td width="298" valign="top" class="celdasbajo2"><p><strong>&nbsp;</strong></p>
          <p><strong>Verificado y Liberado por:</strong><?php echo $verificado_por;?></p></td>
        <td width="452" valign="top" class="celdasbajo"><p><strong>&nbsp;</strong></p>
          <p><strong>Fecha y Firma:</strong></p></td>
      </tr>
      <tr>
        <td width="298" valign="top" class="celdaderecha"><p><strong>&nbsp;</strong></p>
          <p><strong>Aprobado por:</strong><?php if($_SESSION['sol']=='cc'){echo "VIRGILIO ANTONIO CHIMAL COUOH";}else{echo'ANA PATRICIA DZIB CUPUL';} ?></p></td>
        <td width="452" valign="top"><p><strong>&nbsp;</strong></p>
          <p><strong>Fecha y Firma:</strong></p></td>
      </tr>
    </table>
      C.c.p.  Departamento de Planeaci&oacute;n Programaci&oacute;n y Presupuestaci&oacute;n&nbsp; y/o &aacute;rea equivalente<br />
    C.c.p.  &Aacute;rea Solicitante.</td>  
	<br />
  </tr>
	  <tr>
    <td>
    <div align="left"><strong>&nbsp;SNEST/D-AD-PO-001-04</strong></div></td>
    <td><div align="right"><strong>Rev. 3 &nbsp;</strong></div></td>
  </tr>
</table>
</form>
</body>
</html>
