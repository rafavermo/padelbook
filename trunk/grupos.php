<?php 
session_start();

  include_once("gestionBD.php");
  include_once("gestionUsuario.php");
  include_once("gestionGrupo.php");

  //$_SESSION["contenido"]="grupos.php";

 if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
  	
	$usuario=$_SESSION["usuario"];

//Obtenemos el id del usuario conectado/////////////// 
   $conexion=conectaBASEDATOS();
 
     $usuarioID=seleccionaUsuarioIDporNombre($usuario, $conexion);
   
     foreach ($usuarioID as $id){
	    	  $_SESSION["usuarioID"]=$id["usuarioID"];
	  }
 
/////////////////////////////////////////////////////	
  
//Obtenemos todos los nombres de grupos a los que pertenece el usuario////////

    $GruposDelUsuario=seleccionaGruposPorIDUsuario($_SESSION["usuarioID"], $conexion);
	
   desconectaBASEDATOS($conexion);
/////////////////////////////////////////////////////////  
 ?> 
 <p> Lista de grupos a los que pertenezco:
  
 
  <table border="1" bordercolor="gray">
     <tr><td> <b>Nombre </b> </td> <td> <b>Descripcion </b></td> <td></td>  </tr>
  
 <?php 
////Recorremos todos los grupo del usuario y lo mostramo en forma de tabla
     foreach ($GruposDelUsuario as $grupo ) {
     	$_SESSION["grupoID"]=$grupo["grupoID"];
   ?>  	
        <tr>  <td> <b> <?=$grupo["nombre"];?> </b> </td> <td> <?=$grupo["descripcion"]; ?>  </td> <td> <a href="index.php?contenido=abandonar_grupo.php">Abandonar</a>  </td>  </tr>  
	   
	    
<?php }//Fin foreach ?>
   
 </table>

  <p>&nbsp;&nbsp;<a href="index.php?contenido=crear_grupo.php" onclick="submit">Crear grupo</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	&nbsp;&nbsp;<a href="index.php?contenido=unirse_a_grupo.php" onclick="submit">Unirse a un grupo</a>
  	
  	

<?php

}else{
	
	echo "Debe estar registrado para poder acceder a la gestion de grupos!";
	
}//Fin si existe $SESSION["usuario"] y no es vacio
	


?>