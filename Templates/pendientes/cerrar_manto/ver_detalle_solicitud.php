<?php
session_start();
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
?>
<form  name="form1" method="POST" action="" >
		<div align="center">
		  <?php 
		$folio=$_GET['fol'];
        $año=$_GET['a'];
		include("../../conexion/enchufarsolicitudes.php");
		include("../../conexion/enchufarusuarios.php");
		
if($_SESSION['sol']=='cc')
       {	
		$consulta=mysql_query( "select folio,año_folio,fecha,falla_reparar,nombres,apellidop,apellidom,descripcion,area.id_area,usuarios.id_usuario from mantenimiento_iso.solicitudes inner join usuarios.usuarios ON mantenimiento_iso.solicitudes.Id_usuario=usuarios.usuarios.id_usuario inner join usuarios.area ON mantenimiento_iso.solicitudes.Id_area=usuarios.area.id_area where folio=$folio and año_folio='$año' and solicita_a='cc' ",$enchufarsolicitudes);
	
			if (mysql_num_rows($consulta)=="")
					{
						header('refresh: 2; url=form_busca_modificar.php');
						echo "<center>No Se ha encontrado el número de Folio</center>"; exit();
					}
							else 
								{
									$folio = mysql_fetch_array($consulta);
									$num_folio=$folio[0];
									$año_folio=$folio[1];
									$fecha_solicitud=$folio[2];
									$falla=$folio[3];
									$nombres=$folio[4];
									$apellidop=$folio[5];
									$apellidom=$folio[6];
									$descripcion=$folio[7];
									$id_area=$folio[8];
									$id_usuario=$folio[9];
								   $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
								 }
 		}
 else
 		{
 
 			$consulta=mysql_query( "select folio,año_folio,fecha,falla_reparar,nombres,apellidop,apellidom,descripcion,area.id_area,usuarios.id_usuario from mantenimiento_iso.solicitudes inner join usuarios.usuarios ON mantenimiento_iso.solicitudes.Id_usuario=usuarios.usuarios.id_usuario inner join usuarios.area ON mantenimiento_iso.solicitudes.Id_area=usuarios.area.id_area where folio=$folio and año_folio='$año' and solicita_a<>'cc' ",$enchufarsolicitudes);
	
				if (mysql_num_rows($consulta)=="")
					{
						header('refresh: 2; url=form_busca_modificar.php');
						echo "<center>No Se ha encontrado el número de Folio</center>"; exit();
					}
							else 
								{
									$folio = mysql_fetch_array($consulta);
									$num_folio=$folio[0];
									$año_folio=$folio[1];
									$fecha_solicitud=$folio[2];
									$falla=$folio[3];
									$nombres=$folio[4];
									$apellidop=$folio[5];
									$apellidom=$folio[6];
									$descripcion=$folio[7];
									$id_area=$folio[8];
									$id_usuario=$folio[9];
								   $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
								 
								 
								 }
		}		
	?>
		  Detalle Solicitud Correctivo </div>
		<table width="490" border="0" align="left" class="tabla">
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center" class="Estilo2">FOLIO</div></td>
              <td><input name="folio" type="text"  value="<?php echo $num_folio;?>" size="2" disabled="disabled" />
              <input name="año" type="text"  value="<?php echo $año_folio;?>" size="2" disabled="disabled" />
              <input name="folio2" type="hidden"  value="<?php echo $num_folio;?>" size="2" readonly="" />
              <input name="año2" type="hidden"  value="<?php echo $a&ntilde;o_folio;?>" size="2" readonly="" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center">FECHA</div></td>

              <td><input name="fecha_solicitud" type="text"   value="<?php echo $fecha_solicitud;?>" size="10" disabled="disabled" /></td>
            </tr>
            <tr>
              <td width="200">Recursos Materiales y Servicios </td>
              <td width="48"><input name="solicita_a" type="radio" value="rms" <?php if($_SESSION['sol']=='rms'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?> /></td>
              <td width="49">&nbsp;</td>
              <td width="171"><label>
              <input name="id_area" type="hidden"   value="<?php echo $id_area;?>" size="10" readonly="" />
              </label></td>
            </tr>
            <tr>
              <td>Mantenimiento de Equipo </td>
              <td><input name="solicita_a" type="radio" disabled="disabled" value="me" /></td>
              <td>&nbsp;</td>
              <td><label>
              <input name="id_usuario" type="hidden"   value="<?php echo $id_usuario;?>" size="10" readonly="" />
              </label></td>
            </tr>
            <tr>
              <td>Centro de C&oacute;mputo </td>
              <td><input name="solicita_a" disabled="disabled" type="radio" value="cc" <?php if($_SESSION['sol']=='cc'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?> /></td>
              <td>&nbsp;</td>
              <td><label></label></td>
            </tr>
  </table>
          <p align="center">&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <table width="491" border="0" class="tabla">
            <tr>
              <td width="130">&Aacute;rea Solicitante : </td>
              <td width="341"><label>
                <input type="text" name="area" disabled="disabled" size="45" value="<?php echo $descripcion;?>" />
              </label></td>
            </tr>
            <tr>
              <td>Nombre del Solicitante: </td>
              <td><input name="nombre_completo" type="text" id="nombre_completo" disabled="disabled" value="<?php echo $nombre_completo;?>" size="45" /></td>
            </tr>
          </table>
          <p>
            <label></label>
          
          Descripci&oacute;n del Servicio Solicitado o Falla a Reparar:
          <p>
            <label>
            <textarea name="falla" cols="50" rows="5" disabled="disabled"  class="inicial_mayuscula"><?php echo $falla;?></textarea>
            </label>
          </p>
          <p>
            <label></label>
            <label></label>
          </p>
          <p align="center">&nbsp;</p>
          <p align="center">&nbsp; </p>
        </form>