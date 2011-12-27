<?php
if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
	$user = $_SESSION['usuario'];
   echo "<form action='cerrar_sesion.php' method='post' style='text-align:right'>Hola $user <input type='submit' name='cerrar_sesion' value='cerrar sesion'></form>";
  }else{
  	echo "<form action='menusinjavascript.php' method='post' style='text-align:right'><input type='submit' name='login' value='login'></form>";
  }
?>