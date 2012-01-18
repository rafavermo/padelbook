<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
	include_once("gestionUsuario.php");
	
	$formInscripcion=$_SESSION["formInscripcion"];	
	$usuarioID=$formInscripcion["usuarioID"];
	$centroID=$formInscripcion["centroID"];
	$pistaID=$formInscripcion["pistaID"];
	$fecha=$formInscripcion["fecha"];
	$centro=$formInscripcion["centro"];
	$pista=$formInscripcion["pista"];	
	$ciudad=$formInscripcion["ciudad"];
	$propietario=$formInscripcion["propietario"];
			
	if(isset($formInscripcion)){
		//Valores por defecto
		$_SESSION["formInscripcion"]="";	
		$conexion=conectaBASEDATOS();
		insertarEvento($formInscripcion["usuarioID"],$formInscripcion["centroID"],$formInscripcion["pistaID"],$formInscripcion["fecha"],'0',$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina principal
		header("Location: evento.php?exito=inscripcionevento&ciudad=".$ciudad."&centro=".$centro."&fechaHora=".$fecha."&pista=".$pista."&propietario=".$propietario);
	}else{
		header("Location: eventos.php");
	}
?>

 

 