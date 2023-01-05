<?php
//Inicio la sesión
session_cache_limiter('public');
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['autentificado'] != "si")
 {
//si no existe, va a la página de autenticacion
header('refresh: 1; url=../index.php'); //redirijo esperando dos segundos
	echo "<title>Error</title>";
	//Cargo mi hoja de estilos
	echo "<head><link rel=stylesheet type='text/css' href='../Templates/estilos_css.css'></head>";
	//formateo mi mensaje al usuario
	echo "<br><br><br><br><br><br><br><center><div class='cuadrito'><p class='mensaje1'>Error</p><p class='mensaje2'>Debe Iniciar Una Sesion</p></div></center>";
	exit();
}
?>

<?php
session_unset();
unset($_SESSION['autentificado']);
header('location:../index.php'); //redirijo esperando dos segundos
	echo "<title>Cerrando Sesion</title>";
	//Cargo mi hoja de estilos
	echo "<head><link rel=stylesheet type='text/css' href='../Templates/estilos_css.css'></head>";
	//formateo mi mensaje al usuario
	echo "<br><br><br><br><br><br><br><center><div class='cuadrito'><p class='mensaje1'>Mensaje de Sistema</p><p class='mensaje2'>Cerrando Sesion</p></div></center>";
	exit();
?>