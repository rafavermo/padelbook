<div id="cabecera_fina">
	<div id="form_reloj">
		<form name="form_reloj" id="form_reloj" style="display:inline;">  <input type="text" name="reloj" id="reloj" onfocus="window.document.form_reloj.reloj.blur()"> <!-- La funcion blur() es para que no se ponga el foco del raton en el reloj ya que es un input tipo text --> </form>
	</div> 
		<?php
		if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
			$user = $_SESSION["usuario"];?>
   			<div id="menu_inicio" class="opcionactiva0">
   					<a href="cerrar_sesion.php">Cerrar Sesion</a></div>
   					<div id="menu_inicio" class="opcionactiva0"> 
   					<a href="perfil.php" onclick="submit()">Perfil</a></div> 
   					<div id="menu_inicio" class="opcionactiva0">
   					<a href="grupos.php" onclick="submit()">Grupos</a> </div>
  		<?}else{?>
  			<div id="menu_inicio" class="opcionactiva0"><a href="login.php">Login</a></div>
  		<?}?>
</div>
