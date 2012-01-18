<div id="aciertos">
<?php
  //muestra una mensaje en el index si existe exito en crear un usuario, un evento o un grupo
  
   if($_REQUEST["exito"]=="usuario"){
   	 
	   echo "Usuario creado correctamente";
   	
   }
  
   if($_REQUEST["exito"]=="evento"){
   	 
	   echo "Evento creado correctamente";
   	
   }
  
   if($_REQUEST["exito"]=="grupo"){
   	 
	   echo "Grupo creado correctamente";
   	
   }
  
   if($_REQUEST["exito"]=="unirse_a_grupo"){
   	 
	   echo "Te has unido al grupo correctamente";
   	
   }
   
   
   if($_REQUEST["exito"]=="elimina_usuario_grupo"){
   	 
	   echo "Te has desvinculado del grupo correctamente";
   	
   }

   if($_REQUEST["exito"]=="desvincularevento"){
    
	   echo "Te has desvinculado del evento correctamente";
   	
   }
   
   if($_REQUEST["exito"]=="inscripcionevento"){
    
	   echo "Te has inscrito en el evento correctamente";
   	
   }
   
      if($_REQUEST["exito"]=="eliminarevento"){
    
	   echo "Has eliminado el evento correctamente";
   	
   }
?>  
</div>