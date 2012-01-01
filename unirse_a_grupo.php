<?php 
session_start();

 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 include_once("gestionGrupo.php");

$errores=$_SESSION["errores"];

//$_SESSION["contenido"]="unirse_a_grupo.php";

 if(!isset($_POST["unirte_nombre_grupo"]) || $_POST["unirte_nombre_grupo"]=="" ){

?>
 <form name="funirgrupo" id="funirgrupo" action="index.php?contenido=unirse_a_grupo.php" method="post">
 Introduzca el nombre del grupo: <input type="text" id="unirte_nombre_grupo" name="unirte_nombre_grupo" size="30"/>
 <input type="submit" value="Unirte al grupo">
  </form>
  


<?php

 }else{
 	
	$nombre_grupo=$_POST["unirte_nombre_grupo"]; 
	
	//Primero comprobamos si el grupo existe
	$conexion=conectaBASEDATOS();
	  $existe_grupo=seleccionarExisteGrupo($nombre_grupo,$conexion);
	 desconectaBASEDATOS($conexion); 
	
   if($existe_grupo!=0){
	
	//Sacamos el id del usuario y del grupo
	$conexion=conectaBASEDATOS();
	  $usuarioID=seleccionaUsuarioIDporNombre($_SESSION["usuario"], $conexion);
	  $grupoID=seleccionaGrupoIDporNombre($nombre_grupo, $conexion);
	desconectaBASEDATOS($conexion);
	
	foreach ($usuarioID as $id){
	 	  $usuario_id=$id["usuarioID"];
	 }
	
	foreach ($grupoID as $id){
	 	  $grupo_id=$id["grupoID"];
	 }
	
	$existe_usuario_engrupo=seleccionarExisteUsuarioEnGrupo($usuario_id,$grupo_id,$conexion);
	
	
	
	   if($existe_usuario_engrupo!=0){
	    	$errores[]='<font color="red">Ya perteneces a ese <b>grupo</b></font><p>';
	    	$_SESSION["errores"] = $errores;
	    	
		   Header("Location: index.php?contenido=unirse_a_grupo.php");
	    }else{
	     	
	    	 //Si el usuario no esta ya incluido en el grupo lo incluimos
	      	 $conexion=conectaBASEDATOS();
	    	   insertarUsuarioEnGrupo($grupo_id,$usuario_id,$conexion);
	        	 desconectaBASEDATOS($conexion);
		  Header("Location: index.php?contenido=grupos.php&exito=unirse_a_grupo");
	   }
	 
	
	}else{
		$errores[]='<font color="red">No existe ningun grupo con ese <b>nombre</b></font><p>';
		$_SESSION["errores"] = $errores;
		Header("Location: index.php?contenido=unirse_a_grupo.php");
	}
	 
		
	
	
 }



?>