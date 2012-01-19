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
				<h1>Abandonar Evento</h1>
				<p>Confirmaci&oacute;n para dejar el grupo.</p>
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
  				
  				<!-- Aqui empieza el nuevo contenido de abandonar_grupo -->



 <h2>Estas seguro que quieres abandonar el grupo<b><?=$nombre_grupo; ?></b>?
 	<span class="small"> </span>
</h2>   
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
		
 		Header("Location: grupos.php?exito=elimina_usuario_grupo");
	} 
	
	if($_REQUEST["abandonar"]=="no"){
		Header("Location: grupos.php");
		
	}
 	
	
	
 }

?>

<!-- aqui incluimos el pie igual para todas las paginas -->

</div>
	</div>
	<? include_once("pie.php");?>
	</div>
	</div>
</div>
</body>
</html>


       	