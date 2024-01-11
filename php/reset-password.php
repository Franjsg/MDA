<?php
// Inicializar la sesión.
session_start();
 
// Comprueba si el usuario ha iniciado sesión; de lo contrario, le lleva a la página de inicio de sesión.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Incluir archivo de configuración.
require_once "config.php";
 
// Definir variables e inicializar con valores vacíos.
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Procesamiento de datos del formulario cuando se envía el formulario.
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar nueva contraseña.
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Por favor introduce la nueva contraseña.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "La contraseña debe tener al menos 6 caracteres.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validar confirmar contraseña.
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "La contraseña no coinciden.";
        }
    }
        
    // Verificar los errores de entrada antes de actualizar la base de datos.
    if(empty($new_password_err) && empty($confirm_password_err)){

        // Preparar una declaración de actualización.
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Vincular variables a la declaración preparada como parámetros.
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Establecer parámetros.
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Intento de ejecutar la declaración preparada.
            if(mysqli_stmt_execute($stmt)){

                // Contraseña actualizada exitosamente. Cerrar la sesión y redirigir a la página de inicio de sesión.
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Cerrar declaración.
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerrar conexión.
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Restablecer la contraseña </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #fondo {
            width:1020px;
            text-align:center;
            margin:0 auto;
            padding:0px;
        }

        body{
            text-align:center;
            width:100%;
            margin:0 auto;
            padding:0px;
            font-family:verdana;
            background-color:#cccccc;
            background: url(../images/fondo.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            -ms-background-size: cover;
            background-size: cover;
        }
        .wrapper{ 
            width: 520px;
            height: 621px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border: 2px solid black;
            margin-left: 300px;
            margin-top: 149px;
            margin-left: 234px;
            margin-right: 303px;
            background: white;
            border-radius: 55px;
            margin-top: -216px;
        }
        h2{
            font-size: 2em;
            font-style: italic;
            font-family: fantasy;
        }
        input[type="text"], input[type="password"]{
            background: #FFFF;
            border: 1px solid #393939;
            border-radius: 5px 5px 5px 5px;
            color: #393939;
            font-size: 12px;
            padding: 5px;
        }
        input[type="text"], input[type="confirm_password"]{
            background: #FFFF;
            border: 1px solid #393939;
            border-radius: 5px 5px 5px 5px;
            color: #393939;
            font-size: 12px;
            padding: 5px;
        }
        label{
            font-weight: bold;
        }

        input[type="submit"] {
            padding: 10px;
            color: #fff;
            background: #0098cb;
            width: 320px;
            margin: 20px auto;
            margin-top: 0;
            border: 0;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #00b8eb;
        }

        .logo {
            width: 209px;
            height: 202px;
            margin-top: 126px;
            margin-left: -772px;
        }

    </style>
</head>
<img class="logo" src="../images/LOGO.png">
<body>
    <div id="fondo">
    <div class="wrapper">
        <h2>Restablecer la contraseña</h2>
        <p>Por favor complete este formulario para restablecer su contraseña.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Nueva contraseña</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirmar contraseña</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Restablecer">
                <a class="btn btn-link ml-2" href="welcome.php">Cancelar</a>
            </div>
        </form>
    </div>  
    </div>  
</body>
</html>