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
            $pendiente = 0;
            $modificar="Update solicitudes Set pendiente='$pendiente', where folio='$folio2' and anio_folio='$anio' and solicita_a='cc'";
            $borrar="Delete FROM orden_mantenimiento WHERE where folio='$folio2' and anio_folio='$anio'";
            $resultado=mysql_query($modificar,$enchufarsolicitudes);
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
</body>
</html>