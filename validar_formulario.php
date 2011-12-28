<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 $formulario=$_SESSION["formulario"];
 

 
 $errores=$_SESSION["errores"];
  if(isset($formulario)){
  	 //Recogemos todos los datos
  	 $formulario["nombre"]=$_REQUEST["nombre"];
	 $formulario["apellidos"]=$_REQUEST["apellidos"];
	 $formulario["usuario"]=$_REQUEST["usuario"];
	 $formulario["password"]=$_REQUEST["password"];
	 $formulario["cpassword"]=$_REQUEST["cpassword"];
	 $formulario["fecha_nacimiento"]=$_REQUEST["fecha_nacimiento"];
	 $formulario["ciudad"]=$_REQUEST["ciudad"];
	 $formulario["correo"]=$_REQUEST["correo"];
	  
	  $_SESSION["formulario"]=$formulario;
	  //Calculamos los errores del formulario
	  $errores=validar($formulario);
	  	
   }else{
   	//Si no existe ningun formulario
  	 Header("Location: index.php"); 	  
  }
  
  
  //Si encontramos errores del formulario
   if(count($errores) > 0){
   	 $_SESSION["errores"] = $errores;
	 Header("Location: index.php");  
    }else{
      //Si no hay errores
   	 Header("Location: exitoformulario.php"); 
   }
   
   
   
   
   function validar($formulario){
   	  
	   if( !(isset($formulario["nombre"]) && strlen($formulario["nombre"])>0 && preg_match("/^([a-zA-Z])+([a-zA-Z\ ])*+$/",$formulario["nombre"]))){
	   	 $errores[]='<font color="red">El campo <b>nombre</b> no puede ser vacio o tiene formato no valido</font><p>';
	   }
	
	   if( !(isset($formulario["apellidos"]) && strlen($formulario["apellidos"])>0  && preg_match("/^([a-zA-Z])+([a-zA-Z\ ])*+$/",$formulario["apellidos"]))){
	   	 $errores[]='<font color="red">El campo <b>apellidos</b> no puede ser vacio</font><p>';
	   }
	   
	   if( !(isset($formulario["usuario"]) && strlen($formulario["usuario"])>0 ) ){
	   	 $errores[]='<font color="red">El campo <b>usuario</b> no puede ser vacio</font><p>';
	   }
	   
	   if( !(isset($formulario["password"])) || strlen($formulario["password"])<=0 || !(isset($formulario["cpassword"])) || strcmp($formulario["password"],$formulario["cpassword"])!=0 ){
	   	 $errores[]='<font color="red">El campo <b>password</b> no puede ser vacio o error en la confirmaci&oacuten</font><p>';
	   }
	   
	   if( !(isset($formulario["correo"]) && strlen($formulario["correo"])>0 && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$formulario["correo"]) )){
	   	 $errores[]='<font color="red">El campo <b>correo</b> no puede ser vacio o no cumple el patron determinado</font><p>';
	   }
	   
	    //tratamiento de fecha
           
            list($dia,$mes,$year) = explode("/",$formulario["fecha_nacimiento"]);
           
           if(isset($formulario["fecha_nacimiento"]) && $formulario["fecha_nacimiento"]!=""){
                         if(! (strlen($formulario["fecha_nacimiento"])>7 && strlen($formulario["fecha_nacimiento"])<11 && checkdate($mes,$dia, $year)  ) ) {
                             $errores[]='<font color="red">El campo <b>fecha</b> no cumple el patron determinado</font><p>';                    
                          }
           }
	       
		   if($formulario["fecha_nacimiento"]==""){
		   	   $_SESSION["formulario"]["fecha_nacimiento"]="00/00/0000";
		   }
	   
	   
	   //Conexion con la base de datos para ver si el nombre de usuario ya esta en uso
	    $conexion=conectaBASEDATOS();
		$existeUsuario = seleccionarExiteUsuario($formulario["usuario"],$conexion);
		desconectaBASEDATOS($conexion);
	   if($existeUsuario >=1){
	   	$errores[]='<font color="red">El <b>usuario</b> ya existe. Debe introducir otro nombre de usuario</font><p>';
	   }
	   
	
	return $errores;
   }
   
    
   
		   
?>