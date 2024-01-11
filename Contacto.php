<?php
include('conexionContact.php');
if((isset($_POST['nombre']) && !empty($_POST['nombre'])))
if((isset($_POST['apellidos']) && !empty($_POST['apellidos']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['subject']) && !empty($_POST['subject']))){

	$nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$query = "INSERT INTO `contacto` (nombre, apellidos, email, subject) VALUES ('$nombre', '$apellidos', '$email', '$subject')";
		$result = mysqli_query($connection, $query);
		//echo "<center>Mensaje enviado con éxito, nos pondremos en contacto con usted pronto.</center>";
}

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <title>Contacto</title>
        <link rel="stylesheet" href="estilo.css" type="text/css">        
    </head>

    <style>
        .piePaginaContacto {
            position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: black;
			color: white;
			text-align: center;
        }
    </style>

    <script>
  function validacionContacto(){
            var formvalido = true;

            var nombre = document.getElementById("nombre").value;
            if(nombre == null || nombre.length == 0){
                alert("El nombre no puede estar vacío");
                formvalido = false;
            }

            var apellidos = document.getElementById("apellidos").value;
            if(apellidos == null || apellidos.length == 0){
                alert("Los apellidos no pueden estar vacío");
                formvalido = false;
            }

            var email = document.getElementById("email").value;
            if(email == null || email.length == 0){
                alert("El email no pueden estar vacío");
                formvalido = false;
            }

            
            var subject = document.getElementById("subject").value;
            if(subject == null || subject.length == 0){
                alert("El asunto no puede estar vacío, redactélo.");
                formvalido = false;
            }

            if(formvalido == true){
                alert("Mensaje enviado con éxito");
            }      
            return formvalido;
        }
</script>
    <body style="background:#90b083">
        <div class="navtopbar">
            <ul>
            <li><a href="index.php">Inicio</a></li>
                <li><a href="QuienesSomos.php">Quiénes somos</a></li>
                <li><a href="Servicios.php">Servicios</a></li>
                <li><a href="Contacto.php">Contacto</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li style="float: right;"><a class="active" href="/php/register.php">Zona terapeuta</a></li>
            </ul>
        </div>
        <header id="servicesHeader">
            <h1>Contacto</h1>
            <p>Por favor rellene el siguiente formulario para contactar con nuestros profesionales: </p>
        </header>
        <div class="contactForm">
            <form action method="POST" onsubmit="return validacionContacto()">
                <label for="nombre">Nombre:</label><br>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe aquí..."><br>
                <label for="apellidos">Apellidos:</label><br>
                <input type="text" name="apellidos" id="apellidos" placeholder="Escribe aquí..."><br>
                <label for="email">Correo electrónico:</label>
                <input type="text" name="email" id="email" placeholder="Ej:@hotmail.com, @gmail.com..."><br>
                <br>
                <label for="subject">Motivo de la consulta:</label><br>
                <input type="text" name="subject" id="subject" placeholder="Escribe aquí..."><br>
                
                <input type="submit" value="Enviar" onclick="validacionContacto()">
            </form>
            <hr>
            <div class="maps">
            <p>Nuestra ubicación</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3519.137480759498!2d-15.441501885035434!3d28.111841014206455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc4095a87f7086d5%3A0xca6c4bb8ebafc4b2!2sAv.%20Escaleritas%2C%20Las%20Palmas%20de%20Gran%20Canaria%2C%20Las%20Palmas!5e0!3m2!1ses!2ses!4v1651480195149!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>        
    </body>
    <footer>
        <div class="piePaginaContacto">
            © Cortex Neurorrehabilitación · CORTEX
        </div>
    </footer>
</html>