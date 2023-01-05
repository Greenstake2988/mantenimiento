<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
tb_show("","../popup/popup.php?height=420&width=500&modal=true");
});
 
function doPrint(){
document.all.item("noprint").style.visibility='hidden';
window.print();
document.all.item("noprint").style.visibility='visible';
window.location = "cerrado_exitoso.php";
}
 function redirecciona(){
     document.location = "cerrado_exitoso.php";
 }
</script>
</head>
 

<body>
  <div align="right">
    <?php
        $folio=$_POST['folio'];
        $anio=$_POST['ano'];
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
        $anio_r=$_POST['ano_r'];
        include("../../../../conexion/enchufarusuarios.php");
        $sql="select nombres,apellidop,apellidom from usuarios where id_usuario='$nombre'";
        $consulta=mysql_query($sql ,$enchufarusuarios);
        $nombre_completo = mysql_fetch_array($consulta);
        $nombres=$nombre_completo['nombres'];
        $apellidop=$nombre_completo['apellidop'];
        $apellidom=$nombre_completo['apellidom'];
        $n_completo=$nombres.' '.$apellidop.' '.$apellidom;
        include("../../../../conexion/enchufarsolicitudes.php");
         //verifico si este mantenimiento ha sido cerrado.(terminado)
        if($_SESSION['sol']=='cc')
        {
            $validar="select  * from orden_mantenimiento where  folio='$folio' and servicio='Inform?tico'";
            $resultado= mysql_query($validar,$enchufarsolicitudes);
            if($t_manto=='ext')
                {
                 $sql = "insert into orden_mantenimiento (folio,anio_folio,tipo_manto,servicio,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente,proveedor) values('$folio','$anio','$t_manto','$t_servicio','$f_realizacion','$t_realizado','$m_utilizados','$pendientes','$proveedor')";
                 $guardar= mysql_query($sql,$enchufarsolicitudes) or die (mysql_error($enchufarsolicitudes));
                 $modificar="Update solicitudes Set folio='$folio',anio_folio='$anio',pendiente='$pendientes' where folio='$folio' and anio_folio='$anio' and solicita_a='cc'";
                 $resultado=mysql_query($modificar,$enchufarsolicitudes);
                }
                else 
                    {

                    $guardar= mysql_query("insert into orden_mantenimiento (folio,anio_folio,tipo_manto,servicio,id_usuario,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente) values('$folio','$anio','$t_manto','$t_servicio','$nombre','$f_realizacion','$t_realizado','$m_utilizados','$pendientes')",$enchufarsolicitudes) or die (mysql_error($enchufarsolicitudes));           
                    $modificar="Update solicitudes Set folio='$folio',anio_folio='$anio',pendiente='$pendientes' where folio='$folio' and anio_folio='$anio' and solicita_a='cc'";
                    $resultado=mysql_query($modificar,$enchufarsolicitudes);

                    }
            } 
        else
            {
                $validar="select  * from orden_mantenimiento where  folio='$folio' and servicio<>'Inform&aacute;tico'";
                $resultado= mysql_query($validar,$enchufarsolicitudes);
                if($t_manto=='ext')
                    {
                        $sql = "insert into orden_mantenimiento (folio,anio_folio,tipo_manto,servicio,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente,proveedor,folio_r,anio_r) values('$folio','$anio','$t_manto','$t_servicio','$f_realizacion','$t_realizado','$m_utilizados','$pendientes','$proveedor','$folio_r','$anio_r')";
                        $guardar= mysql_query($sql,$enchufarsolicitudes) or die (mysql_error($enchufarsolicitudes));
                        $modificar="Update solicitudes Set folio='$folio',anio_folio='$anio',pendiente='$pendientes' where folio='$folio' and anio_folio='$anio' and solicita_a<>'cc'";
                        $resultado=mysql_query($modificar,$enchufarsolicitudes);
                        
                     }
                      else
                          {
                          $guardar= mysql_query("insert into orden_mantenimiento (folio,anio_folio,tipo_manto,servicio,id_usuario,fecha_realizacion,trabajo_realizado,materiales_usados,pendiente,anio_r,folio_r) values('$folio','$anio','$t_manto','$t_servicio','$nombre','$f_realizacion','$t_realizado','$m_utilizados','$pendientes','$anio_r','$folio_r')",$enchufarsolicitudes) or die (mysql_error($enchufarsolicitudes));
                          $modificar="Update solicitudes Set folio='$folio',anio_folio='$anio',pendiente='$pendientes' where folio='$folio' and anio_folio='$anio' and solicita_a<>'cc'";
                          $resultado=mysql_query($modificar,$enchufarsolicitudes);
                           }
            }

 
?>
      <table>
         <tr>
         <td id="noprint"> 
         <input name="imprimir" type="button" onClick="doPrint();" value="Imprimir"></input>
         <input name="cerrar" type="button" onClick="redirecciona();" value="Cerrar"></input>
         </td>
         </tr>
    </table>
  </div>
  <table width="900" height="593" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="99" colspan="2" valign="top">
    <table width="900" border="0" cellpadding="0" cellspacing="0" class="tablacompleta">
      <tr>
          <td><img src="../../../../imagenes/encabezadoformatocalidad.png" width="704"></img></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="2"><p align="center"><strong>ORDEN DE TRABAJO DE  MANTENIMIENTO</strong></p>
      <div>
        <p align="center">N&uacute;mero de control:
          <label class="subnegritas"><?php if($_SESSION['sol']=='cc'){ printf("%'03s\n", $folio);}else{ printf("%'03s\n", $folio_r);}?></label>
          <span class="subnegritas"><?php printf("%'03s\n", $anio);?></span></p>
    </div></td>
  </tr>
  <tr>
    <td height="113" colspan="2">
        <table width="900" class="tabla">
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
        <table width="900" align="left" class="tabla">
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
          <?php if($_SESSION['sol']=='cc'){echo "C.P. DARRYL BRIAN CERVERA CANTO";}else{echo'C.P. MARCO AURELIO VIVAS &Aacute;LVAREZ';} ?>
        </p></td>
        <td width="452" valign="top"><p><strong>&nbsp;</strong><strong>Fecha y Firma:</strong></p></td>
      </tr>
    </table>
   </td>
    </tr>
  <tr><td>
  <table border="0" align="center">
  <tr>
    <td align="center">
      <img src="../../../../imagenes/logoMR200x200.jpg" width="60">
    </td>
    <td>
      <img src="../../../../imagenes/plastico.png" width="60">
    </td>
    <td align="center">
      <img src="../../../../imagenes/discriminacion.png" width="60">
    </td>
    <td>
      <img src="../../../../imagenes/9001.jpeg" width="50">
    </td>
    <td>
      <img src="../../../../imagenes/14001.jpeg" width="50">
    </td>
    <td>
      <img src="../../../../imagenes/50001.jpeg" width="50">   
    </td>
    <td>
      <img src="../../../../imagenes/45001.jpeg" width="50">
    </td>
    <td align="center"><font size="2">Carretera Valladolid - Tizim&iacute;n, Km. 3.5 Tablaje Catastral<br />
    No. 8850 Valladolid, Yucat&aacute;n, M&eacute;xico, C.P. 97780,<br />
                Tel&eacute;fono 985 - 856 - 6300 | <strong>www.valladolid.tecnm.mx</strong><br />
                </font>
    </td>
    <td align="right">
      Julio 2017<br />
      
    </td>
  </tr>
  </table>
</td></tr>
</table>
</body>
</html>
