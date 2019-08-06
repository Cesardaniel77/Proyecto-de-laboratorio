<?php

include("conexion4.php");
$con=mysql_connect($server,$user,$password)or die("No se pudo conectar con el servidor");
mysql_select_db($db,$conexion)or die("problemas en base de datos");

$reg=mysql_query("SELECT email FROM datos WHERE nombre = '$_POST[trt]'",$con);

if($re=mysql_fetch_array($reg))
{
mysql_query("DELETE FROM datos WHERE nombre='$_POST[trt]'",$con);
echo "datos eliminados";
}else{
echo "datos no han sido eliminados";
}
?>

