<?php 
session_start();

 //include_once("gestionBD.php");
  
  
  $_SESSION["contenido"]="crear_grupo.php";


?>

	<form action="valida_crear_grupo.php" method="get"> 
         <label for="nombre_grupo">Nombre del grupo:</label><input class="text" type="text" name="nombre_grupo" id="nombre_grupo" size="20" />
         <p><label for="descripcion_grupo">Descripcion:<p><textarea name="descripcion_grupo" id="descripcion_grupo" rows="8" cols="40" ><?=$_SESSION["crea_grupo"]["descripcion_grupo"]; ?></textarea>
          <p><input type="submit" value="Crear Grupo">
    </form>
    	
    	 
<?php


   //Creamos la variable de SESSION si no existe para el formulario con los valores por defecto

 if(!isset($_SESSION["crea_grupo"])){
  	
  $formularioGrupo=$_SESSION["crea_grupo"];

    $formularioGrupo["nombre_grupo"]="";
 	$formularioGrupo["descripcion_grupo"]="";
 	
	
 $_SESSION["crea_grupo"]=$formularioGrupo;

 }



?>    
       	