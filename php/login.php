<?php
// Inicializando la conexión.
session_start();
 
// Comprueba si el usuario ya ha iniciado sesión; en caso afirmativo, redirige a la página de bienvenida.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Incluye los archivos de configuración.
require_once "config.php";
 
// Define las variables y las deja en principio vacías.
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Procesa los datos del formulario cuando se envía el formulario.
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Comprueba si el nombre de usuario está vacío.
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor introduce nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Comprueba si la contraseña está vacía.
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor introduce tu contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valida las credenciales.
    if(empty($username_err) && empty($password_err)){
        // Prepara una declaración selecta.
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincula variables a la declaración preparada como parámetros.
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Declaración de parámetros.
            $param_username = $username;
            
            // Intento de ejecutar la declaración preparada.
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Verifica si existe el nombre de usuario, si es así, verifica la contraseña.
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Vincula variables de resultado.
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // La contraseña es correcta, así que inicie una nueva sesión.
                            session_start();
                            
                            // Almacena datos en variables de sesión.
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirige al usuario a la página de bienvenida.
                            header("location: welcome.php");
                        } else{
                            // La contraseña no es válida, muestra un mensaje de error genérico.
                            $login_err = "Usuario o contraseña inválido.";
                        }
                    }
                } else{
                    // El usuario no es válida, muestra un mensaje de error genérico.
                    $login_err = "Usuario o contraseña inválido.";
                }
            } else{
                echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
            }

            // Cerrar declaración.
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerrando la conexión.
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesión</title>
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
            height: 699px;
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
            margin-top: -188px;
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
<body >

    <div id="fondo">
    <div class="wrapper">

        <h2>Inicio Sesión</h2>
        <p>Por favor complete sus credenciales para iniciar sesión.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nombre de usuario:</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Siguiente">
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
        </form>
        <br><a href="/../index.php" class="regresar">Regresar</a></br>
    </div>
    </div>
</body>
</html>