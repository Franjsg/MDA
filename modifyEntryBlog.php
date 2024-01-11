<?php
	require 'entryConnection.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM entries WHERE id = '$id'";
	$resultado = mysqli_query($connection, $sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>

	<style>
		.modifyEntryBlog{
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
				<h3 style="text-align:center">Modificar entrada</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="actualizarBlog.php" autocomplete="off">
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título de la entrada:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="title" name="title" placeholder="escriba aquí..." value="<?php echo $row['title']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="body" class="col-sm-2 control-label">Descripción de la entrada:</label>
					<div class="col-sm-10">
						<input type="body" class="form-control" id="body" name="body" placeholder="escriba aquí..." value="<?php echo $row['body']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="updateBlog.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	<footer>
        <div class="modifyEntryBlog">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>