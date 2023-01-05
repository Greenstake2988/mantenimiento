<?php 
session_start();
require("sesion/proteccion.php");
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
</head>

<body>
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF">
<!-- InstanceBeginEditable name="EditRegion3" -->
<p align="right"><a href="busqueda_tiempo.php"><img src="imagenes/inicio.png" border="0" /></a>
  <?php
  $fecha_inicial =  $_POST['fecha1'];
  $fecha_final = $_POST['fecha2'];
  include ("../conexion/enchufarsolicitudes.php");
  $log = $_SESSION['sol'];
  $sql = "select * from solicitudes where fecha between '$fecha_inicial' AND '$fecha_final' AND solicita_a ='$log'";
  $query_solicitudes = mysql_query($sql,$enchufarsolicitudes);
  ?>
<div align="center">
    <table>
           <thead>
		    <tr>
			<th colspan="7">Solicitudes realizadas entre <?php echo $fecha_inicial.' & '.$fecha_final; ?></th>
			</tr>
			<tr>
			<th>Folio</th>
                        <th>&Aacute;rea solicitante</th>
                        <th>Usuario</th>
                        <th>Espera</th>
                        <th>Fecha de solicitud</th>
                        <th>Fecha realizaci&oacute;n</th>
                        <th>Detalle</th>
			</tr>
           </thead>
			<tbody>
                            <?php
                                while ($datos_solicitud = mysql_fetch_object($query_solicitudes))
                                {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $datos_solicitud->folio.$datos_solicitud->anio_folio;?>
                                </td>
                                <td>
                                    <?php
                                    include ("../conexion/enchufarusuarios.php");
                                    $sql_area = "select descripcion from area where id_area='$datos_solicitud->id_area'";
                                    $query_area = mysql_query($sql_area,$enchufarusuarios);
                                    $datos_area = mysql_fetch_object($query_area);
                                    echo $datos_area->descripcion;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_usuario = "select nombres, apellidop,apellidom from usuarios where id_usuario='$datos_solicitud->id_usuario'";
                                    $query_usuario = mysql_query($sql_usuario,$enchufarusuarios);
                                    $datos_usuario = mysql_fetch_object($query_usuario);
                                    echo $datos_usuario->nombres." ".$datos_usuario->apellidop." ".$datos_usuario->apellidom;
                                    ?>
                                </td>
                                <td>
                                <?php
                                  include ("../conexion/enchufarsolicitudes.php");
                                  if($log=='cc'){
                                      $sql_ordenmto = "select * from orden_mantenimiento where folio='$datos_solicitud->folio' and anio_folio='$datos_solicitud->anio_folio'";
                                  }
                                  else {
                                      $sql_ordenmto = "select * from orden_mantenimiento where folio='$datos_solicitud->folio' and servicio<>'inform&aacute;tico' and anio_folio='$datos_solicitud->anio_folio'";
                                  }
                                  $query_ordenmto = mysql_query($sql_ordenmto,$enchufarsolicitudes);
                                  $datos_ordenmto = mysql_fetch_object($query_ordenmto);
                                  $tt_fecha_inicial = new DateTime($datos_ordenmto->fecha_realizacion);
                                  $tt_fecha_final = new DateTime($datos_solicitud->fecha);
                                  $tt_resultado = $tt_fecha_final->diff($tt_fecha_inicial);
                                  echo $tt_resultado->format('%a d&iacute;as');

                                ?>
                                </td>
                                 <td>
                                    <?php echo $datos_solicitud->fecha;?>
                                </td>
                                <td>
                                    <?php 
                                    if ($datos_solicitud->pendiente=='1') {
                                        echo $datos_ordenmto->fecha_realizacion; 
                                    }
                                    else echo "Pendiente";
                                    ?>
                                </td>
                                <td>
                                   <a href="detalle_solicitud.php?fol=<?php echo $datos_solicitud->folio.'&a='.$datos_solicitud->anio_folio.'&area='.$log?>" target="_blank">Solicitud</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                        </tbody>
                            <tfoot>
				<tr>
                                    <th colspan="7"></th>
				</tr>
                            </tfoot>
        </table>
</div>             
<!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td bgcolor="#333333" class="textpie"><div align="center">Instituto Tecnol&oacute;gico Superior de Valladolid<br />
      Km 3.5, Carretera Valladolid-Tizim&iacute;n, Tablaje Catastral No. 8850<br />
    C.P. 97780, Tel.. 9858566300, Valladolid, Yucat&aacute;n. </div></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
