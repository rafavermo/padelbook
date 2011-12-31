<?php 
session_start();

  include_once("gestionBD.php");
  

  $_SESSION["contenido"]="grupos.php";


?>

  <p>&nbsp;&nbsp;<a href="" onclick="crear_grupo()">Crear grupo</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	&nbsp;&nbsp;<a href="" onclick="unirse_a_grupo()">Unirse a un grupo</a>
  	
  	<p> Lista de grupos a los que pertenezco:
  	<p>	

<?php


?>