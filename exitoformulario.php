<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionUsuario.php");
    $formulario=$_SESSION["formulario"];
	if(isset($formulario)){
		$_SESSION["formulario"]="";
		$_SESSION["errores"]="";
		$_SESSION["contenido"]="";
		$conexion=conectaBASEDATOS();
		insertarUsuario($formulario["nombre"],$formulario["apellidos"],$formulario["usuario"],$formulario["password"],$formulario["fecha_nacimiento"],$formulario["ciudad"],$formulario["correo"],$conexion);
		desconectaBASEDATOS($conexion);
		header("Location: index.php");
	}else
		header("Location: formulario.php");
?>


<!--<script type="text/javascript">
  document.getElementById("contenido").innerHTML = "Se ha registrado correctamente";
</script> -->
 