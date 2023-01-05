<?php
//require("../../sesion/proteccion.php");
?>

	<?php
$id_reporte=$_GET['id_reporte'];
include("../../../conexion/enchufarsolicitudes.php");
 $eliminar="Delete  From memorandum Where id_reporte='$id_reporte'";
$resultado=mysql_query($eliminar,$enchufarsolicitudes);
echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo"<br>";
		echo "<center>El Memorandum Se Ha Eliminado Correctamente</center><br><br>";
		echo"<center><a href='form_reimpresion.php'>ACEPTAR</a></center>";
if ($resultado)
{
mysql_affected_rows();
}

?>