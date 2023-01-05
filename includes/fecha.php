<?php 
function FechaFormateada($fecha)
{
setlocale(LC_TIME,'Spanish');
return $fecha=strftime('%d de %B de %Y',strtotime($fecha));
}


?>