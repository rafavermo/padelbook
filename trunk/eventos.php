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
				<div id="stylized">
				<h1>Listado de Eventos</h1>
				<p>Pr&oacute;ximos eventos a disputar.</p>
				
				<!-- div para mostrar errores en php y otros mensajes de exito-->
				<?php include_once("exito.php"); ?>
				<div id="errores">
			 		<?php include_once("errores_php.php"); ?>
  				</div>
  				
  				<p></p>
				<table id="tabla_proximos_eventos">
 					<tr>
 						<td> <b>Fecha / Hora </b> </td> 
 						<td> <b>Ciudad </b></td> 
 						<td> <b>Centro </b></td> 
 						<td> <b>Pista </b></td>
 						<td> <b>Creado por </b></td>
 				 	</tr>
 					<?php  foreach($todos_los_eventos_proximos as $evento){  
    	 
		 			//Sacamos el nombre del centro
    	  			$nombre_centro=nombreDelCentroPorID($evento["centroID"], $conexion);
			   		foreach ($nombre_centro as $nombre)
		 	     		$nombreCentro=$nombre["nombre"];
					 
		 			//Sacamos el nombre del propietario del evento
			   		$nombreProp=seleccionaNombreUsuarioporIDUsuario($evento["usuarioID"], $conexion);
			       	foreach ($nombreProp as $nombre)
	 		          	$nombrePropietario=$nombre["usuario"];
	 	    	      	  
	    			 //Sacamos el nombre de la ciudad del centreo del evento
		       		$nombreCiudadE=nombreDeCiudadPorCentroID($evento["centroID"], $conexion);
			   	 	foreach ($nombreCiudadE as $nombre)
	 		         	$nombreCiudadCentro=$nombre["ciudad"];
		 
		 			//Sacamos la pista por el ID	  
	     			$nombrePist=nombreDePistaPorPistaID($evento["pistaID"], $conexion);		  
		 	      	foreach ($nombrePist as $nombre)
		 	          	$nombrePista=$nombre["descripcion"];    		 
				
					desconectaBASEDATOS($conexion); 
				?>	  
    	
			<tr>
				<td> <?=$evento["fecha"]; ?> </td> 
				<td> <?=$nombreCiudadCentro; ?> </td> 
				<td> <?=$nombreCentro; ?> </td> 
				<td> <?=$nombrePista; ?></td>
				<td> <?=$nombrePropietario; ?></td>  
				<td><a href="evento.php?ciudad=<?=$nombreCiudadCentro;?>&centro=<?=$nombreCentro; ?>&propietario=<?=$nombrePropietario; ?>&fechaHora=<?=$evento['fecha']; ?>&pista=<?=$nombrePista ;?> " >Ver</a>  </td> 
   			</tr>
		
  			<?php  }//Fin foreach ?>	
	
		
			</table>

 			<a href="crear_evento.php" onclick="submit()">Crear Evento</a> 
  	 		<!-- <a href="" onclick="">Modificar evento</a>
			<a href="" onclick="">Eliminar evento</a> -->

		</div>
	</div>
	<? include_once("pie.php");?>
	</div>
</div>
</div>

</body>
</html>



<?php

}else{
	$errores[]="Debe estar registrado para poder acceder a la gesti&oacute;n de eventos!";
	$_SESSION["errores"]=$errores;
	Header("Location: login.php");
}//Fin si existe $SESSION["usuario"] y no es vacio

?>