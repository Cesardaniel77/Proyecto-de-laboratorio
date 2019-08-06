<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Incripciones en m&iacute blog</title>
  </head>
  <body>
    <?php
    include 'conexion.php';
    $sql="select * from datos";
    $regresar=mysql_query($sql);
     ?>
     <div>
       <table border="1">
         <thead>
           <tr>
             <th>Nombre</th>
             <th>Email</th>
             <th>Mensaje</th>
             <th>comentario</th>
             <th>inscripcion</th>
             
         </tr>
    </thead>
    <tbody>
      <?php while ($filas=mysql_fetch_assoc($regresar)){
         ?>
      <tr>
             <td><?php echo $filas['nombre'] ?></td>
             <td><?php echo $filas['email'] ?></td>
             <td><?php echo $filas['mensaje'] ?></td>
             <td><?php echo $filas['inscripcion'] ?></td>
             <td><?php echo $filas['comentario'] ?></td>
         
        </td> 
       </tr>
     <?php } ?> 
 </table>
   </div>

 </tbody>
    
  </body>
</html>