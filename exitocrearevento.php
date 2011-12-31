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
		$_SESSION["centroID"]="";
		$_SESSION["pistaID"]="";
		$_SESSION["fecha"]="";
		$_SESSION["ciudad"]="";
		//$_SESSION["contenido"]="eventos.php";		
		$conexion=conectaBASEDATOS();
		insertarEvento($_SESSION["usuarioID"],$formularioEvento["centroID"],$formularioEvento["pistaID"],$formularioEvento["fecha"],'1',$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina principal
		header("Location: index.php");
	}else{
		header("Location: index.php");
	}
?>

 

 