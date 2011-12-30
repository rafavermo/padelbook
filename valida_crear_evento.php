<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 include_once("gestionEvento.php");
 
 $formularioEvento=$_SESSION["crea_evento"];
 
 //$formularioEvento=$_REQUEST["crea_evento"];
 
 $errores=$_SESSION["errores"];
 
 if(isset($formularioEvento)){
  	 //Recogemos todos los datos
  	 
  	 
  	  //Para recoger el id del usuario actual conectado
  	 $conexion=conectaBASEDATOS();
	 $usuarioID=seleccionaUsuarioIDporNombre($_SESSION["usuario"], $conexion);
  	 desconectaBASEDATOS($conexion);
	 
	 foreach ($usuarioID as $id){
	 	  $_SESSION["usuarioID"]=$id["usuarioID"];
	 }
	 
	 //Recogemos los demas datos
 	$formularioEvento["centroID"]=$_REQUEST["centroID"];
 	$formularioEvento["pistaID"]=$_REQUEST["pistaID"];
 	$formularioEvento["fecha"]=$_REQUEST["fecha"]; 
	$formularioEvento["hora"]=$_REQUEST["hora"];
		 
		 
	  $_SESSION["crea_evento"]=$formularioEvento;
	  //Calculamos los errores del formulario
	  $errores=valida_crea_evento($formularioEvento); 
	 
	
 }else{
 	Header("Location: index.php");
 }
	
	
	
	
	//Si encontramos errores del formulario
   if(count($errores) > 0){
   	 $_SESSION["errores"] = $errores;
	 Header("Location: index.php");  
    }else{
      //Si no hay errores
   	   Header("Location: exitocrearevento.php");
   } 
	 

 function valida_crea_evento($formulario){
   
 
  list($dia,$mes,$year) = explode("/",$formulario["fecha"]);
           
		   // echo "ANTES DE ENTRAR en el if, existe fecha?:". isset($formulario["fecha"]) . "es distindo de vacio?:"  . $formulario["fecha"]!=""; 
		   
           if( isset($formulario["fecha"]) && $formulario["fecha"]!=''){
           	            		
           	            	
           	            
                         if(! (strlen($formulario["fecha"])>7 && strlen($formulario["fecha"])<11 && checkdate($mes,$dia, $year)  ) ) {
                         	 
                             $errores[]='<font color="red">El campo <b>fecha</b> no cumple el patron determinado</font><p>';
							                  
                          }
           }else{
           	  $errores[]='<font color="red">Debe introducir una <b>fecha</b></font><p>';
           }
	       
 
      return $errores;
 }
  
		   
?>