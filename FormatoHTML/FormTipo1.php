<?php
 //session_start();
require("../sesion/proteccion.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head  >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../includes/jquery.js"></script>
<script type="text/javascript" src="../includes/thickbox.js"></script>
<link rel="stylesheet" type="text/css" href="../includes/thickbox.css"/>
<script type="text/javascript">
$(document).ready(function(){
tb_show("","../popup/popup.php?height=420&width=500&modal=true");
});
 
function doPrint(){
document.all.item("noprint").style.visibility='hidden';
window.print();
document.all.item("noprint").style.visibility='visible';
window.location = "../solicitar/solicitud_exitosa.php";
}
 function redirecciona(){
     document.location = "../solicitar/solicitud_exitosa.php";
 }
</script>
</head>

<body>
<center>

  <div align="right">
<?php 
	$folio=$_POST['folio'];
	$anio=$_POST['anio'];
	$fecha_solicitud= $_POST['fecha_solicitud'];
	$solicita_a=$_POST['solicita_a'];
	$marca_x="X";
	$area= $_POST['area'];
	$nombre= $_POST['nombre'];
	$falla= $_POST['falla'];
        include('../../conexion/enchufarusuarios.php');
	$consulta= mysql_query("SELECT id_area,descripcion FROM area where id_area=$area",$enchufarusuarios) or die ('Error en la conexioacute;con  el gestor al leer'); 
        $array_area = mysql_fetch_row($consulta);
        include('../../conexion/enchufarusuarios.php');
	$consulta= mysql_query("SELECT id_usuario,nombres,apellidop,apellidom FROM usuarios where id_usuario=$nombre",$enchufarusuarios) or die ('Error en la conexioacute;con  el gestor al leer');  
        $array_nombre = mysql_fetch_row($consulta);
 
	 $nombres=$array_nombre[1];
	 $apellidop=$array_nombre[2];
	 $apellidom=$array_nombre[3];
	 $nom_completo=$nombres.' '.$apellidop.' '.$apellidom;
	 
	 include("../../conexion/enchufarsolicitudes.php");
//compruebo si el equipo no ha sido dado de alta antes

if($_SESSION['sol']=='cc'){
  $validar="select  * from solicitudes where  folio='$folio'";
  $resultado= mysql_query($validar,$enchufarsolicitudes);
     if (mysql_num_rows($resultado)!=0)
          {
            echo"<br>";
            echo"<br>";
            echo"<br>";
            echo"<br>";
            echo "<center>Este FOLIO Ya Existe, &iexcl;Intente de Nuevo!</center><br>";
            echo'<a href="../solicitar/form_solicita_manto.php"><center>volver</center></a>';
           }
else
	{
	$result= mysql_query("insert into solicitudes (folio,anio_folio,fecha,solicita_a,id_area,id_usuario,falla_reparar) values('$folio','$anio','$fecha_solicitud','$solicita_a','$area','$nombre','$falla')",$enchufarsolicitudes) or die (mysql_error($enchufarsolicitudes));

?>
		<table>
                 <tr>
                 <td id="noprint"> 
                 <input name="imprimir" type="button" onClick="doPrint();" value="Imprimir"></input>
                 <input name="cerrar" type="button" onClick="redirecciona();" value="Cerrar"></input>
                 </td>
                 </tr>
		</table>
<?php
  	}
 }
//comprobando para recursos materiales
else{
 		if($_SESSION['sol']=='rms'){
 
 			$validar="select  * from solicitudes where  folio='$folio' and solicita_a<>'cc'";
			$resultado= mysql_query($validar,$enchufarsolicitudes);
				if (mysql_num_rows($resultado)!=0)
                                    {
                                    echo"<br>";
                                    echo"<br>";
                                    echo"<br>";
                                    echo"<br>";
                                    echo "<center>Lo Siento Este FOLIO Ya Existe,�Intente de Nuevo!</center><br>";
                                    echo'<a href="../solicitar/form_solicita_manto.php"><center>volver</center></a>';
                                    }
			else
				{
					$result= mysql_query("insert into solicitudes (folio,anio_folio,fecha,solicita_a,id_area,id_usuario,falla_reparar) values('$folio','$anio','$fecha_solicitud','$solicita_a','$area','$nombre','$falla')",$enchufarsolicitudes) or die (mysql_error($enchufarsolicitudes));
?>
                                        <table>
                                        <tr>
                                        <td id="noprint"> 
                                        <input name="imprimir" type="button" onClick="doPrint();" value="Imprimir"></input>
                                        <input name="cerrar" type="button" onClick="redirecciona();" value="Cerrar"></input>
                                        </td>
                                        </tr>
                                        </table>
<?php

 				} 
 
 		}
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
       <div style="float: right; margin-top: 18px; padding-right: 5px;">Folio: <label class="subnegritas"><?php printf("%'03s\n", $folio);?></label>
          <span class="subnegritas"><?php printf("%'03s\n", $anio);?></span> </div>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
          
    </td>
    </tr>
  <tr>
    <td class="tabla" align="left"><p><br />
&nbsp;&Aacute;rea Solicitante: <?php echo utf8_encode($array_area[1]);?></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><br />
	<table border="0" cellspacing="0" cellpadding="0" width="900" class="tabla">
      <tr>
        <td valign="bottom" class="celdasbajo" align="left"><p><strong>&nbsp;</strong></p>
          <p>&nbsp;Nombre y Firma del Solicitante: 
                     <?php echo $nom_completo;?></p></td>
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
  <tr><td>
  <table border="0" align="center">
  <tr>
    <td align="center">
      <img src="../../imagenes/logoMR200x200.jpg" width="60">
    </td>
    <td>
      <img src="../../imagenes/plastico.png" width="60">
    </td>
    <td align="center">
      <img src="../../imagenes/discriminacion.png" width="60">
    </td>
    <td>
      <img src="../../imagenes/9001.jpeg" width="50">
    </td>
    <td>
      <img src="../../imagenes/14001.jpeg" width="50">
    </td>
    <td>
      <img src="../../imagenes/50001.jpeg" width="50">   
    </td>
    <td>
      <img src="../../imagenes/45001.jpeg" width="50">
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
</center>
</body>
</html>
