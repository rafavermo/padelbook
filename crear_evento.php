
<?php
  include_once("gestionBD.php");
  include_once("gestionEvento.php");
?>

 CREA TU EVENTO

<select name="ciudad">
	<?php
	
	   $conexion=conectaBASEDATOS();
	   $ciudades=nombresDeCiudades($conexion);
	  
	   foreach($ciudades as $ciudad){
	   	
	 ?>
	   <option value='<?=$ciudad["ciudad"]?>'><?=$ciudad["ciudad"]?></option>  	
			
	<?php } ?>
	
</select> 


<select name="centros">
	<?php
	   
	   $ciudad="Sevilla";
	  
	   $centros=nombresDeCentrosPorCiudad($ciudad, $conexion);
	
	   foreach($centros as $centro){
	   	
	 ?>
	   <option value='<?=$centro["centroID"]?>'><?=$centro["nombre"]?></option>  	
			
	<?php } ?>
	
</select> 


 <select name="pistas">
	<?php 
	   $centroID='2' ;
	   $pistas=pistasPorCentros($centroID, $conexion);
	   desconectaBASEDATOS($conexion);
	   foreach($pistas as $pista){  	
	 ?>
	   <option value='<?=$pista["pistaID"]?>'><?=$pista["pistaID"]?></option>  	
			
	<?php } ?>
	
</select> 


