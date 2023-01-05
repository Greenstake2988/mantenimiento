<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/intranet_sin_menu.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.:: Sistema Mantenimiento (ISO) ::.</title>
<script language="JavaScript" type="text/javascript" src="ajaxlib.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../../calendario/sistema.css" title="chocolate" />
<script type="text/javascript" src="../../calendario/calendar.js"></script>
<script type="text/javascript" src="../../calendario/calendar-sp.js"></script>
<script type="text/javascript" src="../../calendario/calendar-setup.js"></script>
<script type="text/javascript" src="../../editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme: "advanced",
	editor_selector : "siEditor",
	language : "es",
	plugins: "table,paste,media,visualchars,nonbreaking,xhtmlxtras,filemanager,layer",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,blockquote,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left"
	
		});
</script>

<script language="javascript"> 

//Su explorador no soporta java o lo tiene deshabilitado; esta pagina necesita javascript para funcionar correctamente<!-- 
//Copyright © McAnam.com 
             
function abrir(direccion, pantallacompleta, herramientas, direcciones, estado, barramenu, barrascroll, cambiatamano, ancho, alto, izquierda, arriba, sustituir){ 
    var opciones = "fullscreen=" + pantallacompleta + 
                 ",toolbar=" + herramientas + 
                 ",location=" + direcciones + 
                 ",status=" + estado + 
                 ",menubar=" + barramenu + 
                 ",scrollbars=" + barrascroll + 
                 ",resizable=" + cambiatamano + 
                 ",width=" + ancho + 
                 ",height=" + alto + 
                 ",left=" + izquierda + 
                 ",top=" + arriba; 
    var ventana = window.open(direccion,"venta",opciones,sustituir); 

}                     
//-->     
</script> 
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<script type="text/javascript" src="../../includes/dtree.js"></script>
<link href="../../Templates/estilos.css" rel="stylesheet" type="text/css" />
<link href="../../Templates/dtree.css" rel="stylesheet" type="text/css" />
<link href="../../Templates/estilos_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="maqueta">
<div id="header"><img src="../../imagenes/encabezado.gif" alt="Encabezado" longdesc="Este es la imagen de encabezado de la pagina" /></div>
<div id="contenido_sin_menu"><!-- InstanceBeginEditable name="contenido" -->
       <form  method="POST" name="formcontenido" target="_blank"  >
	   <?php
$folio=$_GET['fol'];
$año=$_GET['a'];
$nom=$_GET['nom'];

?>
           
            <table width="120" height="28" border="0">
              <tr>
                <td width="110"><input type="button"  onclick="abrir('ver_detalle_solicitud.php?fol=<?php echo $folio;?>& a=<?php echo $año;?>',0,0,0,0,0,0,0,500,500,000,000,0);" value="Ver Detalle Solicitud" title="Haga Click Para Ve Detalle Solicitud" /></td>
			  </tr>
            </table>
            <div align="right"><a href="../../menuadmin.php"><img src="../../imagenes/inicio.png" border="0" title="Menu Principal" /></a></div>
           </form> 
           
        <form  name="fcalen" onsubmit="return checkFields(fcalen);" method="post" action="FormatoHTML/Form_cerrar_manto.php" >
          <table width="687" border="0" class="tabla">
            <tr>
              <td width="155">&nbsp;</td>
              <td width="114"><label></label></td>
              <td width="96">&nbsp;</td>
              <td width="300">Folio
			  <?php if($_SESSION['sol']=='cc'){?>
                <input name="folio" type="text"  value="<?php echo $folio;?>" size="2" readonly="" />
				<input name="ano" type="text"  value="<?php echo $año;?>" size="2" readonly="" />
				<?php } else{ ?>
				<input name="folio" type="hidden"  value="<?php echo $folio;?>" size="2"  />
				<input name="folio_r" type="text"  value="<?php include('../../../conexion/enchufarsolicitudes.php'); $consulta= mysql_query("SELECT max(folio_r+1) FROM orden_mantenimiento",$enchufarsolicitudes) 
or die ('Error en la conexioacute;con  el gestor al leer');
while($folio_r = mysql_fetch_row($consulta) ){
  $c_folio_r=$folio_r[0];
  echo $c_folio_r;
  $año=date('/y');
   } ?>" size="2" />
				<input name="ano_r" type="text"  value="<?php echo $año;?>" size="2" readonly="" />
				<input name="ano" type="hidden"  value="<?php echo $año;?>" size="2" readonly="" />
				<?php }?>
	<?php 
		//codigo para consecutivo de cierre de orden_mantenimiento de recursos materiales
		
			
			
		
   
