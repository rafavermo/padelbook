<?php 
session_start();

  include_once("gestionBD.php");
  include_once("gestionEvento.php");
  include_once("gestionUsuario.php");

  //$_SESSION["contenido"]="eventos.php";

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
  	$usuario=$_SESSION["usuario"];

	$ciudad=$_REQUEST["ciudad"];
	$centro=$_REQUEST["centro"];
	$propietario=$_REQUEST["propietario"];
	$pista=$_REQUEST["pista"];
	$fecha=$_REQUEST["fechaHora"];
	
	
	//Obtenemos el id del usuario
	$conexion=conectaBASEDATOS();
	//Sacamos el ID del centro y la pista para consultar los usuarios del evento
	$IDusuario=seleccionaUsuarioIDporNombre($usuario, $conexion);
	foreach ($IDusuario as $id){
	 	  $usuarioID=$id["usuarioID"];
	 }
	$IDcentro=consultaIDDelCentro($centro, $conexion);
	foreach ($IDcentro as $id){
	 	  $centroID=$id["centroID"];
	 }
	$IDpista=consultaIDDePista($pista, $conexion);
	foreach ($IDpista as $id){
	 	  $pistaID=$id["pistaID"];
	 }
	$personasEvento=PersonasDeUnEvento($centroID,$pistaID,$fecha,$conexion);
	$SiexisteUsuarioEvento=consultaExisteUsuarioEnEvento($usuarioID,$centroID,$pistaID,$fecha,$conexion);
	desconectaBASEDATOS($conexion);
   	
	//Guardamos los datos en variable de sesion por si el usuario se inscribe en el evento
	$formInscripcion["usuarioID"]=$usuarioID;
	$formInscripcion["centroID"]=$centroID;
	$formInscripcion["pistaID"]=$pistaID;
	$formInscripcion["fecha"]=$fecha;
	$formInscripcion["ciudad"]=$ciudad;
	$formInscripcion["centro"]=$centro;
	$formInscripcion["pista"]=$pista;
	$formInscripcion["propietario"]=$propietario;
	$_SESSION["formInscripcion"]=$formInscripcion;

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
				<h1>Evento</h1>
				<p>Caracter&iacute;sticas del evento.</p>
				<div id="errores">
			 		<?
			 		// $errores=$_SESSION["errores"];
					// //si existen errores por la validacion PHP por parte del servidor en el registro los imprimimos
					// if(isset($errores) && count($errores)>0 && $errores!=""){
	  					// foreach($errores as $elemento){
	  	   					// printf("$elemento");
	   					// }
    				// }
					// //Destruimos la variable con los errores
					// // unset($_SESSION["errores"]);?>
  				</div>
  				<p></p>
				<table id="tabla_proximos_eventos" border="1" bordercolor="gray">
 					<tr>
 						<td> <b>Fecha / Hora </b> </td> 
 						<td> <b>Ciudad </b></td> 
 						<td> <b>Centro </b></td> 
 						<td> <b>Pista </b></td>
 						<td> <b>Creado por </b></td>
 				 	</tr>
 		
    	
			<tr>
				<td> <?=$fecha; ?> </td> 
				<td> <?=$ciudad; ?> </td> 
				<td> <?=$centro; ?> </td> 
				<td> <?=$pista; ?></td>
				<td> <?=$propietario; ?></td>  

   			</tr>
		
			</table>
 			<?php if($propietario==$usuario){?> 
 			<a href="eliminar_evento.php" onclick="submit()">Eliminar Evento</a>
 			<?php }?>
 			<?php if($personasEvento->rowCount() <4 && $SiexisteUsuarioEvento==0){ ?> 
 			  <a href="inscribir_evento.php" onclick="submit()">Inscribirse</a> 
 			<?php } ?>
 			
 			<?php if($SiexisteUsuarioEvento!=0 && $propietario!=$usuario){ ?> 
 			  <a href="desvincular_evento.php" onclick="submit()">Desvincularse</a> 
 			<?php } ?>
 			
 			<p></p>
 			<h1>Personas Inscritas</h1>
 			<h2>M&aacute;ximo 4 inscripciones al evento.</h2>
			<ul>
<?php
			foreach ($personasEvento as $persona){?>
	 	  	 	 
	 	  	 	 <li><?=$persona["usuario"];?></li>	  	 	 
	<?php	}?>
			</ul>

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