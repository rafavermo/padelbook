<?php 
session_start();

  include_once("gestionBD.php");
  include_once("gestionEvento.php");
  include_once("gestionUsuario.php");

  //$_SESSION["contenido"]="eventos.php";

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){

  $usuario=$_SESSION["usuario"];

//Obtenemos el id del usuario
 $conexion=conectaBASEDATOS();
 
   $usuarioID=seleccionaUsuarioIDporNombre($usuario, $conexion);
   
   foreach ($usuarioID as $id){
	 	  $_SESSION["usuarioID"]=$id["usuarioID"];
	 }
  
  //Obtenemos todos los eventos de todos los grupos al que pertenezca el usuario desde la fecha actual
  $todos_los_eventos_proximos=TodosLosEventosDeGRUPOSdelUsuarioApartirDeAhora($_SESSION["usuarioID"], $conexion);
   
 
 
?>
 <p>PROXIMOS EVENTOS:</p>

<table id="tabla_proximos_eventos" border="1" bordercolor="gray">
 	<tr><td> <b>Fecha / Hora </b> </td> <td> <b>Ciudad </b></td> <td> <b>Centro </b></td> <td> <b>Pista </b></td><td> <b>Creado por </b></td>  </tr>


 <?php  foreach($todos_los_eventos_proximos as $evento){  
    	 
		 //Sacamos el nombre del centro
    	  $nombre_centro=nombreDelCentroPorID($evento["centroID"], $conexion);
		   foreach ($nombre_centro as $nombre)
	 	     $nombreCentro=$nombre["nombre"];
	     
		 //Sacamos el nombre del propietario del evento
		   $nombreProp=seleccionaNombreUsuarioporIDUsuario($evento["usuarioID"], $conexion);
		       foreach ($nombreProp as $nombre)
	 	          $nombrePropietario=$nombre["nombre"];
	 	          
				  
	     //Sacamos el nombre de la ciudad del centreo del evento
	       $nombreCiudadE=nombreDeCiudadPorCentroID($evento["centroID"], $conexion);
		   	  foreach ($nombreCiudadE as $nombre)
	 	          $nombreCiudadCentro=$nombre["ciudad"];
		 
		 //Sacamos la pista por el ID	  
	     $nombrePist=nombreDePistaPorPistaID($evento["pistaID"], $conexion);		  
	 	      foreach ($nombrePist as $nombre)
	 	          $nombrePista=$nombre["descripcion"];    		  
	?>	  
    	
	<tr>
		<td> <?=$evento["fecha"]; ?> </td> <td> <?=$nombreCiudadCentro; ?> </td> <td> <?=$nombreCentro; ?> </td> <td> <?=$nombrePista ?></td><td> <?=$nombrePropietario ?></td>  
		<td><a href="index.php?contenido=evento.php&ciudad=<?=$nombreCiudadCentro; ?>&centro=<?=$nombreCentro; ?>&propietario=<?=$nombrePropietario; ?>&fechaHora=<?=$evento['fecha']; ?>&pista=<?=$nombrePista ;?> " >Ver</a>  </td> 
		
   </tr>
		
		
		
		
  <?php  }//Fin foreach 
 
     desconectaBASEDATOS($conexion);
  ?>	
	
		
</table>


  <p>&nbsp;&nbsp;<a href="index.php?contenido=crear_evento.php" onclick="submit">Crear evento</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	
  	 <a href="" onclick="">Modificar evento</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	 
  	 <a href="" onclick="">Eliminar evento</a>





<?php

}else{
	echo "Debe estar registrado para poder acceder a la gestión de eventos!";
}//Fin si existe $SESSION["usuario"] y no es vacio

?>