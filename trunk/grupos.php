<?php 
session_start();

  include_once("gestionBD.php");
  

  //$_SESSION["contenido"]="grupos.php";


?>

  <p>&nbsp;&nbsp;<a href="index.php?contenido=crear_grupo.php" onclick="submit">Crear grupo</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	&nbsp;&nbsp;<a href="index.php?contenido=unirse_a_grupo.php" onclick="submit">Unirse a un grupo</a>
  	
  	<p> Lista de grupos a los que pertenezco:
  	<p>	

