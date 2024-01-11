<?php
// Inicializar la sesión.
session_start();
 
// Verifique si el usuario ha iniciado sesión, si no, rediríjalo a la página de inicio de sesión.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<style>
    
    h1{
        font-size: 2em;
        font-family: "Times New Roman", Times, serif;
    }

    .caja{
        width: 1102px;
        height: 300px;
        background: #FAD7A0;
        color: black;
        display: flex;
        align-items: flex-end;
        margin-left: 355px;
    }   

    .profileButtons{
        width: 699px;
        height: 256px;
        background: #AED6F1;
        border-color: black;
        border-style: double;
        border-width: 10px;
    }

    .gestiones{
        width: 699px;
        height: 256px;
        margin-left: 100px;
        background: #AED6F1;
        border-style: double;
        border-width: 10px;
    }

    .fotoDatos {
        width: 109px;
        margin-top: -76px;
        margin-left: 232px;
        height: 83px;
    }

    .fotoOpciones{
        width: 55px;
        margin-top: -58px;
        margin-left: 341px;
        height: 49px;
    }

    .welcome{
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		background-color: black;
		color: white;
		text-align: left;
	}
	

</style>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bienvenido/a </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ 
            font: 14px sans-serif; 
            text-align: center; 
        }
    </style>
</head>
<body style="background-color: #FAD7A0">
    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido/a .</h1>
    <p>
        
        <div class="caja">
            <div class="profileButtons"><br>
                <u><h3>Mi perfil</h3></u>
                <img class="fotoDatos" src="../images/datos.png">
                <a href="reset-password.php" class="btn btn-warning">Restablecer su contraseña</a> &nbsp
                <div style="height: 15px"></div>
                    <a href="logout.php" class="btn btn-warning">Salir de su cuenta</a> &nbsp
            </div>
            <div class="gestiones"><br>
                <u><h3>Mis gestiones</h3></u>
                <img class="fotoOpciones" src="../images/opciones.png">
                <a button="submit" href="/../indexPatients.php" class="btn btn-warning">Gestionar pacientes</a> &nbsp
                <div style="height: 15px"></div>
                <a button="submit" href="/../updateBlog.php" class="btn btn-warning">Gestionar blog</a> &nbsp
            </div>
        </div>   
    </p>
</body>
    <footer>
        <div class="welcome">
        <h6> &nbsp © 2022 Cortex Neurorrehabilitación. CORTEX. </h6>
        </div>
    </footer>
</html>