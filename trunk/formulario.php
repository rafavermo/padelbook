<?php
   //Variable de sesion para el include del div contenido del index.php
   
   session_start();
   
   $_SESSION["contenido"]="registro.html";
   

    $formulario=$_SESSION["formulario"];


   
  //$errores=$_SESSION["errores"];
// Asignamos valor por defecto a los elementos

   
     $formulario["nombre"]="<nombre>";
	 $formulario["apellidos"]="<apellidos>";
	 $formulario["usuario"]="<usuario>";
	 $formulario["password"]="";
	 $formulario["cpassword"]="";
	 $formulario["fecha_nacimiento"]="<dd/mm/aaaa>";
	 $formulario["ciudad"]="<ciudad>";
	 $formulario["correo"]="<correo>";
	 
	 $_SESSION["formulario"]=$formulario;
	 

  
   header("Location: index.php");
    
	
 
	
?>  