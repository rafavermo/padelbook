<?php 
session_start();

 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 include_once("gestionGrupo.php");

$errores=$_SESSION["errores"];

//$_SESSION["contenido"]="unirse_a_grupo.php";

 if(!isset($_POST["unirte_nombre_grupo"]) || $_POST["unirte_nombre_grupo"]=="" ){

?>

 <!-- cabecera igual para todas las paginas -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
       PadeLBooK
    </title>
    <link rel="stylesheet" type="text/css" title="Original" href="estilo/Estilo_principal.css" />
    <script type="text/javascript" src="ajax.js" ></script>
    

</head>
<body onload=mostrarMenuConJavascript();> 
<div class="wrapper">
	<div class="page">
	<?	include_once("cabecera.php");
		include_once("cabecera_fina.php");?>
	
 		<div id="cuerpo">  
 			<? 
		   include_once("columna_derecha.php");
		   include_once("columna_izquierda.php");
			?>
			<div id="contenido">
				
				 <!-- A partir de aqui el nuevo contenido -->
				
				<form name="funirgrupo" id="funirgrupo" action="unirse_a_grupo.php" method="post">
 					Introduzca el nombre del grupo: <input type="text" id="unirte_nombre_grupo" name="unirte_nombre_grupo" size="30"/>
 					<input type="submit" value="Unirte al grupo">
			    </form>
  
                <!-- div para mostrar los errores en php -->
				<div id="errores">
			 		<?php include_once("errores_php.php"); ?>
  				</div>

 


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
	    	
		   Header("Location: unirse_a_grupo.php");
	    }else{
	     	
	    	 //Si el usuario no esta ya incluido en el grupo lo incluimos
	      	 $conexion=conectaBASEDATOS();
	    	   insertarUsuarioEnGrupo($grupo_id,$usuario_id,$conexion);
	        	 desconectaBASEDATOS($conexion);
		  Header("Location: grupos.php?exito=unirse_a_grupo");
	   }
	 
	
	}else{
		$errores[]='<font color="red">No existe ningun grupo con ese <b>nombre</b></font><p>';
		$_SESSION["errores"] = $errores;
		Header("Location: unirse_a_grupo.php");
	}
	 
		
	
	
 }



?>

<!-- pie igual para todas las paginas -->
	</div>
	<? include_once("pie.php");?>
	</div>
</div>
</div>
</body>
</html>

