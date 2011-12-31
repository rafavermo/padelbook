
<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionUsuario.php");
 include_once("gestionEvento.php");
 
 $formularioEvento=$_SESSION["crea_evento"];
 
 $errores=$_SESSION["errores"];
 
 if(isset($formularioEvento)){
 	 //hacemos el tratamiento de la fecha
 	 $fecha=$_REQUEST["fecha"];
 	 $fecha1= explode("/",$fecha);
	 $dia=$fecha1[0];
	 $mes=$fecha1[1];
	 $anyo=$fecha1[2];
	 $hora=$_REQUEST["hora"];

	 if(!(strlen($fecha)>7 && strlen($fecha)<11 && checkdate($mes,$dia,$anyo))){
	 	$errores[]='<font color="red">El campo <b>fecha</b> no cumple el patron determinado DD/MM/YYYY o la fecha no es correcta</font><p>';
	 }else{
	 	$sfecha=$anyo."-".$mes."-".$dia." ".$hora.":"."00";
	 }
	 
  	 
  	 //Recogemos todos los datos
  	 $usuario=$_SESSION["usuario"];
  	 $centroID=$_REQUEST["centroID"];
	 $pistaID=$_REQUEST["pistaID"];
  	 
  	  //Para recoger el id del usuario actual conectado
  	 $conexion=conectaBASEDATOS();
	 $usuarioID=seleccionaUsuarioIDporNombre($usuario, $conexion);
	 $evento=consultaExisteEvento($centroID,$pistaID,$sfecha,$conexion);
  	 desconectaBASEDATOS($conexion);
  	 
	 if(($evento->rowCount())!=0){
		$errores[]='<font color="red">Ya existe un <b>evento</b> con las opciones elegidas</font><p>';
	 }
	
	 foreach ($usuarioID as $id){
	 	  $_SESSION["usuarioID"]=$id["usuarioID"];
	 }
	 
	 
	 //Recogemos los demas datos
 	$formularioEvento["centroID"]=$centroID;
 	$formularioEvento["pistaID"]=$pistaID;
 	$formularioEvento["fecha"]=$sfecha; 
	$formularioEvento["evento"]=$evento->rowCount();
		
		
	//Comprobamos que el centro ha sido seleccionado
      if(  !(isset($formularioEvento["centroID"]) && $formularioEvento["centroID"]!='') ){
  	     $errores[]='<font color="red">Debe seleccionar un <b>centro</b> </font><p>';
       }
 
     //Comprobamos que la pista ha sido seleccionada
     if(  !(isset($formularioEvento["pistaID"]) && $formularioEvento["pistaID"]!='') ){
  	     $errores[]='<font color="red">Debe seleccionar una <b>pista</b> </font><p>';
      }	
		
		 
	$_SESSION["crea_evento"]=$formularioEvento;
	
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
	
	    
?>
