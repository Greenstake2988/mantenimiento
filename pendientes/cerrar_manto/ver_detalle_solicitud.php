<?php
session_start();
/*header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");*/
?>
<div align="center">
  <?php 
 $folio=$_GET['fol'];
 $anio=$_GET['a'];
include("../../../conexion/enchufarsolicitudes.php");		
if($_SESSION['sol']=='cc')
   {	
        $sql = "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes  where solicita_a='cc' and folio='$folio'";
        $consulta=mysql_query($sql,$enchufarsolicitudes);
        while ($folio=mysql_fetch_array($consulta))
    {
    $num_folio=$folio['folio'];
    $anio_folio=$folio['anio_folio'];
    $fecha_solicitud=$folio['fecha'];
    $solicita_a=$folio['solicita_a'];
    $falla=$folio['falla_reparar'];
    $id_area=$folio['id_area'];
    $id_usuario=$folio['id_usuario'];
    include("../../../conexion/enchufarusuarios.php");
    $consultau=mysql_query("SELECT * FROM usuarios INNER JOIN area on usuarios.id_area=area.id_area where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
    $usuarios=mysql_fetch_array($consultau);
   
   //usuarios	computo
    $nombres=$usuarios['nombres'];
    $apellidop=$usuarios['apellidop'];
    $apellidom=$usuarios['apellidom'];
    $descripcion=$usuarios['descripcion'];
    $id_area=$usuarios['id_area'];
    $id_usuario=$usuarios['id_usuario'];
    $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
     }
    }
 else
    {
         include("../../../conexion/enchufarsolicitudes.php");
        //$sql_rms = "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes where pendiente='0' and solicita_a='rms' and folio='$folio' and anio_folio='$anio'";
        $sql_rms = "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes where solicita_a<>'cc' and folio='$folio'";
        $consulta=mysql_query($sql_rms,$enchufarsolicitudes);
        $folio = mysql_fetch_array($consulta); 							
        $num_folio=$folio['folio'];
        $anio_folio=$folio['anio_folio'];
        $fecha_solicitud=$folio['fecha'];
        $solicita_a=$folio['solicita_a'];
        $falla=$folio['falla_reparar'];
        $id_area=$folio['id_area'];
        $id_usuario=$folio['id_usuario'];
        include("../../../conexion/enchufarusuarios.php");
        $consultau=mysql_query("SELECT * FROM usuarios INNER JOIN area on usuarios.id_area=area.id_area where id_usuario='$id_usuario'",$enchufarusuarios)or die(mysql_error());
        $usuarios=mysql_fetch_array($consultau);

   //usuarios	computo
    $nombres=$usuarios['nombres'];
    $apellidop=$usuarios['apellidop'];
    $apellidom=$usuarios['apellidom'];
    $descripcion=$usuarios['descripcion'];
    $id_area=$usuarios['id_area'];
    $id_usuario=$usuarios['id_usuario'];
    $nombre_completo=$nombres.' '.$apellidop.' '.$apellidom;
								 
								 
								 
		}		
	?>
		  Detalle Solicitud Correctivo </div>
		<table width="490" border="0" align="left" class="tabla">
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center" class="Estilo2">FOLIO</div></td>
              <td><input name="folio" type="text"  value="<?php echo $num_folio;?>" size="2" readonly="true" />
              <input name="anio" type="text"  value="<?php echo $anio_folio;?>" size="2" readonly="true" />
              <input name="folio2" type="hidden"  value="<?php echo $num_folio;?>" size="2" readonly />
              <input name="anio2" type="hidden"  value="<?php echo $anio_folio;?>" size="2" readonly /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center">FECHA</div></td>

              <td><input name="fecha_solicitud" type="text"   value="<?php echo $fecha_solicitud;?>" size="10" readonly="true" /></td>
            </tr>
            <tr>
              <td width="200">Recursos Materiales y Servicios </td>
              <td width="48"><input name="solicita_a" type="radio" value="rms" <?php if($_SESSION['sol']=='rms'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?> /></td>
              <td width="49">&nbsp;</td>
              <td width="171"><label>
              <input name="id_area" type="hidden"   value="<?php echo $id_area;?>" size="10" readonly="true" />
              </label></td>
            </tr>
            <tr>
              <td>Mantenimiento de Equipo </td>
              <td><input name="solicita_a" type="radio" disabled="true" value="me" /></td>
              <td>&nbsp;</td>
              <td><label>
              <input name="id_usuario" type="hidden"   value="<?php echo $id_usuario;?>" size="10" readonly="true" />
              </label></td>
            </tr>
            <tr>
              <td>Centro de C&oacute;mputo </td>
              <td><input name="solicita_a" disabled="true" type="radio" value="cc" <?php if($_SESSION['sol']=='cc'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?> /></td>
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
                <input type="text" name="area" readonly="true" size="45" value="<?php echo $descripcion;?>" />
              </label></td>
            </tr>
            <tr>
              <td>Nombre del Solicitante: </td>
              <td><input name="nombre_completo" type="text" id="nombre_completo" readonly="true" value="<?php echo $nombre_completo;?>" size="45" /></td>
            </tr>
          </table>
          <p>
            <label></label>
          
          Descripci&oacute;n del Servicio Solicitado o Falla a Reparar:
          <p>
            <label>
            <textarea name="falla" cols="50" rows="5" readonly="true"  class="inicial_mayuscula"><?php echo $falla;?></textarea>
            </label>
          </p>
          <p>
            <label></label>
            <label></label>
          </p>
          <p align="center">&nbsp;</p>
          <p align="center">&nbsp; </p>
        </form>