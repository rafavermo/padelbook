<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 
 //Guardamos todos los datos anteriores en un variable
 $datos_anteriores=$_SESSION["datos_perfil"];
 
 //Variable de sesion para tratamiento de errores
 $errores=$_SESSION["errores"];
 
  	 //Recogemos todos los datos nuevos
  	 
  	 $nombre_nuevo=$_REQUEST["nombre"];
	 $apellidos_nuevos=$_REQUEST["apellidos"];
	 $usuario=$_REQUEST["usuario"];
	 $password_nuevo=$_REQUEST["password"];
	 $cpassword_nuevo=$_REQUEST["cpassword"];
	 $fecha_nacimiento_nueva=$_REQUEST["fecha_nacimiento"];
	 $ciudad_nueva=$_REQUEST["ciudad"];
	 $correo_nuevo=$_REQUEST["correo"];
	
	 
	  //Chequeamos todos los nuevos datos introducidos
	  
	   	if( !($nombre_nuevo!="" && strlen($nombre_nuevo)>0 && preg_match("/^([a-zA-Z])+([a-zA-Z\ ])*+$/",$nombre_nuevo))){
	   		 $errores[]='El campo <b>nombre</b> no puede ser vacio o tiene formato no valido<br>';
	   	}
	
	   	if( !(isset($apellidos_nuevos) && strlen($apellidos_nuevos)>0  && preg_match("/^([a-zA-Z])+([a-zA-Z\ ])*+$/",$apellidos_nuevos))){
	   		 $errores[]='El campo <b>apellidos</b> no puede ser vacio<br>';
	   	}
	   
	  
	  if(  $password_nuevo!="" || $cpassword_nuevo!="" ){
	  	 //Si la clave ha sido modificada la validamos
			      
	   	    if(strcmp($password_nuevo,$cpassword_nuevo)!=0 ){
	   		     $errores[]='El campo <b>password</b> no puede ser vacio o error en la confirmaci&oacuten<br>';
	       	}else{
	       		//Si no contiene errores la encriptamos
	       		$password_nuevo=sha1($password_nuevo);
	       	}
		
	  }else{
	  		
	  	//Si la clave no ha sido modificada dejamos la anterior
	  	 $password_nuevo=$_SESSION["datos_perfil"]["password"];
	  	 $cpassword_nuevo=$_SESSION["datos_perfil"]["cpassword"];
		 
	  }
	   
	 	if( !(isset($correo_nuevo) && strlen($correo_nuevo)>0 && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$correo_nuevo) )){
	   		 $errores[]='El campo <b>correo</b> no puede ser vacio o no cumple el patron determinado<br>';
	   	}
	   
	    //tratamiento de fecha
	     if($fecha_nacimiento_nueva==""){
	       $fecha_nacimiento_nueva="00/00/0000";
	      }else{
       	    list($dia,$mes,$year) = explode("/",$fecha_nacimiento_nueva); 
      	     if(isset($fecha_nacimiento_nueva) && $fecha_nacimiento_nueva!=""){
       		    if(! (strlen($fecha_nacimiento_nueva)>7 && strlen($fecha_nacimiento_nueva)<11 && checkdate($mes,$dia, $year)  ) ) {
            	     $errores[]='El campo <b>fecha</b> no cumple el patron determinado<br>';                    
                 }
             }	
		  }//Fin else tratamiento de fecha
  
  

   
  //Si encontramos errores en los nuevos datos realizamos el update en la base de datos
   if(count($errores) > 0){
   	 $_SESSION["errores"] = $errores; 
	 Header("Location: perfil.php");
    }else{
      //Si no hay errores realizamos la actualizacion en la base de datos
      
     /* 
       echo "DATOS CORRECTOS A INTRODUCIR";
	   echo "<br>----" . $datos_anteriores["usuarioID"];
       echo "<br>----" . $nombre_nuevo;
	   echo "<br>----" . $apellidos_nuevos;
	   echo "<br>----" . $usuario;
	   echo "<br>-----PASSWORD ANTERIOR------";
	   echo "<br>----" . $_SESSION["datos_perfil"]["password"];
	   echo "<br>------PASSWORD NUEVO-------";
	   echo "<br>----" . $password_nuevo;
	   echo "<br>----" . $fecha_nacimiento_nueva;
	   echo "<br>----" . $ciudad_nueva;
	   echo "<br>----" . $correo_nuevo;
       */
      
     $conexion=conectaBASEDATOS();
        ActualizaDatosUsuario($datos_anteriores["usuarioID"],$nombre_nuevo,$apellidos_nuevos,$usuario,$password_nuevo,$fecha_nacimiento_nueva,$ciudad_nueva,$correo_nuevo,$conexion);
      desconectaBASEDATOS($conexion);
      //hago la actualizacion y vuelvo a perfil
   	 Header("Location: perfil.php?exito=modifica_perfil"); 
   }

   
  
	         
	

    
   
		   
?>