<?php

  session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");

  
  $conexion=conectaBASEDATOS();
  $validaUsuarioYPassword = validaUsuarioYPassword($_REQUEST["usuario"],sha1($_REQUEST["password"]),$conexion);
  desconectaBASEDATOS($conexion);
  
	   if($validaUsuarioYPassword!=1){
	     //Si no devuelve ninguna fila la consulta añadimos el error
	   	 $_SESSION["errores"][]='El <b>usuario y/o password</b> incorrectos';
		 //Le damos el valor a la variable de session contenido login.html para que al volver a index nos muestre el formulario de acceso
         Header("Location: login.php");
	   }else if($validaUsuarioYPassword==1){
	   	 $_SESSION["usuario"]=$_REQUEST["usuario"];
		 //$_SESSION["contenido"]="";
		 Header("Location: index.php");
	   }

   
     

?>