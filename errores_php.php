				<?php
			 		$errores=$_SESSION["errores"];
					//si existen errores por la validacion PHP por parte del servidor en el registro los imprimimos
					if(isset($errores) && count($errores)>0 && $errores!=""){
	  					foreach($errores as $elemento){
	  	   					printf("$elemento");
	   					}
    				}
					//Destruimos la variable con los errores
					unset($_SESSION["errores"]);
					
					?>
