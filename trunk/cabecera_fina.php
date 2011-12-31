<form name="form_reloj" id="form_reloj" style="display:inline;">  <input type="text" name="reloj" id="reloj" size="10" style="background-color : Yellow; color : Black; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()"> <!-- La funcion blur() es para que no se ponga el foco del raton en el reloj ya que es un input tipo text --> </form> 

<?php
if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
	$user = $_SESSION['usuario'];
   echo "<form action='cerrar_sesion.php' method='post' style='float:right; display:inline'> $user    <a href='' onclick='perfil()'>Perfil&nbsp;</a>/ <a href='index.php?contenido=grupos.php' onclick='submit'>Grupos</a> <input type='submit' name='cerrar_sesion' value='cerrar sesion'></form>";
  }else{
  	echo "<form action='index.php?contenido=login.html' method='post' style='float:right; display:inline'><input type='submit' name='login' value='login'></form>";
  }
?>

