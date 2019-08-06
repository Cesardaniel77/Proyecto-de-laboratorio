<?php
$conectar=mysql_connect('localhost','root','123456');

if(!$conectar){
echo "No se pudo conectar con el servidor";

}else{
$base=mysql_select_db('registro_inscripciones_web');
if(!$base){

echo "No se encontro la base  de datos";

    }
}
$db='registro_inscripciones_web';
?>