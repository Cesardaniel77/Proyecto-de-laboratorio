<?php
$server="localhost";
$user="root";
$password="123456";
$db="registro_inscripciones_web";
$conexion=mysql_connect($server,$user,$password);
if(!$conexion){
echo "no se pudo conectar";
}else{
echo "conectado correctamente";
}
?>
