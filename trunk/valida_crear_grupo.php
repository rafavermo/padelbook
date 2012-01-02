
<?php
 session_start();
 include_once("gestionBD.php");
 include_once("gestionGrupo.php");
 
 
 $formularioGrupo=$_SESSION["crea_grupo"];
 
 $errores=$_SESSION["errores"];
 
 if(isset($formularioGrupo)){
 
 $formularioGrupo["nombre_grupo"]=$_REQUEST["nombre_grupo"];
 $formularioGrupo["descripcion_grupo"]=$_REQUEST["descripcion_grupo"];
 
 
     //Comprobamos si existe o no el grupo a crear
     $conexion=conectaBASEDATOS();
	   $existeGrupo=seleccionarExisteGrupo($formularioGrupo["nombre_grupo"],$conexion);
  	 desconectaBASEDATOS($conexion);
  	 
	   if($existeGrupo!=0){
	    	$errores[]='<font color="red">Ya existe un <b>grupo</b> con ese nombre</font><p>';
	    }
	
	    if(  !(isset($formularioGrupo["nombre_grupo"]) && $formularioGrupo["nombre_grupo"]!='') ){
  	     $errores[]='<font color="red">Debe darle un <b>nombre</b>  al grupo</font><p>';
       }
        
       $_SESSION["crea_grupo"]=$formularioGrupo;
   
 
        //Si encontramos errores del formulario
  		 if(count($errores) > 0){
   			 $_SESSION["errores"] = $errores;
			 Header("Location: index.php?contenido=crear_grupo.php");  
 		  }else{
    		 //Si no hay errores
   			 Header("Location: exitocreargrupo.php");
  		  } 
 
 
 }else{
 	  Header("Location: index.php?contenido=crear_grupo.php");
   }
 

	    
?>
