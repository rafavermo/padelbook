<?php 
session_start();
 
   include_once("gestionBD.php");
   include_once("gestionGrupo.php");

  $grupoID=$_SESSION["grupoID"];
  $usuarioID=$_SESSION["usuarioID"];
 
  
 

 if(!isset($_REQUEST["abandonar"]) || $_REQUEST["abandonar"]==""){ 

?>

 Estas seguro de que quiere abandonar el grupo  ?
 <form name="formulario_abandona_grupo" id="formulario_abandona_grupo" action="abandonar_grupo.php" method="get">
 	<input name="abandonar" id="abandonar" type="submit" value="si" />
 	<input name="abandonar" id="abandonar" type="submit" value="no" />	
 </form>
    	 
<?php
 
 }else{
 		
 	if($_REQUEST["abandonar"]=="si"){
 		//eliminamos el usuario del grupo de la tabla usuariogrupos
		 $conexion=conectaBASEDATOS();
		    eliminaUsuarioDeGrupo($usuarioID,$grupoID, $conexion);
		 desconectaBASEDATOS($conexion);
		
 		Header("Location: index.php?contenido=grupos.php&exito=elimina_usuario_grupo");
	} 
	
	if($_REQUEST["abandonar"]=="no"){
		Header("Location: index.php?contenido=grupos.php");
		
	}
 	
	
	
 }



?>
       	