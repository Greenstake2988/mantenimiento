<div align="center">
<?php
session_start();
include ("../conexion/enchufarsolicitudes.php");
$fol = $_GET["fol"];
$area = $_GET["area"];
	 $consulta=mysql_query( "SELECT folio,anio_folio,fecha,solicita_a,falla_reparar,id_area,id_usuario from solicitudes  where solicita_a='$area' and folio='$fol'",$enchufarsolicitudes);
	 $folio=mysql_fetch_array($consulta);
           $num_folio=$folio['folio'];
           $anio_folio=$folio['anio_folio'];
           $fecha_solicitud=$folio['fecha'];
           $solicita_a=$folio['solicita_a'];
           $falla=$folio['falla_reparar'];
           $id_area=$folio['id_area'];
           $id_usuario=$folio['id_usuario'];
           include ("../conexion/enchufarusuarios.php");
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
	  
     	
	?>
		  
	<table width="490" border="0"class="tabla">
            <tr>
                <td colspan="3">
                    Detalle Solicitud Correctivo
                </td>
            </tr>
            <tr>
              <td><div align="center" class="Estilo2">FOLIO</div></td>
              <td><input name="folio" type="text"  value="<?php echo $num_folio;?>" size="2" readonly="enabled" />
              <input name="anio" type="text"  value="<?php echo $anio_folio;?>" size="2" readonly="enabled" />
              <input name="folio2" type="hidden"  value="<?php echo $num_folio;?>" size="2" />
              <input name="anio2" type="hidden"  value="<?php echo $a&ntilde;o_folio;?>" size="2" /></td>
            </tr>
            <tr>
              <td><div align="center">FECHA</div></td>
              <td><input name="fecha_solicitud" type="text"   value="<?php echo $fecha_solicitud;?>" size="10" readonly="enabled" /></td>
            </tr>
            <tr>
              <td width="200">Recursos Materiales y Servicios </td>
              <td width="48"><input name="solicita_a" type="radio" value="rms" <?php if($_SESSION['sol']=='rms'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?> />
              </td>
              <td width="171">
              <input name="id_area" type="hidden"   value="<?php echo $id_area;?>" size="10" readonly />
              </td>
            </tr>
            <tr>
              <td>Mantenimiento de Equipo </td>
              <td><input name="solicita_a" type="radio" readonly="enabled" value="me" /></td>
              <td><label>
              <input name="id_usuario" type="hidden"   value="<?php echo $id_usuario;?>" size="10" readonly="enabled" />
              </label></td>
            </tr>
            <tr>
              <td>Centro de C&oacute;mputo </td>
              <td><input name="solicita_a" readonly="enabled" type="radio" value="cc" <?php if($_SESSION['sol']=='cc'){echo " checked='checked'";}else{echo "disabled='disabled'";}  ?> /></td>
            </tr>
            <tr>
              <td width="130">&Aacute;rea Solicitante : </td>
              <td width="341">
                <input type="text" name="area" readonly="enabled" size="45" value="<?php echo $descripcion;?>" />
             </td>
            </tr>
            <tr>
              <td>Nombre del Solicitante: </td>
              <td><input name="nombre_completo" type="text" id="nombre_completo" readonly="enabled" value="<?php echo $nombre_completo;?>" size="45" /></td>
            </tr>
            <tr>
                <td colspan="3">
          Descripci&oacute;n del Servicio Solicitado o Falla a Reparar:
          <textarea name="falla" cols="50" rows="5" readonly="enabled"  class="inicial_mayuscula"><?php echo $falla;?></textarea>
                </td>
            </tr>
          
        
</table>
</div>