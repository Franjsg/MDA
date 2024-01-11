<?php
require 'entryConnection.php';

$where = "";

$sql = "SELECT title, body FROM entries $where";
$resultado = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<style>
  .piePaginaBlog {
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
    <header id="servicesHeader">
            <h1>Blog</h1>
            <div class="header-img-services"></div>
    </header>
    <br>
    <br>
    <table class="blueTable">
    <thead>
    <tr>
      <th class="title">Título de entrada</th>
      <th>Descripción</th>		
    </tr>
    </thead>
    <tbody>
      <tr>
      <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
				<tr>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['body']; ?></td>
				</tr>
					<?php } ?>

    </tbody>
    </table>
    </div>
    </header>
      </body>
      <footer>
        <div class="piePaginaBlog">
            © Cortex Neurorrehabilitación · CORTEX
        </div>
    </footer>
</html>