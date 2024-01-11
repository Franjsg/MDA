
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>

	<style>
		.piePaginaAñadirEntrada{
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
				<b><h3 style="text-align:center">Nueva entrada</b></h3>
			</div>
			
			<form class="form-horizontal" method="POST" autocomplete="off" action="saveEntry.php">
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título de la entrada:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="title" name="title" placeholder="escriba aquí..." required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="body" class="col-sm-2 control-label">Descripción de la entrada:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="body" name="body" placeholder="escriba aquí..." required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="/php/welcome.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	<footer>
        <div class="piePaginaAñadirEntrada">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>