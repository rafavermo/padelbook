<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
	include_once("gestionUsuario.php");
	
	$formularioEvento=$_SESSION["crea_evento"];
		
		
	if(isset($formularioEvento)){
		$_SESSION["crea_evento"]="";
		$_SESSION["errores"]="";
		//$_SESSION["contenido"]="eventos.php";		
		$conexion=conectaBASEDATOS();
		insertarEvento($_SESSION["usuarioID"],$formularioEvento["centroID"],$formularioEvento["pistaID"],$formularioEvento["fecha"],'1',$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al
		header("Location: index.php");
	}else{
		header("Location: crear_evento.php");
	}
?>

 

 