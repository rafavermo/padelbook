<?php 
session_start();

  include_once("gestionBD.php");
  include_once("gestionUsuario.php");
  include_once("gestionGrupo.php");

  //$_SESSION["contenido"]="grupos.php";

 if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
  	
	$usuario=$_SESSION["usuario"];

//Obtenemos el id del usuario conectado/////////////// 
   $conexion=conectaBASEDATOS();
 
     $usuarioID=seleccionaUsuarioIDporNombre($usuario, $conexion);
   
     foreach ($usuarioID as $id){
	    	  $_SESSION["usuarioID"]=$id["usuarioID"];
	  }
 
/////////////////////////////////////////////////////	
  
//Obtenemos todos los datos de grupos a los que pertenece el usuario////////

    $GruposNotUsuario=seleccionaGruposNotUsuarioID($_SESSION["usuarioID"], $conexion);
	
   desconectaBASEDATOS($conexion);
/////////////////////////////////////////////////////////  
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
				<h1>Listado de grupos</h1>
				<p>Aparecen todos los grupos a los que no te has inscrito.</p>
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
 				 <table border="1" bordercolor="gray">
    			 <tr>
    			 	<td> <b>Nombre </b> </td>
    			 	<td> <b>Descripcion </b></td> 
    			 	<td></td>  
    			 </tr>
  
 			<?php 
////Recorremos todos los grupo del usuario y lo mostramo en forma de tabla
     foreach ($GruposNotUsuario as $grupo ) {
     	//$_SESSION["grupoID"]=$grupo["grupoID"];
		//$_SESSION["nombre"]=$grupo["nombre"]; 
   ?>  	
        <tr>  <td> <b> <?=$grupo["nombre"];?> </b> </td> <td> <?=$grupo["descripcion"]; ?>  </td> <td> <a href="index.php?contenido=abandonar_grupo.php&grupoID=<?=$grupo["grupoID"]?>&nombre=<?=$grupo["nombre"]?> " >Abandonar</a>  </td>  </tr>  
	   
	    
<?php }//Fin foreach ?>
   
 		</table>

			<a href="crear_grupo.php" onclick="submit()">Crear grupo</a> 
			<a href="unirse_a_grupo.php" onclick="submit()">Unirse a un grupo</a>
  	
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
	
	echo "Debe estar registrado para poder acceder a la gestion de grupos!";
	
}//Fin si existe $SESSION["usuario"] y no es vacio
	


?>