<?php
include('entryConnection.php');

if (isset($_POST['title'], $_POST['body'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
	
	$sql = "INSERT INTO entries (title, body) VALUES ('$title', '$body')";
	$resultado = mysqli_query($connection, $sql);
}
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
		.saveEntry{
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
				<b><h3>ENTRADA GUARDADA</h3></b>
				<?php } else { ?>
				<b><h3>ERROR AL GUARDAR LA ENTRADA</h3></b>
				<?php } ?>
				
				<a href="updateBlog.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
	<footer>
        <div class="saveEntry">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>
