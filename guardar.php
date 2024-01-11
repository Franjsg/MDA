<?php
	
	require 'conexion.php';
	
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$fechaTerapia = $_POST['fechaTerapia'];
	$patologias = $_POST['patologias'];
	$valoracionInicial = $_POST['valoracionInicial'];
	
	$sql = "INSERT INTO pacientes_mda (nombre, edad, fechaTerapia, patologias, valoracionInicial) VALUES ('$nombre', '$edad', '$fechaTerapia',
			'$patologias', '$valoracionInicial')";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>

	<style>
		.pieguardar{
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: black;
			color: white;
			text-align: left;
		}
	
	</style>
	
	<body style="background-color: #FAD7A0">
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<b><h3>PACIENTE GUARDADO</b></h3>
						<?php } else { ?>
						<b><h3>ERROR AL GUARDAR</b></h3>
					<?php } ?>
					
					<a href="indexPatients.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
	<footer>
        <div class="pieguardar">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
	
</html>
