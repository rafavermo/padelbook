<?php
	session_start(); 
  	include_once("gestionBD.php");
  	include_once("gestionEvento.php");
  
  	$formularioEvento=$_SESSION ["crea_evento"];
     //Creamos la variable de SESSION para el formulario con los valores por defecto
	if(!isset($formularioEvento)){  
		// $formularioEvento=$_SESSION["crea_evento"];
    	$formularioEvento["centroID"]="";
		$formularioEvento["ciudad"]="";
 		$formularioEvento["pistaID"]="";
 		$formularioEvento["fecha"]=""; 
		$formularioEvento["hora"]="";
	
 		$_SESSION["crea_evento"]=$formularioEvento;
	}
  	$ciudadr=$_REQUEST["ciudad_evento"];
  	if(isset($ciudadr) && $ciudadr!=""){
    	$formularioEvento["ciudad"]=$ciudadr;
	 	$formularioEvento["pistaID"]=""; 
	 	$formularioEvento["centroID"]="";
  	}
  	$centro=$_REQUEST["centro_evento"];
  	if(isset($centro) && $centro!=""){
    	$formularioEvento["centroID"]=$centro;
	 	$formularioEvento["pistaID"]="";
  	}
  	$pista=$_REQUEST["pistas_evento"];
  	if(isset($pista) && $pista!=""){
    	$formularioEvento["pistaID"]=$pista;
  	}

	// $formularioEvento["fecha"]=$_REQUEST["fecha"];
	$hora=$_REQUEST["hora_evento"];
	if(isset($hora) && $hora!=""){
		$formularioEvento["hora"]=$hora;
	}

	$_SESSION["crea_evento"]=$formularioEvento;	
  
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
    <script type="text/javascript" src="valida_crea_evento.js" ></script>

</head>
<body onload=mostrarMenuConJavascript();> 
<div class="wrapper">
	<div class="page">
			<? include_once("Cabecera.php");
   				include_once("cabecera_fina.php"); ?>
	<div id="cuerpo">
		<? include_once("Columna_izquierda.php");
		   include_once("Columna_derecha.php");
		?>
		<div id="contenido">
			<div id="stylized">
				<h1>Registro de Evento</h1>
				<p>Debe introducir los datos correspondiente al evento que desea crear.</p>
				<div id="errores">
			 		<?
			 		$errores=$_SESSION["errores"];
					//si existen errores por la validacion PHP por parte del servidor en el registro los imprimimos
					if(isset($errores) && count($errores)>0 && $errores!=""){
	  					foreach($errores as $elemento){
	  	   					printf("$elemento");
	   					}
    				}
					//Destruimos la variable con los errores
					// unset($_SESSION["errores"]);?>
  				</div>
  		<p></p>
	
	<form id="formulario_ciudad" name="formulario_ciudad" action="crear_evento.php" method="post" >
  		<label>Ciudad del evento: 
				<span class="small"> </span>
		</label>
		<select name="ciudad_evento" id="ciudad_evento" onchange="this.form.submit()">
			<option selected> </option>
			<?php
	  			$conexion=conectaBASEDATOS();
	  	 		$ciudades=nombresDeCiudades($conexion);
	  	 		foreach($ciudades as $ciudad){	
	 		?>
	   		<option value='<?=$ciudad["ciudad"]?>'  <?php  if(isset($formularioEvento["ciudad"]) && $formularioEvento["ciudad"]==$ciudad["ciudad"]){?> selected <?php } ?> > <?=$ciudad["ciudad"]?> </option>  	
			<?php } ?>	
		</select> 
	</form>
	<form id="formulario_centros" name="formulario_centros" action="crear_evento.php" method="post" >
		<label>Centro deportivo: 
				<span class="small"> </span>
		</label>		
		<select id="centro_evento" name="centro_evento"  onchange="this.form.submit()">
			<option selected> </option>
			<?php	  
	   		$centros=nombresDeCentrosPorCiudad($formularioEvento["ciudad"], $conexion);
	   		foreach($centros as $centro){
	 		?>
	   		<option value='<?=$centro["centroID"]?>' <?php  if(isset($formularioEvento["centroID"]) && $formularioEvento["centroID"]==$centro["centroID"]){?> selected <?php } ?>  ><?=$centro["nombre"]?></option>  	
			<?php } ?>
		</select> 
	</form>
	<form id="formulario_pistas" name="formulario_pistas" action="crear_evento.php" method="post" >
		<label>Pista: 
				<span class="small"> </span>
		</label>		 
		<select id="pistas_evento" name="pistas_evento" onchange="this.form.submit()">
			<option selected> </option>
			<?php
	   		$pistas=pistasPorCentros($formularioEvento["centroID"], $conexion);
	   		desconectaBASEDATOS($conexion);
	   		foreach($pistas as $pista){ 	
	 		?>
	   		<option value='<?=$pista["pistaID"]?>' <?php  if(isset($formularioEvento["pistaID"]) && $formularioEvento["pistaID"]==$pista["pistaID"]){ ?> selected <?php } ?> ><?=$pista["descripcion"]?></option>  	
			<?php } ?>
		</select> 	
	</form>
	<form id="formulario_fecha" name="formulario_fecha" action="crear_evento.php" method="post" >
 		<label> Hora:
			<span class="small"> </span>
		</label>
		<select id="hora_evento" name="hora_evento" onchange="this.form.submit()">
			<option selected> </option>
	    	<?php 
	    	//mktime(hour,minute,second,month,day,year,is_dst)
	     	$inicial=mktime(6,0,0,0,0);
		 	$hora="";
       			for($i=0;$i<41;$i++){
        	       $hora = date("H:i",$inicial);	
        	?>
        	<option value='<?=$hora?>' <?php  if(isset($formularioEvento["hora"]) && $formularioEvento["hora"]==$hora){ ?> selected <?php } ?> ><?=$hora?></option>
           	
            <?php $inicial=mktime(date("H",$inicial),date("i",$inicial)+30,0,0,0);
			   }
 		      ?>
		</select> 
	</form>
	
<!--Formulario de envio del envento a crear -->
<form id="formulario_evento" name="crea_evento" action="valida_crear_evento.php" method="post" onclick="return valida_crea_evento(this)">
 	<input type="hidden" id="centroID" name="centroID"  value="<?=$formularioEvento["centroID"]?>" /> 
 	<input type="hidden" id="pistaID" name="pistaID"  value="<?=$formularioEvento["pistaID"]?>" />
	<label> Fecha:
		<span class="small">(ej. 19/01/2012) </span>
	</label>
	<input type="text" id="fecha" name="fecha" value="<?=$formularioEvento["fecha"]?>"/>
 	<input type="hidden" id="hora" name="hora"  value="<?=$formularioEvento["hora"]?>"/>

 		<button type="submit">Crear Evento</button>
</form>
</div>
</div>
</div>
<?include_once("pie.php"); ?>
	</div>
</div>

</body>
</html>

