
<?php
  include_once("gestionBD.php");
  include_once("gestionEvento.php");
?>

 CREA TU EVENTO


<form name="formulario_crea_evento" action="valida_evento.php" method="post" > 	
 	
<select name="ciudad" onChange="    " >
	<option selected> </option>
	<?php
	
	   $conexion=conectaBASEDATOS();
	   $ciudades=nombresDeCiudades($conexion);
	  
	   foreach($ciudades as $ciudad){
	   	
	 ?>
	   <option value='<?=$ciudad["ciudad"]?>'><?=$ciudad["ciudad"]?></option>  	
			
	<?php } ?>
	
</select> 


<select name="centros" id="IDcentros">
	<option selected> </option>
	<?php
	   
	   $ciudad="Sevilla";
	  
	   $centros=nombresDeCentrosPorCiudad($ciudad, $conexion);
	
	   foreach($centros as $centro){
	   	
	 ?>
	   <option value='<?=$centro["centroID"]?>'><?=$centro["nombre"]?></option>  	
			
	<?php } ?>
	
</select> 


<select name="pistas" onchange="selecciona_pista();">
	<option selected> </option>
	<?php
	   
	   $centroID="2";
	  
	   $pistas=pistasPorCentros($centroID, $conexion);
	
	   foreach($pistas as $pista){
	   	
	 ?>
	   <option value='<?=$pista["pistaID"]?>'><?=$pista["descripcion"]?></option>  	
			
	<?php } ?>
	
</select> 



<p><input type="submit" value="Crear Evento">
</form>


 


