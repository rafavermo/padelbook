<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 include_once("gestionEvento.php");
 
 	$formularioEvento=$_SESSION["crea_evento"];
	$errores=array();
 // if(isset($formularioEvento)){
 	//Recogemos los demas datos
	$formularioEvento["fecha"]=$_REQUEST["fecha"];

	//Calculamos los errores del formulario
	if(!isset($formularioEvento["ciudad"]) || $formularioEvento["ciudad"]==""){
		array_push($errores,"El campo <b>Ciudad</b> no puede ser vacio <br>");
	}
	
	if(!isset($formularioEvento["centroID"]) || $formularioEvento["centroID"]==""){
		array_push($errores,"El campo <b>Centro deportivo</b> no puede ser vacio<br>");
	}
	   
	if(!(isset($formularioEvento["pistaID"]) && $formularioEvento["pistaID"]!="")){
		array_push($errores,"El campo <b>Pista</b> no puede ser vacio<br>");
	}
	if(!(isset($formularioEvento["hora"]) && $formularioEvento["hora"]!="" )){
		array_push($errores,"El campo <b>Hora</b> no puede ser vacio<br>");
	}
	//tratamiento de errores de fecha
 	$fecha= explode("/",$formularioEvento["fecha"]);
	$dia=$fecha[0];
	$mes=$fecha[1];
	$anyo=$fecha[2];
	
	if((strlen($formularioEvento["fecha"])>7 && strlen($formularioEvento["fecha"])<11 && checkdate($mes,$dia,$anyo))){
		$sfecha=$anyo."-".$mes."-".$dia." ".$formularioEvento["hora"].":"."00";
		$formularioEvento["sfecha"]=$sfecha;
	}else{
		array_push($errores,"El campo <b>Fecha</b> esta vacio o no cumple el patron determinado dd/mm/yyyy<br>");
	}
	$_SESSION["crea_evento"]=$formularioEvento;
	   
	//Para recoger el id del usuario actual conectado y si existe evento
  	$conexion=conectaBASEDATOS();
	$usuarioID=seleccionaUsuarioIDporNombre($_SESSION["usuario"], $conexion);
	$evento=consultaExisteEvento($formulario["centroID"],$formulario["pistaID"],$formulario["fecha"],$conexion);
  	desconectaBASEDATOS($conexion);
		
	if(($evento->rowCount())!=0){
		array_push($errores,"Ya existe un <b>Evento</b> con las opciones elegidas<br>");
	}

	$_SESSION["errores"] = $errores;
	//Si encontramos errores del formulario
 	if(count($errores)==0){
 		header("Location: exitocrearevento.php"); 
 	}else{
    	header("Location: crear_evento.php");
	}?>  