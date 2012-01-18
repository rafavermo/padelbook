<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
	include_once("gestionUsuario.php");
	
	$formDesvincular=$_SESSION["formInscripcion"];	
	$usuarioID=$formDesvincular["usuarioID"];
	$centroID=$formDesvincular["centroID"];
	$pistaID=$formDesvincular["pistaID"];
	$fecha=$formDesvincular["fecha"];
	$centro=$formDesvincular["centro"];
	$pista=$formDesvincular["pista"];	
	$ciudad=$formDesvincular["ciudad"];
	$propietario=$formDesvincular["propietario"];
			
	if(isset($formDesvincular)){
		//Valores por defecto
		$_SESSION["formInscripcion"]="";	
		$conexion=conectaBASEDATOS();
		eliminarEvento($formDesvincular["centroID"],$formDesvincular["pistaID"],$formDesvincular["fecha"],$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina principal
		header("Location: eventos.php?exito=eliminarevento");
	}else{
		header("Location: eventos.php");
	}
?>

 

 