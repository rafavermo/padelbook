<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionGrupo.php");
	include_once("gestionUsuario.php");
	
	$formularioGrupo=$_SESSION["crea_grupo"];
		
		
	if(isset($formularioGrupo)){
		//Eliminanos las variables de sesion utilizadas para el formulario
		unset($_SESSION["crea_grupo"]);
		$_SESSION["errores"]="";
		
			//Creamos el nuevo grupo y añadimos el usuario que lo crea al nuevo grupo
		$conexion=conectaBASEDATOS();
		
		    //Creamos el nuevo grupo
		   insertarGrupo($formularioGrupo["nombre_grupo"],$formularioGrupo["descripcion_grupo"],$conexion);
		
		
		   //Sacamos el id del usuario y del grupo
	
	        $usuarioID=seleccionaUsuarioIDporNombre($_SESSION["usuario"], $conexion);
	        $grupoID=seleccionaGrupoIDporNombre($formularioGrupo["nombre_grupo"], $conexion);
	
	
	        foreach ($usuarioID as $id){
	 	        $usuario_id=$id["usuarioID"];
	         }
	
	        foreach ($grupoID as $id){
	 	        $grupo_id=$id["grupoID"];
	        }
		
		   
		   //insertamos el usuario al grupo
		   insertarUsuarioEnGrupo($grupo_id,$usuario_id,$conexion);
		   
		desconectaBASEDATOS($conexion);
		//Volvemos al la pagina de grupos y con el mensaje de exito
		header("Location: index.php?exito=grupo&contenido=grupos.php");
	}else{
		header("Location: index.php?contenido=crear_grupo.php");
	}
?>

 

 