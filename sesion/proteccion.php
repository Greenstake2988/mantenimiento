<?php
session_start();//Inicio la sesión
//session_cache_limiter('public');

//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['autentificado'] != "si")
 {
//si no existe, va a la página de autenticacion
header('refresh: 1; url=../index.php'); //redirijo esperando dos segundos
	echo "<title>Error</title>";
	//Cargo mi hoja de estilos
	echo "<head><link rel=stylesheet type='text/css' href='../Templates/estilos_css.css'></head>";
	//formateo mi mensaje al usuario
	echo "<br><br><br><br><br><br><br><center><div class='cuadrito'><p>Error</p><p>Debe Iniciar Una Sesion</p></div></center>";
	exit();
} 
		
?>