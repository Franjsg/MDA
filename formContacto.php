<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "contacto_db";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if(!$enlace){
   echo "Error en la conexión con el servidor"; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto:</title>
</head>


<body>
<div class="contactForm">
    <form>
        <input type="text" name="nombre" class="input" placeholder="Nombre"
        required autofocus>
        <input type="text" name="apellidos" class="input" placeholder="Apellidos"
        required>
        <input type="email" name="email" class="input" placeholder="Email" required>
        <input type="text" name="subject" class="input" placeholder="subject" 
        required>

        <div class="btn_form">
            <input type="submit" name="enviar" class="btn_submit" value="Enviar">
        </div>
       </form>
     </div>
   </body>
  </html>

<?php
  if (isset($_POST['enviar'])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    /*Id*/

    $insertarDatos = "INSERT INTO contacto VALUES ('$id',
                                                '$nombre', 
                                                '$apellidos',
                                                '$email',
                                                '$subject')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos, );

    if(!$ejecutarInsertar){
        echo"Error en la linea de sql";
    }
}
?>
