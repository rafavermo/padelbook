<?php 
session_start();
 
   include_once("gestionBD.php");
   include_once("gestionGrupo.php");

 if(isset($_REQUEST["grupoID"]) && $_REQUEST["grupoID"]!="" ){
  $_SESSION["grupoID"]=$_REQUEST["grupoID"];
 }	 
	 
  $usuarioID=$_SESSION["usuarioID"];
  
  //el nombre del grupo no lo guardamos en una variable de sesion porque no nos hace falta para la consulta de eliminaUsuarioDeGrupo
  $nombre_grupo=$_REQUEST["nombre"];
  
 

 if(!isset($_REQUEST["abandonar"]) || $_REQUEST["abandonar"]==""){ 

?>

 Estas seguro de que quiere abandonar el grupo <b><?=$nombre_grupo; ?></b>  ?
 <form name="formulario_abandona_grupo" id="formulario_abandona_grupo" action="abandonar_grupo.php" method="get">
 	<input name="abandonar" id="abandonar" type="submit" value="si" />
 	<input name="abandonar" id="abandonar" type="submit" value="no" />	
 </form>
    	 
<?php
 
 }else{
 		
 	if($_REQUEST["abandonar"]=="si"){
 		//eliminamos el usuario del grupo de la tabla usuariogrupos
		 $conexion=conectaBASEDATOS();
		    eliminaUsuarioDeGrupo($usuarioID,$_SESSION["grupoID"], $conexion);
		 desconectaBASEDATOS($conexion);
		$_SESSION["grupoID"]="";
		
 		Header("Location: index.php?contenido=grupos.php&exito=elimina_usuario_grupo");
	} 
	
	if($_REQUEST["abandonar"]=="no"){
		Header("Location: index.php?contenido=grupos.php");
		
	}
 	
	
	
 }



?>
       	