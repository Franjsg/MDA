<?php
// Inclui el archivo de configuración.
require_once "config.php";
 
// Define variables e inicializa con valores vacíos
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Procesamiento de datos del formulario cuando se envía el formulario.
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valida al usuario.
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, introduce un nombre de usuario.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "El nombre de usuario solo puede contener letras, números y guiones bajos.";
    } else{
        // Prepara una declaración.
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincula variables a la declaración preparada como parámetros.
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Establece parámetros.
            $param_username = trim($_POST["username"]);
            
            // Intento de ejecutar la declaración preparada.
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este nombre de usuario ya está en uso.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }

            // Cerrar declaración.
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validar contraseña.
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor introduce una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña debe tener al menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valida confirmación de contraseña.
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "La contraseña no coincide.";
        }
    }
    
    // Verifica los errores de entrada antes de insertar en la base de datos.
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepara una declaración de inserción
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincula variables a la declaración preparada como parámetros.
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Declaración de parámetros.
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Crea un hash de contraseña.
            
            // Intento de ejecutar la declaración preparada.
            if(mysqli_stmt_execute($stmt)){
                // Redirige a la página de inicio de sesión.
                header("location: login.php");
            } else{
                echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }

            // Cierra la declaración.
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cierra la conexión.
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Registrarse </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
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
            height: 827px;
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
            margin-top: -238px;
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

        .regresar {
            background-color: orange;
            border: none;
            color: black;
            padding: 9px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            font-size: small;
            text-align: center;
            border-radius: 12px;
            width: 116px;
            text-align: center;
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
        <h2> Registrarse </h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nombre de usuario:</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirmar contraseña:</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrarse">
                <input type="reset" class="btn btn-secondary ml-2" value="Restablecer">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Entre aquí</a>.</p>
        </form>

        
        
        <br><a href="/../index.php" class="regresar">Regresar</a></br>
    </div>     
    </div>    
</body>
</html>