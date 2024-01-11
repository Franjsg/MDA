<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>

	<style>
		.piePaginanuevo{
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: black;
			color: white;
			text-align: left;
		}
	
	</style>

	<script>
        function validacion(){
            var formvalido = true;

            var nom = document.getElementById("nombre").value;
            if(nom == null || nom.length == 0){
                alert("El nombre no puede estar vacío");
                formvalido = false;
            }

            var edad = document.getElementById("edad").value;
            if(isNaN(edad)){
                alert("La edad contiene solo números.");
                formvalido = false;
            }

			var fechaTerapia = document.getElementById("fechaTerapia").value;
            if(fechaTerapia == null || fechaTerapia.length == 0){
                alert("La fecha de terapia no está seleccionada, por favor seleccione una hora.");
                formvalido = false;
            }
            
            var patologias = document.getElementById("patologias").value;
            if(patologias == null || patologias.length == 0){
                alert("Las patologías no puede estar vacía.");
                formvalido = false;
            }
            
            var valoracionInicial = document.getElementById("valoracionInicial").value;
            if(valoracionInicial == null || valoracionInicial.length == 0){
                alert("La valoración inicial no puede estar vacía.");
                formvalido = false;
            }
            
           
            
            return formvalido;

        }

	</script>
	
	<body style="background-color: #FAD7A0">
		<div class="container">
			<div class="row">
				<b><h3 style="text-align:center">Nuevo paciente</b></h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" onsubmit="return validacion()">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre Completo:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="escriba aquí..." required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="edad" class="col-sm-2 control-label">Edad:</label>
					<div class="col-sm-10">
						<input type="edad" class="form-control" id="edad" name="edad" placeholder="escriba aquí..." required>
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
						<input type="patologias" class="form-control" id="patologias" name="patologias" placeholder="escriba aquí...">
					</div>
				</div>

				<div class="form-group">
					<label for="valoracionInicial" class="col-sm-2 control-label">Valoración inicial:</label>
					<div class="col-sm-10">
						<input type="valoracionInicial" class="form-control" id="valoracionInicial" name="valoracionInicial" placeholder="escriba aquí...">
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
        <div class="piePaginanuevo">
			<h3 class="p" style="margin-left:50px">© 2022 Cortex Neurorrehabilitación. CORTEX.</h3>
        </div>
    </footer>
</html>