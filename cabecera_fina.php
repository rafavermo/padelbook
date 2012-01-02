<div id="cabecera_fina">
	<div id="form_reloj">
		<form name="form_reloj" id="form_reloj" style="display:inline;">  <input type="text" name="reloj" id="reloj" onfocus="window.document.form_reloj.reloj.blur()"> <!-- La funcion blur() es para que no se ponga el foco del raton en el reloj ya que es un input tipo text --> </form>
	</div> 
		<?php
		if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
			$user = $_SESSION['usuario'];
   			// echo "<form action='cerrar_sesion.php' method='post' style='float:right; display:inline'> $user    <a href='' onclick='perfil()'>Perfil&nbsp;</a>/ <a href='index.php?contenido=grupos.php' onclick='submit'>Grupos</a> <input type='submit' name='cerrar_sesion' value='cerrar sesion'></form>";
   			echo "<div id='menu_inicio' class='opcionactiva0'>
   					<a href='cerrar_sesion.php'>Cerrar Sesion</a></div>
   					<div id='menu_inicio' class='opcionactiva0'> 
   					<a href='' onclick='perfil()'>Perfil</a></div> 
   					<div id='menu_inicio' class='opcionactiva0'>
   					<a href='index.php?contenido=grupos.php' onclick='submit'>Grupos</a> </div>";
  		}else{
  			// echo "<form action='index.php?contenido=login.html' method='post' style='float:right; display:inline'><input type='submit' name='login' value='login'></form>";
  			echo "<div id='menu_inicio' class='opcionactiva0'><a href='index.php?contenido=login.html'>Login</a></div>";
  		}
		?>
</div>
