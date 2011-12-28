<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
    $formularioEvento=$_SESSION["evento"];
	if(isset($formularioEvento)){
		$_SESSION["evento"]="";
		$_SESSION["errores"]="";
		$_SESSION["contenido"]="eventos.php";
		$fecha1= explode("/",$formularioEvento["fecha"]);
		$dia=$fecha1[0];
		$mes=$fecha1[1];
		$anyo=$fecha1[2];
		$hora=$formularioEvento["hora"];
		$sfecha=$anyo."-".$mes."-".$dia." ".$hora.":"."00";
		//$fecha = new DateTime($sfecha);
	    //$sfecha=$fecha->format('Y-m-d H:i:s');
		$conexion=conectaBASEDATOS();
		insertarEvento($formularioEvento["usuarioID"],$formularioEvento["centroID"],$formularioEvento["pistaID"],$sfecha,$formularioEvento["propietario"],$conexion);
		desconectaBASEDATOS($conexion);
		header("Location: index.php");
	}else
		header("Location: crear_evento.php");
?>

 