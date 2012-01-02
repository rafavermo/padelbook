<?php
 
 session_start();

 if(isset($_REQUEST["contenido"])){  
  $contenido=$_REQUEST["contenido"];
 }
  //if(isset($_SESSION["contenido"])){
   // $contenido=$_SESSION["contenido"];
 // }
  
 
 if(isset($_SESSION["errores"])){
    $errores=$_SESSION["errores"];
  }
 
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
    <script type="text/javascript" src="valida_formulario.js" ></script>

</head>

  
<body onload=mostrarMenuConJavascript();>
	 
		
	<div id="logotipo">
	
	</div>

<div id="header">
	<h1></h1>
</div>
 
<div id="cabecera_fina">
	 
  <?php include_once("cabecera_fina.php"); ?>

</div>
<div id="cuerpo">
<div id="columna_izquierda">
  
<noscript><?php include("menuindexsinjavascript.html");?> </noscript>

<!--div trasnparente que se muestra si esta activado javascript -->
 <div id="divmenuConJavascript" >
 	<?php include("menuindexconjavascript.html");?>
 </div>	
	
</div> <!-- div columna_izquierda -->

<div id="columna_derecha">
     <ul><li><a href="./reglamento/REGLAMENTO_JUEGO_FIP_2008.pdf">Reglamento FIP 2008</a></li>
     	 <li><a href="http://www.padelfip.org">Web oficial de la FIP</a></li>
     	 <li><a href="http://www.padelfederacion.es">Web oficial de la FEP</a></li>
     	 <li><a href="http://www.bwinpadelprotour.com/">Web Padel Pro Tour</a></li>
     </ul>
</div>

<div id="contenido">
	
<?php
 
  
   //si existen errores por la validacion PHP por parte del servidor en el registro los imprimimos
	if(isset($errores) && count($errores)>0 && $errores!=""){
	  
      foreach($errores as $elemento){
      	//echo "-----" . count($_SESSION["errores"]);
      	//for($i=0;$i<=count($_SESSION["errores"]);$i++){
	  	   printf("$elemento");
	   }
    }
	//Destruimos la variable con los errores
	unset($_SESSION["errores"]);
	
	//Mostramos el mensaje de exito si existe REQUEST[exito] con algun valor determinado
	if(isset($_REQUEST["exito"]) && $_REQUEST["exito"]!=""){
		include("exito.php");
	}

   //incluye en el div contenido, el contenido de la pagina especificada por $contenido (variable de sesion)
   if($contenido!=""){
     include($contenido);
   }	   
?>
	 
         
</div> <!-- div Contenido -->
</div>
<div id="pie">
	Este es el pie 
</div>

</body>
</html>
