<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <title>Servicios</title>
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>
    <style>
        .piePaginaServicios {
            position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: black;
			color: white;
			text-align: center;
        }
    </style>
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
            <h1>Servicios</h1>
            <div class="header-img-services"></div>
        </header>
        <div class="servicescontainer">
            <h2>Nuestro centro ofrece una gran variedad de servicios, que se mostrarán a continuación:</h2>
            <div class="service">
                <img src="images/fisiologo.png" alt="terapialogo" class="icon">         
                <h3>Fisioterapia</h3>
                <p>Principalmente hacemos uso de la llamda fisioterapia neurológica, que trata los problemas que pueden surgir
                    debido a un daño neurológico. Estos problemas pueden ser pérdida de la fuerza muscular, percepción del propio
                    cuerpo, entre otros, y que dificulta el movimiento del paciente y que por tanto limita la autonomía del mismo.
                 </p>
            </div>
            <div class="service">
                <img src="images/neurologo.png" alt="terapialogo" class="icon">
                <h3>Neuropsicología</h3>
                <p>Es una especialidad de la psicología que trata los procesos cognitivos, conductuales y emocionales que pueden verse 
                    afectados a causa de una lesión cerebral.
                </p>
            </div>
            <div class="service">
                <img src="images/terapialogo.png" alt="terapialogo" class="icon">          
                <h3>Terapia ocupacional</h3>
                <p>Disciplina que se encarga de la valoración, entrenamiento y reaprendizaje de actividades cotidianas. También se 
                    encarga de proporcionar y asesorar ayudas técnicas y adaptaciones, como pueden ser accesos habilitados para
                    personas que tengan alguna dificultad a la hora de moverse, o elección de sillas de ruedas u otros dispositivos
                    que ayuden al paciente a valerse por sí mismo.
                </p>  
            </div>
            <div class="service">   
                <img src="images/speech-therapy.png" alt="terapialogo" class="icon">     
                <h3>Logopedia</h3>
                <p>Disciplina que se encarga del estudio, detección, diagnóstico y tratamiento de patologías, trastornos o dificultades
                    que pueden alterar o complicar la comunicación con otras personas.
                </p>
            </div>
            <div class="service">
                <img src="images/sociallogo.png" alt="terapialogo" class="icon">
                <h3>Trabajo social</h3>
                <p>Ciencia social que promueve el desarrollo social, fortalecimiento y liberación de las personas. Su principal objetivo 
                    es aumentar el bienestar de las personas y ayudarlas a hacer frente a desafíos que pueden encontrarse en la vida
                </p>
            </div>     
        </div>
    </body>
    <footer>
        <div class="piePaginaServicios">
            © Cortex Neurorrehabilitación · CORTEX
        </div>
    </footer>
</html>