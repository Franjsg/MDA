<?php
	
	require 'entryConnection.php';

	$id = $_POST['id'];
	$title = $_POST['title'];
    $body = $_POST['body'];
	
	$sql = "UPDATE entries SET title='$title', body='$body'WHERE id = '$id'";
	$resultado = mysqli_query($connection, $sql);
	
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
		.pieactualziar{
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
				<h3>ENTRADA MODIFICADA</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="updateBlog.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
	<footer>
        <div class="pieactualziar">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>
