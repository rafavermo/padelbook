
<?php
  include_once("gestionBD.php");
  include_once("gestionEvento.php");
  
 // if(!session_start()){
  	session_start();
 // }
  
  $_SESSION["contenido"]="crear_evento.php";
  
  if(isset($_REQUEST["ciudad"]) && $_REQUEST["ciudad"]!=""){
     $_SESSION["ciudad"]=$_REQUEST["ciudad"];
	 $_SESSION["pistaID"]=""; 
  }
  
  if(isset($_REQUEST["centro"]) && $_REQUEST["centro"]!=""){
     $_SESSION["centroID"]=$_REQUEST["centro"];
	 $_SESSION["pistaID"]="";
  }
  
  if(isset($_REQUEST["pistas"]) && $_REQUEST["pistas"]!=""){
     $_SESSION["pistaID"]=$_REQUEST["pistas"];
  }
  
?>

 CREA TU EVENTO


<form name="formulario_ciudad"  method="post" action="index.php" > 	

Seleccione la ciudad del evento:<select name="ciudad" id="ciudad" onchange="this.form.submit()">
	<option selected> </option>
	<?php
	
	   $conexion=conectaBASEDATOS();
	   $ciudades=nombresDeCiudades($conexion);
	  
	   foreach($ciudades as $ciudad){
	   	
	 ?>
	   <option value='<?=$ciudad["ciudad"]?>'  <?php  if(isset($_SESSION["ciudad"]) && $_SESSION["ciudad"]==$ciudad["ciudad"]){?> selected <?php } ?> > <?=$ciudad["ciudad"]?> </option>  	
			
	<?php } ?>
	
</select> 

</form>



<form name="formulario_centros"  method="post" action="index.php" >
	
Seleccione el centro deportivo:<select name="centro" id="centro" onchange="this.form.submit()">
	<option selected> </option>
	<?php
	   
	   //$ciudad="Sevilla";
	  
	   $centros=nombresDeCentrosPorCiudad($_SESSION["ciudad"], $conexion);
	
	   foreach($centros as $centro){
	   
	 ?>
	   <option value='<?=$centro["centroID"]?>' <?php  if(isset($_SESSION["centroID"]) && $_SESSION["centroID"]==$centro["centroID"]){?> selected <?php } ?>  ><?=$centro["nombre"]?></option>  
			
	<?php } ?>
	
</select> 

</form>


<form name="formulario_pistas"  method="get" action="index.php" >


Seleccione la pista: <select name="pistas" id"pistas" onchange="this.form.submit()">

	<option selected> </option>
	<?php
	   
	   $pistas=pistasPorCentros($_SESSION["centroID"], $conexion);
	
	   foreach($pistas as $pista){
	   	
	 ?>
	   <option value='<?=$pista["pistaID"]?>' <?php  if(isset($_SESSION["pistaID"]) && $_SESSION["pistaID"]==$pista["pistaID"]){ ?> selected <?php } ?> ><?=$pista["descripcion"]?></option>  	
			
	<?php }  desconectaBASEDATOS($conexion); ?>
	
</select> 

</form>


 <form name="crea_evento" action="valida_crear_evento.php" method="get">
 	
 	<input type="hidden" name="centroID" id="centroID" value='<?=$_SESSION["centroID"]?>' /> 
 	<input type="hidden" name="pistaID" id="pistaID" value='<?=$_SESSION["pistaID"]?>' />
 	
 	Fecha:<input type="text" name="fecha" id="fecha">
 	Hora:<input type="text" name="hora" id="hora">
 	
     <!--<select name="hora2">
 		    <?php $hora=date("H:i");  for($i=1;$i<=48;$i++){    } ?>
 		  
 	   </select> -->
 	
 	<p><input type="submit" value="Crear Evento" >
 </form>






 


