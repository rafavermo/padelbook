
<?php
 
 session_start();

  include_once("gestionBD.php");
  include_once("gestionEvento.php");
  
  
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
  
  
  

 //Creamos la variable de SESSION para el formulario con los valores por defecto

if(!isset($_SESSION["crea_evento"]) || $_SESSION["crea_evento"]==""){
  $formularioEvento=$_SESSION["crea_evento"];

    $formularioEvento["centroID"]="";
 	$formularioEvento["pistaID"]="";
 	$formularioEvento["fecha"]=""; 
	$formularioEvento["hora"]="";
	
 $_SESSION["crea_evento"]=$formularioEvento;

}

?>
  
  
  
  


<!-- Para mostrar errores del javascript -->
<div id="divTransparente">
  		 	
</div>

<fieldset>
            <legend><b> DATOS DEL EVENTO</b></legend>


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


<form name="formulario_pistas"  method="post" action="index.php" >


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

<!--Formulario de envio del envento a crear -->
 <form name="crea_evento" action="valida_crear_evento.php" method="get" onSubmit="return valida_crea_evento(this);">
 	
 	<input type="hidden" name="centroID" id="centroID" value='<?=$_SESSION["centroID"]?>' /> 
 	<input type="hidden" name="pistaID" id="pistaID" value='<?=$_SESSION["pistaID"]?>' />
 	
 
 	
 	   <div id="FechaCreaEvento"> 
 	   	Fecha: <input type="text" name="fecha" id="fecha" value="<dd/mm/aaaa>"/> 
 	   </div>
 	
 	
 	Hora:<select name="hora" id="hora">
 		    <?php 
 		    //mktime(hour,minute,second,month,day,year,is_dst)
 		      $inicial=mktime(6,0,0,0,0);
   
                   for($i=0;$i<41;$i++){
   
                   $hora = date("H:i",$inicial);	
	
	          ?>
	               <option value='<?=$hora?>'> <?=$hora?> </option>
	               	
             <?php $inicial=mktime(date("H",$inicial),date("i",$inicial)+30,0,0,0);
				   }
 		      ?>
 		  
 	   </select> 
 	
 	<p><input type="submit" value="Crear Evento" >
 </form>

</fieldset>



 





 


