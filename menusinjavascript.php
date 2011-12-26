<?php
   //Variable de sesion para el include del div contenido del index.php
   
   session_start();
   
   if($_REQUEST["login"]=="login"){
   	 $_SESSION["contenido"]="login.html";
   }
   
   if($_REQUEST["historia"]=="historia"){
   	 $_SESSION["contenido"]="historia.html";
   }
   
   if($_REQUEST["videos"]=="videos"){
   	 $_SESSION["contenido"]="videos.html";
   }
  
  
   header("Location: index.php");
    
	
?>  