<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionEvento.php");
	include_once("gestionUsuario.php");
	
		
	//if(isset($formularioEvento)){
		//$_SESSION["evento"]="";
		//$_SESSION["errores"]="";
		//$_SESSION["contenido"]="eventos.php";
		$fecha1= explode("/",$_SESSION["fecha"]);
		$dia=$fecha1[0];
		$mes=$fecha1[1];
		$anyo=$fecha1[2];
		$hora=$_SESSION["hora"];
		$sfecha=$anyo."-".$mes."-".$dia." ".$hora.":"."00";
		//$fecha = new DateTime($sfecha);
	    //$sfecha=$fecha->format('Y-m-d H:i:s');
		
		
		//echo "---" . $usuarioID;
		
		$conexion=conectaBASEDATOS();
		insertarEvento($_SESSION["usuarioID"],$_SESSION["centroID"],$_SESSION["pistaID"],$sfecha,'1',$conexion);
		desconectaBASEDATOS($conexion);
		//header("Location: index.php");
	//}else
		//header("Location: crear_evento.php");
?>

 