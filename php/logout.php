<?php
// Inicializando la sesión.
session_start();
 
//Descompone todas las variables de sesión.
$_SESSION = array();
 
// Destruye la sesión.
session_destroy();
 
// Redirige a la página de inicio de sesión.
header("location: login.php");
exit;
?>