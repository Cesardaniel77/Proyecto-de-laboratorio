<!DOCTYPE HTML>
<html>
<head>

</head>
<body>

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
//Recuperar variables
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $mensaje=$_POST['mensaje'];
    $comentario=$_POST['comentario'];
     $inscripcion=$_POST['inscripcion'];



//sentencia sql

$sql="INSERT INTO datos VALUES('$nombre',
                               '$correo',
                                '$mensaje',
                                 '$inscripcion',
                                 '$comentario'

                                 )";

//Ejecutamos la sentencia sql
$ejecutar=mysql_query($sql);
//verificamos la sentencia sql

if(!$ejecutar){
echo "hubo algun error";
}else{

echo"Datos guardados correctamente";

}


?>

<?php

$nombreErr = $correolErr = $genderErr = $mensajeErr = "";
$nombre = $correo = $mensaje = $comentario = $inscripcion = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nombreErr = "Este campo no puede ser null";
  } else {
    $nombre = test_input($_POST["nombre"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
      $nombreErr = "r"; 
    }
  }

  if (empty($_POST["correo"])) {
    $correoErr = "El correo electonico es necesario";
  } else {
    $correo = test_input($_POST["correo"]);

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $correoErr = "El formato es invalido";
    }
  }

  //corregido
  if (empty($_POST["mensaje"])) {
    $mensaje = "";
  } else {
    $mensaje = test_input($_POST["mensaje"]);
  }

  if (empty($_POST["inscripcion"])) {
    $inscripcionErr = "Es necesario especificar el tipo de susripcion, teniendo en cuenta los terminos y condiciones de la misma";
  } else {
    $inscripcion = test_input($_POST["inscripcion"]);

    }
  }

  if (empty($_POST["comentario"])) {
    $comentario = "";
  } else {
    $comentario = test_input($_POST["comentario"]);
  }

  if (empty($_POST["inscripcion"])) {
    $inscripcionErr = "Inscripcion";
  } else {
    $inscripcion = test_input($_POST["inscripcion"]);
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Formulario para verifcacion de usuarios</h2>
<p><span class="error">Se neceitan estos datos para la inscripcion</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
  <span class="error">* <?php echo $nombreErr;?></span>
  <br><br>
  E-mail: <input type="text" name="correo" value="<?php echo $correo;?>">
  <span class="error">* <?php echo $correoErr;?></span>
  <br><br>
  Mensaje: <input type="text" name="mensaje" value="<?php echo $mensaje;?>">
  <span class="error"><?php echo $mensajeErr;?></span>
  <br><br>
  Comentario: <textarea name="comentario" rows="5" cols="40"><?php echo $comentario;?></textarea>
  <br><br>
  Tipo inscripcion:
  <input type="radio" name="inscripcion" <?php if (isset($inscripcion) && $inscripcion=="gratis") echo "checked";?> value="gratis">Gratis
  <input type="radio" name="inscripcion" <?php if (isset($inscripcion) && $inscripcion=="basico") echo "checked";?> value="basico">Basico
  <input type="radio" name="inscripcion" <?php if (isset($inscripcion) && $insripcion=="premium") echo "checked";?> value="premium">Premium
  <span class="error">* <?php echo $inscripcionErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Enviar a la base de datos">
</form>

<?php
echo "<h2>Datos ingresados:</h2>";

echo $nombre;
echo "<br>";
echo $correo;
echo "<br>";
echo $mensaje;
echo "<br>";
echo $comentario;
echo "<br>";
echo $inscripcion;
?>
<br/>
<?php
include('table.php');

?>

<p>Boton eliminar</p>
<?php
include ('btneliminar.php')
?>


</body>
</html>

