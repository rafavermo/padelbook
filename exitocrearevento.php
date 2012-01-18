<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
	include_once("gestionUsuario.php");
	
	$formularioEvento=$_SESSION["crea_evento"];
		
		
	if(isset($formularioEvento)){
		//Valores por defecto
		$_SESSION["crea_evento"]="";
		$_SESSION["errores"]="";		
		$conexion=conectaBASEDATOS();
		insertarEvento($_SESSION["usuarioID"],$formularioEvento["centroID"],$formularioEvento["pistaID"],$formularioEvento["sfecha"],'1',$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina principal
		header("Location: eventos.php?exito=evento");
	}else{
		header("Location: crear_evento.php");
	}
?>

 

 