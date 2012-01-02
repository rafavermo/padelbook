<?php 
session_start();

  include_once("gestionBD.php");
  include_once("gestionEvento.php");
  include_once("gestionUsuario.php");

  //$_SESSION["contenido"]="eventos.php";

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){

  $usuario=$_SESSION["usuario"];

//Obtenemos todos los eventos proximos del GRUPO
 $conexion=conectaBASEDATOS();
 
   $usuarioID=seleccionaUsuarioIDporNombre($usuario, $conexion);
   
   foreach ($usuarioID as $id){
	 	  $_SESSION["usuarioID"]=$id["usuarioID"];
	 }
 
  // $eventos_proximos=EventosDisponiblesPorUsuarioAPartirDeAhora($_SESSION["usuarioID"], $conexion);
   
 desconectaBASEDATOS($conexion);
 
?>

<table id="tabla__proximos_eventos" border="0">

 <?php // foreach($eventos_proximos as $evento){  ?>
    	
	 <tr>   </tr>	
		
		
		
		
  <?php  //} ?>	
	
	
	
</table>


  <p>&nbsp;&nbsp;<a href="index.php?contenido=crear_evento.php" onclick="submit">Crear evento</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	
  	 <a href="" onclick="">Modificar evento</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	 
  	 <a href="" onclick="">Eliminar evento</a>





<?php

}else{
	echo "Debe estar registrado para poder acceder a la gestión de eventos!";
}//Fin si existe $SESSION["usuario"] y no es vacio

?>