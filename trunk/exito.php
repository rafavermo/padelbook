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
	
?>  