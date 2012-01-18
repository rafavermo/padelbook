<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionUsuario.php");
	
    $formulario=$_SESSION["formulario"];
	if($formulario["fecha_nacimiento"]==""){
	   $formulario["fecha_nacimiento"]="00/00/0000";
	}
	if(isset($formulario)){
	  	unset($_SESSION["formulario"]);
		unset($_SESSION["errores"]);
		unset($_SESSION["contenido"]);
		
		$conexion=conectaBASEDATOS();
		insertarUsuario($formulario["nombre"],$formulario["apellidos"],$formulario["usuario"],$formulario["password"],$formulario["fecha_nacimiento"],$formulario["ciudad"],$formulario["correo"],$conexion);
		desconectaBASEDATOS($conexion);
		header("Location: index.php?exito=usuario");
	}else
		header("Location: index.php?contenido=registro.php");
?>


<!--<script type="text/javascript">
  document.getElementById("contenido").innerHTML = "Se ha registrado correctamente";
</script> -->
 