<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionGrupo.php");
	
	
	$formularioGrupo=$_SESSION["crea_grupo"];
		
		
	if(isset($formularioGrupo)){
		//Eliminanos las variables de sesion utilizadas para el formulario
		unset($_SESSION["crea_grupo"]);
		$_SESSION["errores"]="";
			
		$conexion=conectaBASEDATOS();
		   insertarGrupo($formularioGrupo["nombre_grupo"],$formularioGrupo["descripcion_grupo"],$conexion);
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina principal
		header("Location: index.php");
	}else{
		header("Location: index.php");
	}
?>

 

 