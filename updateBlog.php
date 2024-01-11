<?php
	require 'entryConnection.php';
	
	$where = "";

    if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE title LIKE '%$valor'";
		}
	}
	
	$sql = "SELECT id, title FROM entries $where";
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
		.piePaginaIndexBlog{
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

			<b><h2 style="text-align:center">Entradas del blog</b></h2>
			<div>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <b>Título de la entrada:</b> <input type="text" id="campo" name="campo" />
                    <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
                </form>

				<div class="row">
					<a href="addEntry.php" class="btn btn-primary">Añadir entrada</a>&nbsp
					<a href="\php\welcome.php" class="btn btn-default">Regresar</a>&nbsp
				</div>
			
			<br>

			
			<div class="row table-responsive">
				<table class="table table-striped" border=6>
					<thead>
						<tr>
							<th>Id</th>
							<th>Título de entrada</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><a href="modifyEntryBlog.php?id=<?php echo $row['id']; ?>"class="btn btn-primary">Modificar</a></td>
								<td><a href="#" data-href="deleteEntryBlog.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar entrada</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar esta entrada?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Borrar</a>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
		
	</body>

	<footer>
        <div class="piePaginaIndexBlog">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>	