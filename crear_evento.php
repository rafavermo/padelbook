
<?php
  include_once("gestionBD.php");
  include_once("gestionEvento.php");
  
 // if(!session_start()){
  	session_start();
 // }
  
  $_SESSION["contenido"]="crear_evento.php";
  
  if(isset($_REQUEST["ciudad"]) && $_REQUEST["ciudad"]!=""){
     $_SESSION["ciudad"]=$_REQUEST["ciudad"];
  }
  
  if(isset($_REQUEST["centro"]) && $_REQUEST["centro"]!=""){
     $_SESSION["centroID"]=$_REQUEST["centro"];
  }
  
  if(isset($_REQUEST["pistas"]) && $_REQUEST["pistas"]!=""){
     $_SESSION["pistaID"]=$_REQUEST["pistas"];
  }
  
?>

 CREA TU EVENTO


<form name="formulario_ciudad"  method="get" action="index.php" > 	

<select name="ciudad" onchange="this.form.submit()">
	<option selected> </option>
	<?php
	
	   $conexion=conectaBASEDATOS();
	   $ciudades=nombresDeCiudades($conexion);
	  
	   foreach($ciudades as $ciudad){
	   	
	 ?>
	   <option value='<?=$ciudad["ciudad"]?>'><?=$ciudad["ciudad"]?></option>  	
			
	<?php } ?>
	
</select> 

</form>



<form name="formulario_centros"  method="get" action="index.php" >
	
<select name="centro" onchange="this.form.submit()">
	<option selected> </option>
	<?php
	   
	   //$ciudad="Sevilla";
	  
	   $centros=nombresDeCentrosPorCiudad($_SESSION["ciudad"], $conexion);
	
	   foreach($centros as $centro){
	   
	 ?>
	   <option value='<?=$centro["centroID"]?>'><?=$centro["nombre"]?></option>  
			
	<?php } ?>
	
</select> 

</form>


<form name="formulario_centros"  method="get" action="index.php" >

<select name="pistas" onchange="selecciona_pista();">
	<option selected> </option>
	<?php
	   
	   
	  
	   $pistas=pistasPorCentros($_REQUEST["centro"], $conexion);
	
	   foreach($pistas as $pista){
	   	
	 ?>
	   <option value='<?=$pista["pistaID"]?>'><?=$pista["descripcion"]?></option>  	
			
	<?php } ?>
	
</select> 

</form>

<p><input type="submit" value="Crear Evento">



 


