<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'mda_pacientes');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>