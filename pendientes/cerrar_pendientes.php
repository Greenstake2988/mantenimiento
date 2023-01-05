<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.:: Sistema Mantenimiento (ISO) ::.</title>
<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
<link href="../Templates/estilos.css" rel="stylesheet" type="text/css" />
<link href="../Templates/estilos_css.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.textpie {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
	color: #999999;
}
.textoarriba {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
	color: #666666;
}
body {
	background-color: #CCCCCC;
}
a:link {
	color: #990000;
}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
  <table width="1000" border="0" align="center" bordercolor="#333333" class="tablacontenedora">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF">
        <!-- InstanceBeginEditable name="EditRegion3" -->
	 
	 <div align="right"><a href="../menuadmin.php"><img src="../imagenes/inicio.png" border="0" /></a></div>
         <div align="center" class="caption">Solicitud De Mantenimientos Pendientes </div>
	 <form name="pendientes" method="post" action="">
  
    <?php

        //header('refresh:60;url=cerrar_pendientes.php');
        include("../../conexion/enchufarsolicitudes.php");
		//include("../conexion/enchufarusuarios.php");
	
if($_SESSION['sol']=='cc')
		{	
		$consulta=mysql_query( "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes   where pendiente=0 and solicita_a='cc'",$enchufarsolicitudes);
?>

             <table width="800" align="center" class="tabla">
		<tr>
                    <th width="200"><div align="left" class="caption">SOLICITANTE</div></th>
                        <th width="300"><div align="left" class="caption">SOLICITA (FALLA) </div></th>
                        <th width="100"><div align="left" class="caption">FECHA</div></th>
                        <th width="100"><div align="left" class="caption">FOLIO</div></th>
                        <th width="100"><div align="left" class="caption">CERRAR MANTO.</div></th>
		</tr>

    <?php 

	while ($folio=mysql_fetch_array($consulta))
	{
   	 
    $num_folio=$folio['folio'];
    $anio_folio=$folio['anio_folio'];
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
	?>	 
                <tr>
                <td><?php echo $nombre_completo1;?></td>
                <td><?php echo $falla;?></td>
                <td><?php echo $fecha_solicitud;?></td>
                <td><?php echo $num_folio.''.$anio_folio;?></td>
                <td><center><a href="cerrar_manto/buscar_cerrar.php?fol=<?php echo $num_folio.'&a='.$anio_folio.'&nom='.$nombre_completo1;?>"><img src="../imagenes/cerrar_manto.gif" width="30" height="30"/> </a></center>
                </td>
                </tr>
                <?php
	}
        ?>
        </table>
        <?php
}
else
    {
    $sql_consulta = "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes  where pendiente='0' and solicita_a<>'cc'";
    $consulta=mysql_query($sql_consulta,$enchufarsolicitudes);
?>
<table width="800" align="center">
    <tr>
        <th bgcolor="#CCCCCC"><div align="left" class="caption">SOLICITANTE</div></th>
        <th bgcolor="#CCCCCC"><div align="left">SOLICITA (FALLA) </div></th>
        <th bgcolor="#CCCCCC"><div align="left">FECHA</div></th>
        <th bgcolor="#CCCCCC"><div align="left">FOLIO</div></th>
        <th bgcolor="#CCCCCC"><div align="left">CERRAR MANTO.</div></th>
    </tr>
	
   <?php 
	while ($folio=mysql_fetch_array($consulta))
		{
                    $num_folio=$folio['folio'];
                    $anio_folio=$folio['anio_folio'];
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
                    ?>
                    <tr>
                        <td><?php echo $nombre_completo1;?></td>
                        <td><?php echo $falla;?></td>
                        <td><?php echo $fecha_solicitud;?></td>
                        <td><?php echo $num_folio.''.$anio_folio;?></td>
                        <td><center><a href="cerrar_manto/buscar_cerrar.php?fol=<?php echo $num_folio.'&a='.$anio_folio.'&nom='.urlencode($nombre_completo1);?>"><img src="../imagenes/cerrar_manto.gif" width="30" height="30"/> </a></center></td>
                    </tr>
                
                        
<?php
		}
?>
</table>
<?php
}

?>
	  </form>
	  
	  <!-- InstanceEndEditable -->
    </td>
  </tr>
  <tr>
    <td bgcolor="#333333" class="textpie"><div align="center">Instituto Tecnol&oacute;gico Superior de Valladolid<br />
      Km 3.5, Carretera Valladolid-Tizim&iacute;n, Tablaje Catastral No. 8850<br />
    C.P. 97780, Tel.. 9858566300, Valladolid, Yucat&aacute;n. </div></td>
</table>
</body>
<!-- InstanceEnd --></html>
