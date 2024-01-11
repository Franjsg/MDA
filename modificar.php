<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM pacientes_mda WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
		.piePaginamodficar{
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
				<b><h3 style="text-align:center">Modificar paciente</b></h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre completo:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="escriba aquí..." value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="edad" class="col-sm-2 control-label">Edad:</label>
					<div class="col-sm-10">
						<input type="edad" class="form-control" id="edad" name="edad" placeholder="escriba aquí..." value="<?php echo $row['edad']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="fechaTerapia" class="col-sm-2 control-label">Fecha de terapia:</label>
					<div class="col-sm-10">
						<input type="datetime-local" class="form-control" name="fechaTerapia" placeholder="escriba aquí...">
					</div>
				</div>

				<div class="form-group">
					<label for="patologias" class="col-sm-2 control-label">Patologías:</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="patologias" name="patologias" placeholder="escriba aquí..." value="<?php echo $row['patologias']; ?>" >
					</div>
				</div>

				<div class="form-group">
					<label for="valoracionInicial" class="col-sm-2 control-label">Valoración inicial:</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="valoracionInicial" name="valoracionInicial" placeholder="escriba aquí..." value="<?php echo $row['valoracionInicial']; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="indexPatients.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	<footer>
        <div class="piePaginamodficar">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>