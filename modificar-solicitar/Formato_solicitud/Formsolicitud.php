<?php 
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<script> 
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
<form name="formato" method="post">
  <div align="right"><?php 
$folio=$_POST['folio'];
$folio2=$_POST['folio2'];
$anio2=$_POST['ano2'];
$anio=$_POST['ano'];
$fecha_solicitud= $_POST['fecha_solicitud'];
$solicita_a=$_POST['solicita_a'];
$marca_x="X";
$area= $_POST['area'];
$nombre= $_POST['nombre_completo'];
$falla= $_POST['falla'];
$id_area=$_POST['id_area'];
$id_usuario=$_POST['id_usuario'];

include("../../../conexion/enchufarsolicitudes.php");
//actualizar para centro de computo
if($_SESSION['sol']=='cc')
            {
            $modificar="Update solicitudes Set folio='$folio',anio_folio='$anio',fecha='$fecha_solicitud',id_area='$id_area',id_usuario='$id_usuario',falla_reparar='$falla' where folio='$folio2' and anio_folio='$anio' and solicita_a='cc'";
            $resultado=mysql_query($modificar,$enchufarsolicitudes);
            if($resultado)
                    {
                            mysql_affected_rows();

                    }

            echo'
                    <table>
                    <tr>
                            <td id="noprint"> 
                                    <input name="imprimir" type="button" onClick="window.print();" value="Imprimir"> </input>
                            </td>
                    </tr>
                    </table>';
                    }
 else
	{
        $modificar="Update solicitudes Set folio='$folio',anio_folio='$anio',fecha='$fecha_solicitud',id_area='$id_area',id_usuario='$id_usuario',falla_reparar='$falla' where folio='$folio2' and anio_folio='$anio' and solicita_a<>'cc'";
        $resultado=mysql_query($modificar,$enchufarsolicitudes);
        if($resultado)
                {
                        mysql_affected_rows();

                }

        echo'
                <table>
                    <tr>
                        <td id="noprint"> 
                                <input name="imprimir" type="button" onClick="window.print();" value="Imprimir"> </input>
                        </td>
                    </tr>
                </table>';
    }
 
 
 ?>
   </div>
    <table width="900"align="center">
  <tr>
    <td><table width="900" border="0" cellpadding="0" cellspacing="0" class="tablacompleta">
      <tr>
          <td><img src="../../../imagenes/encabezadoformatocalidad.png" width="900"></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>
      <p align="center"><strong>SOLICITUD DE MANTENIMIENTO</strong></p>
      <br />
      <div style="float: left; clear: left;">
      <table border="1" align="right" cellpadding="0" cellspacing="0" class="tablacompleta">
        <!--DWLayoutTable-->
      <tr>
        <td height="25" valign="top" align="left">&nbsp;Recursos Materiales y Servicios</td>
       <td width="38" valign="top"><center><?php if($_SESSION['sol']=='rms'){echo $marca_x;}?></center></td>
      </tr>
      <tr>
        <td height="20" valign="top" align="left">&nbsp;Mantenimiento de Equipo</td>
      <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
      </tr>
      <tr>
        <td height="20" valign="top" align="left">&nbsp;Centro de C&oacute;mputo</td>
      <td valign="top"> <div><center><?php if($_SESSION['sol']=='cc'){echo $marca_x;}?></center></div></td>
      </tr>
    </table></div>
       <div style="float: right; margin-top: 18px; padding-right: 5px;">Folio: <label class="subnegritas"><?php echo $folio;?></label>
          <span class="subnegritas"><?php echo $anio;?></span> </div>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
          
    </td>
    </tr>
  <tr>
    <td class="tabla" align="left"><p><br />
&nbsp;&Aacute;rea Solicitante: <?php echo $area;?></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><br />
	<table border="0" cellspacing="0" cellpadding="0" width="900" class="tabla">
      <tr>
        <td valign="bottom" class="celdasbajo" align="left"><p><strong>&nbsp;</strong></p>
          <p>&nbsp;Nombre y Firma del Solicitante: <?php echo $nombre;?></p></td>
      </tr>
      <tr>
        <td valign="top" class="celdasbajo" align="left"><p><strong>&nbsp;</strong></p>
          <p>&nbsp;Fecha de Elaboraci&oacute;n: <?php echo $fecha_solicitud;?></p></td>
      </tr>
      <tr>
        <td valign="top" class="celdasbajo" align="left"><p>&nbsp;Descripci&oacute;n del Servicio Solicitado o Falla a Reparar: </p></td>
      </tr>
      <tr>
        <td valign="top" height="120" class="justifyText" > <?php echo $falla;?></strong></p>
         </td>
      </tr>
    </table></td>
  </tr>
  <tr>
      <td colspan="2">
<!------------------------- PIE DE FORMATO  -->
<table border="0" align="center">
  <tr>
    <td align="center">
      <img src="../../../imagenes/logoMR200x200.jpg" width="60">
    </td>
    <td>
      <img src="../../../imagenes/plastico.png" width="60">
    </td>
    <td align="center">
      <img src="../../../imagenes/discriminacion.png" width="60">
    </td>
    <td>
      <img src="../../../imagenes/9001.jpeg" width="50">
    </td>
    <td>
      <img src="../../../imagenes/14001.jpeg" width="50">
    </td>
    <td>
      <img src="../../../imagenes/50001.jpeg" width="50">   
    </td>
    <td>
      <img src="../../../imagenes/45001.jpeg" width="50">
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
<!-- FIN PIE FORMATO -->
      </td>
  </tr>
</table>
</center>
</body>
</html>