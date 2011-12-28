<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 include_once("gestionEvento.php");
 
  
 //$_SESSION["formulario_crea_evento_envio"]="";
 
 //Campos por defecto
 /*if(!isset($_SESSION["formulario_crea_evento_envio"])){
 	$_SESSION["formulario_crea_evento_envio"]["usuarioID"]="";
 	$_SESSION["formulario_crea_evento_envio"]["centroID"]="";
 	$_SESSION["formulario_crea_evento_envio"]["pistaID"]="";
 	$_SESSION["formulario_crea_evento_envio"]["fecha"]=""; 
	$_SESSION["formulario_crea_evento_envio"]["hora"]="";
	
	$formularioEvento=$_SESSION["formulario_crea_evento_envio"];
	
 }
 
 
 
 //$formularioEvento=$_SESSION["formulario_crea_evento_envio"];
 */
// if(isset($formularioEvento)){
  	 //Recogemos todos los datos
  	 
  	 $conexion=conectaBASEDATOS();
	 $usuarioID=seleccionaUsuarioIDporNombre($_SESSION["usuario"], $conexion);
  	 desconectaBASEDATOS($conexion);
	 
	 
	 foreach ($usuarioID as $id){
	 	  $_SESSION["usuarioID"]=$id["usuarioID"];
	 }
	 
	// $_SESSION["crea_evento"]["usuarioID"]=$usuarioID;;
 	$_SESSION["centroID"]=$_REQUEST["centroID"];
 	$_SESSION["pistaID"]=$_REQUEST["pistaID"];
 	$_SESSION["fecha"]=$_REQUEST["fecha"]; 
	$_SESSION["hora"]=$_REQUEST["hora"];
	 
	 
  /*	 
  	 $formularioEvento["usuarioID"]=$usuarioID;
	 $formularioEvento["centroID"]=$_REQUEST["centroID"];
	 $formularioEvento["pistaID"]=$_REQUEST["pistaID"];
	 $formularioEvento["fecha"]=$_REQUEST["fecha"];
	 $formularioEvento["hora"]=$_REQUEST["hora"];
	*/ 
	// foreach ($formularioEvento as $campo){
		
	//	echo  $campo;
	//}
	 
	 
	 
	 	  
	// $_SESSION["formulario_crea_evento_envio"]=$formularioEvento;
	
	 Header("Location: exitocrearevento.php");
	
 //}else{
 	//Header("Location: index.php");
 //}
 
 
 
 
 
 
 
 
 
 
 
/////////////////////////////////////////////////////////////7
 
 //$errores=$_SESSION["errores"];

  
  //Si encontramos errores del formulario
  /* if(count($errores) > 0){
   	 $_SESSION["errores"] = $errores;
	 Header("Location: index.php");  
    }else{
      //Si no hay errores
   	 Header("Location: exitoformulario.php"); 
   }
  */ 
   
   
   
 /*  function validar($formulario){
   	  
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
   
    */
   
		   
?>