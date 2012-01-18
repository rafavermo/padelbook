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
		eliminarEventoUsuario($formDesvincular["usuarioID"],$formDesvincular["centroID"],$formDesvincular["pistaID"],$formDesvincular["fecha"],$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina principal
		header("Location: evento.php?exito=desvincularevento&ciudad=".$ciudad."&centro=".$centro."&fechaHora=".$fecha."&pista=".$pista."&propietario=".$propietario);
	}else{
		header("Location: eventos.php");
	}
?>

 

 