?>
				
				
				</td>
            </tr>
            <tr>
              <td>Mantenimiento</td>
              <td>Interno
                <input name="t_manto" type="radio" value="int" checked="checked" onclick="document.fcalen.proveedor.style.display='none';document.fcalen.nombre.style.display='inline';" /></td>
              <td><label> Externo
                <input name="t_manto" type="radio" value="ext" onclick="document.fcalen.proveedor.style.display='inline';document.fcalen.nombre.style.display='none';"/>
                
              </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Tipo de Servicio </td>
              <td><label>
              <?php
			    if($_SESSION['sol']=='cc')
				{
			   ?>
                    <select name="t_servicio" id="t_servicio">
                       <option>Inform&aacute;tico</option>
                    </select>
                <?php 
				 }
				 else{
				?>
                <input name="t_servicio" id="t_servicio" type="text" style="display:inline" />
             
              <?php
				      }
				 ?>   
                
                
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Asignado a: </td>
              <td colspan="3"><?php 
			include('../../../conexion/enchufarusuarios.php');
			
if($_SESSION['sol']=='cc')
    {

		$consulta= mysql_query("SELECT id_usuario,nombres,apellidop,apellidom FROM usuarios where id_area=1",$enchufarusuarios) 
or die ('Error en la conexioacute;con  el gestor al leer');  
 echo '<select name= "nombre">';
       while( $array_nombre = mysql_fetch_row($consulta) )
	       {
      	     echo '<option value ="'; echo $array_nombre[0]; echo '">'; echo $array_nombre[1].' '.$array_nombre[2].' '.$array_nombre[3]; echo'</option>';
           }
	echo '</select>';	
 }
	else
 		{
	
			$consulta= mysql_query("SELECT id_usuario,nombres,apellidop,apellidom FROM usuarios where id_area=10",$enchufarusuarios) 
or die ('Error en la conexioacute;con  el gestor al leer');  
 echo '<select name= "nombre">';
 			while( $array_nombre = mysql_fetch_row($consulta) )
				{
 
	 				echo '<option value ="'; echo $array_nombre[0]; echo '">'; echo $array_nombre[1].' '.$array_nombre[2].' '.$array_nombre[3]; echo'</option>';
    			}
	echo '</select>';
	
     }
	
	  
?><input name="proveedor" type="text" style="display:none" /></td>
            </tr>
          </table>
		  <br />
          <table width="687" border="0" class="tabla">
            <tr>
              <td width="68">Fecha de Realizaci&oacute;n:</td>
              <td width="570"><input type="text" name="fecha_realizacion" id="fecha_inicial" size="15" readonly="true" value="<?php echo date('Y/m/d');?>" />  <img src="../../imagenes/picker.gif" alt="Date picker" width="17" height="15" longdesc="Selector de fecha"  name="picker" id="picker" style="cursor: pointer; border: 1px solid brown;" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />
	  <script type="text/javascript">
         	Calendar.setup({
       		inputField     :    "fecha_inicial",     // id of the input field
        	ifFormat       :    "%Y/%m/%d",      // format of the input field
        	button         :    "picker",  // trigger for the calendar (button ID)
        	align          :    "Tl",           // alignment (defaults to "Bl")
        	weekNumbers    :    false,
			singleClick    :    true
    						});
			</script></td>
            </tr>
            <tr>
              <td>Trabajo realizado: </td>
              <td><p>
                  <label>
                  <textarea name="t_realizado" cols="50" rows="5"   class="siEditor" id="t_realizado"><?php echo $falla;?></textarea>
                  </label>
              </p></td>
            </tr>
            <tr>
              <td>Materiales Utilizados </td>
              <td><p>
                  <textarea name="m_utilizados" cols="50" rows="5"  class="siEditor" id="m_utilizados"><?php echo $falla;?></textarea>
              </p></td>
            </tr>
            <tr>
              <td> <input type="hidden" name="verificado_por" value="<?php echo $nom;?>" /></td>
              <td><div align="center">
                <input type="submit" onclick="return confirmar('Esta Seguro de Guardar Esta Solicitud de Mantenimiento');" name="Submit" value="Enviar">
                <input type="reset"  name="Submit2" value="Limpiar">
              </div></td>
            </tr>
          </table>
       </form>
       <br />
      <!-- InstanceEndEditable --></div>
<div id="footer">This site is © Copyrighted by Cómputo-Itsva 2007-2008. All Rights Reserved ®</div>
</div>
</body>
<!-- InstanceEnd --></html>
