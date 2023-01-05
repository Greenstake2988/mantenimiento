<?php
//Recibe las variables del formulario autentificacion localizado en "index2.php"
$usuario = $_POST['matricula'];
$contrasenia =md5($_POST['contrasenia']);
$solicita_a=$_POST['solicita_a'];
 // Llamo a mi funcion conectarse
//Establesco mi consulta

include('../../conexion/enchufarusuarios.php');
$result = mysql_query("select id_usuario,matricula,contrasenia,nombres,apellidop,apellidom,id_area,nombre_usuario,id_tipo from usuarios where (matricula='$usuario' or nombre_usuario='$usuario') and contrasenia='$contrasenia'",$enchufarusuarios); 
if (mysql_num_rows($result)!=0) // Si el resultado de la consulta es 0 registros existe el usuario
	{
	//pongo en un arreglo la consulta para sacar nombres y apellidos mp
	$row = mysql_fetch_array($result);
	$matricula=$row['matricula'];
	$nombres=$row['nombres'].' '.$row['apellidop'].' '.$row['apellidom'];
	if($row['id_tipo']=='admin' or $row['id_tipo']=='ADMIN' or $row['id_tipo']=='docen' or $row['id_tipo']=='DOCEN')
	{
				
		//session_cache_limiter('public');
		session_start();
		$_SESSION['autentificado'] = "si";
		$_SESSION['mtl']=$matricula;
		$_SESSION['nobs']=$nombres;
		$_SESSION['sol']=$solicita_a;
		$_SESSION['area']=$row['id_area'];
		$_SESSION['id_usuario']=$row['id_usuario'];
		//establesco la hora zona horaria correcta
		//date_default_timezone_set('America/Mexico_city');
		//guardo como variable de sesion la hora del login
		//$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
		if($row['id_area']==1 and $_SESSION['sol']=='cc' )  
		{ 
	
			//redirijo a la raiz del sitio
			header('refresh: 1; url=../menuadmin.php'); //redirijo esperando 1 segundos
		} 
		
		else{
		if($row['id_area']==10 and $_SESSION['sol']=='rms' )
		{
		//redirijo a la raiz del sitio
			header('refresh: 1; url=../menuadmin.php'); //redirijo esperando 1 segundos
		
		}
		
		else 
		{	
			header('refresh: 1; url=../solicitar/form_solicita_manto.php'); //redirijo al panel de solicitudes
		}	
			echo "<title>Acceso concedido</title>";
			//Cargo mi hoja de estilos
			echo "<head><link rel=stylesheet type='text/css' href='../Templates/estilos_css.css'></head>";
			//formateo mi mensaje al usuario
			echo "<br><br><br><br><br><br><br><center><div class='cuadrito'><p>Acceso Concedido</p><p>Iniciando Sesion...</p></div></center>";
			exit();
	}
	}	
else
	{
	//redirijo al index esperando dos segundos
	header('refresh: 2; url=../index.php?error=si');
	echo "<title>ERROR</title>";
	//cargo mi hoja de estilos
	echo "<head><link rel=stylesheet type='text/css' href='../Templates/estilos_css.css'></head>";
	//formateo mi mensaje al usuario
	echo "<br><br><br><br><br><br><br><center><div class='cuadrito'><p'><img src='../imagenes/error.gif'>&nbsp;Acceso Denegado</p><p>Compruebe la contraseña y el nombre de usuario</p></div></center>";
	}
	}
	
?>
