<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/intranet_sin_menu.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.:: Sistema Mantenimiento (ISO) ::.</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script type="text/javascript" src="../includes/dtree.js"></script>
<link href="../Templates/estilos.css" rel="stylesheet" type="text/css" />
<link href="../Templates/dtree.css" rel="stylesheet" type="text/css" />
<link href="../Templates/estilos_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="maqueta">
<div id="header"><img src="../imagenes/encabezado.gif" alt="Encabezado" longdesc="Este es la imagen de encabezado de la pagina" /></div>
<div id="contenido_sin_menu"><!-- InstanceBeginEditable name="contenido" -->
	 
	 <div align="right"><a href="../menuadmin.php"><img src="../imagenes/inicio.png" border="0" /></a></div>
     <div align="center">Solicitud De Mantenimientos Pendientes </div>
     
	  <form name="pendientes" method="post" action="">
  
    <?php

        //header('refresh:60;url=cerrar_pendientes.php');
        include("../../conexion/enchufarsolicitudes.php");
		//include("../conexion/enchufarusuarios.php");
	
if($_SESSION['sol']=='cc')
		{	
		$consulta=mysql_query( "SELECT folio,año_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes   where pendiente=0 and solicita_a='cc'",$enchufarsolicitudes);
?><div>

	<table width="680" align="center" class="tablacontenedora">
<tr>
<th width="234" height="32" bgcolor="#CCCCCC"><div align="left">SOLICITANTE</div></th>
<th width="188" bgcolor="#CCCCCC"><div align="left">SOLICITA (FALLA) </div></th>
<th width="79" bgcolor="#CCCCCC"><div align="left">FECHA</div></th>
<th width="79" bgcolor="#CCCCCC"><div align="left">FOLIO</div></th>
<th width="157" bgcolor="#CCCCCC"><div align="left">CERRAR MANTO.</div></th>
</tr>
	
    <?php 

	while ($folio=mysql_fetch_array($consulta))
	{
   	 
    	$num_folio=$folio['folio'];
    $año_folio=$folio['año_folio'];
   $fecha_solicitud=$folio['fecha'];
	$solicita_a=$folio['solicita_a'];
    $falla=$folio['falla_reparar'];
	$id_area=$folio['id_area'];
	$id_usuario=$folio['id_usuario'];
	 
   	  include("../../conexion/enchufarusuarios.php");
   
   $consultau=mysql_query("SELECT * FROM usuarios INNER JOIN area on usuarios.id_area=area.id_area where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);
   
   //usuarios	computo
    $nombres=$usuarios['nombres'];
    $apellidop=$usuarios['apellidop'];
    $apellidom=$usuarios['apellidom'];
    $descripcion=$usuarios['descripcion'];
	 $id_area=$usuarios['id_area'];
	$id_usuario=$usuarios['id_usuario'];
   
   		 $nombre_completo1=$nombres.' '.$apellidop.' '.$apellidom;
				echo '<tr><td>'.$nombre_completo1.'</td>';
				echo '<td>'.$falla.'</td>';
				echo '<td>'.$fecha_solicitud.'</td>';
				echo '<td>'.$num_folio.''.$año_folio.'</td>';
				echo '<td><center><a href="cerrar_manto/buscar_cerrar.php?fol='.$num_folio.'& a='.$año_folio.'& nom='.$nombre_completo1.'"><img src="../imagenes/cerrar_manto.gif" width="30" height="30"/> </a></center></td></tr>';
	}
}
else
		{

			$consulta=mysql_query( "SELECT folio,año_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes  where pendiente=0 and solicita_a<>'cc'",$enchufarsolicitudes);
?><div>

	<table width="680" align="center" class="tablacontenedora">
<tr>
<th width="234" height="32" bgcolor="#CCCCCC"><div align="left">SOLICITANTE</div></th>
<th width="188" bgcolor="#CCCCCC"><div align="left">SOLICITA (FALLA) </div></th>
<th width="79" bgcolor="#CCCCCC"><div align="left">FECHA</div></th>
<th width="79" bgcolor="#CCCCCC"><div align="left">FOLIO</div></th>
<th width="157" bgcolor="#CCCCCC"><div align="left">CERRAR MANTO.</div></th>
</tr>
	
   <?php 

	while ($folio=mysql_fetch_array($consulta))
		{
   	 
			 $num_folio=$folio['folio'];
    $año_folio=$folio['año_folio'];
   $fecha_solicitud=$folio['fecha'];
	$solicita_a=$folio['solicita_a'];
    $falla=$folio['falla_reparar'];
	$id_area=$folio['id_area'];
	$id_usuario=$folio['id_usuario'];
		
		
    	  include("../../conexion/enchufarusuarios.php");
   
   $consultau=mysql_query("SELECT * FROM usuarios INNER JOIN area on usuarios.id_area=area.id_area where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
   $usuarios=mysql_fetch_array($consultau);
   
   //usuarios	computo
    $nombres=$usuarios['nombres'];
    $apellidop=$usuarios['apellidop'];
    $apellidom=$usuarios['apellidom'];
    $descripcion=$usuarios['descripcion'];
	 $id_area=$usuarios['id_area'];
	$id_usuario=$usuarios['id_usuario'];
			$nombre_completo1=$nombres.' '.$apellidop.' '.$apellidom;
				echo '<tr><td>'.$nombre_completo1.'</td>';
				echo '<td>'.$falla.'</td>';
				echo '<td>'.$fecha_solicitud.'</td>';
				echo '<td>'.$num_folio.''.$año_folio.'</td>';
				echo '<td><center><a href="cerrar_manto/buscar_cerrar.php?fol='.$num_folio.'& a='.$año_folio.' & nom='.$nombre_completo1.'"><img src="../imagenes/cerrar_manto.gif" width="30" height="30"/> </a></center></td></tr>';

		}
}

?>
</table><br />
	  </form>
	  
	  <!-- InstanceEndEditable --></div>
<div id="footer">This site is © Copyrighted by Cómputo-Itsva 2007-2008. All Rights Reserved ®</div>
</div>
</body>
<!-- InstanceEnd --></html>
