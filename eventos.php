<?php 
session_start();

  include_once("gestionBD.php");
  include_once("gestionEvento.php");

  $_SESSION["contenido"]="eventos.php";

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){

?>

  <p>&nbsp;&nbsp;<a href="" onclick="crear_evento()">Crear evento</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	
  	 <a href="" onclick="modificar_evento()">Modificar evento</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	 
  	 <a href="" onclick="eliminar_evento()">Eliminar evento</a>





<?php

}else{
	echo "Debe estar registrado para poder acceder a la gestión de eventos!";
}//Fin si existe $SESSION["usuario"] y no es vacio

?>