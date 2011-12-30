<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
	include_once("gestionUsuario.php");
	
	$formularioEvento=$_SESSION["crea_evento"];
		
		
	if(isset($formularioEvento)){
		//$_SESSION["evento"]="";
		//$_SESSION["errores"]="";
		//$_SESSION["contenido"]="eventos.php";
		$fecha1= explode("/",$formularioEvento["fecha"]);
		$dia=$fecha1[0];
		$mes=$fecha1[1];
		$anyo=$fecha1[2];
		$hora=$formularioEvento["hora"];
		$sfecha=$anyo."-".$mes."-".$dia." ".$hora.":"."00";
		//$fecha = new DateTime($sfecha);
	    //$sfecha=$fecha->format('Y-m-d H:i:s');
		
		
		//echo "---" . $usuarioID;
		
		$conexion=conectaBASEDATOS();
		insertarEvento($_SESSION["usuarioID"],$formularioEvento["centroID"],$formularioEvento["pistaID"],$sfecha,'1',$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al
		header("Location: index.php");
	}else{
		header("Location: crear_evento.php");
	}
?>

 