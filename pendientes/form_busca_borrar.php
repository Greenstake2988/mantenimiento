<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla2011.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.:: Sistema Mantenimiento (ISO) ::.</title>
<script language="javascript">

function Integer(f)
{
 var charCode
 if (navigator.appName == "Netscape")
 		charCode = f.which 
 else
 		charCode = f.keyCode 
		status = charCode 
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 {
 		alert("Esto no es un Número de Folio!!")
		return false
 }
 return true
}

function checkFields() {
missinginfo = "";
if (document.modificafolio.buscar_folio.value == "") {
missinginfo += "\n     -  Número de Folio";
}
if (document.modificafolio.buscar_ano.value == "") {
missinginfo += "\n     -  anio";
}
if (missinginfo != "") {
missinginfo ="_____________________________\n" +
"Para Buscar El Número de Folio Debes Llenar los campos:\n" +
missinginfo + "\n_____________________________" +
"\n¡Por favor pulsa enter, rellena los datos e intenta de nuevo!";
alert(missinginfo);
return false;
}
else return true;
}
</script>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />

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
<table width="1000" border="0" align="center" bordercolor="#333333">
  <tr>
    <td bgcolor="#FF9900"><div align="right"><img src="../../imagenes/imgprin.png" width="1000" height="200" /></div></td>
  </tr>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="EditRegion3" -->
       <form name="modificafolio" action="traer_borrar.php" method="post" onsubmit="return checkFields(modificafolio);">
	   <div>
	     <div align="right"><a href="../menuadmin.php"><img src="../imagenes/inicio.png" border="0" /></a></div>
	   </div>
        
          <label></label></p>
        <table width="600" height="33" border="0" align="center" class="fondotabla" >
          <tr>
            <td width="125" rowspan="2">Ingrese Folio:</td>
            <td width="40"><label></label>
              <div align="center">No.  </div></td>
            <td width="47"><p align="center">A&ntilde;o(/08)</p>            </td>
            <td width="360" rowspan="3"><label>
              <button type="submit" name="Submit" value="Enviar" onclick="valido()";>
			  <img src="../imagenes/buscar.png" width="32" height="32" title="Buscar Folio"/>			  </button>
            </label></td>
          </tr>
          <tr>
            <td><input name="buscar_folio" type="text" size="4" maxlength="4" onKeyPress="return Integer(event)" /></td>
            <td><div align="center">
              <input name="buscar_ano" type="text" size="3" maxlength="3" value="<?php $anio=date('/y');echo $anio;?>" />
            </div></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
	  </form>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td bgcolor="#333333" class="textpie"><div align="center">Instituto Tecnol&oacute;gico Superior de Valladolid<br />
      Km 3.5, Carretera Valladolid-Tizim&iacute;n, Tablaje Catastral No. 8850<br />
    C.P. 97780, Tel.. 9858566300, Valladolid, Yucat&aacute;n. </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="textpie"><div align="center">
      <table width="100%%" border="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
