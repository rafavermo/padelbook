<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
       PadeLBooK
    </title>
    <link rel="stylesheet" type="text/css" title="Original" href="estilo/Estilo_principal.css" />
    <script type="text/javascript" src="ajax.js" ></script>
    

</head>
<?

  $login=$_SESSION["login"];
  $errores=$_SESSION["errores"];
 
// Asignamos valor por defecto a los elementos

if(!isset($login)){   
     $login["usuario"]="";
	 $login["password"]="";
	 	 
	 $_SESSION["login"]=$login;
}
?>
<body onload=mostrarMenuConJavascript();> 
<div class="wrapper">
	<div class="page">
			<? include_once("Cabecera.php");
   				include_once("cabecera_fina.php"); ?>
	<div id="cuerpo">
		<? include_once("Columna_izquierda.php");
		   include_once("Columna_derecha.php");
		?>
		<div id="contenido">
			<div id="stylized">
				<h1>Login de Usuario</h1>
				<p>Debe introducir los datos para logarse.</p>
				<div id="errores">
			 		<?
			 		$errores=$_SESSION["errores"];
					//si existen errores por la validacion PHP por parte del servidor en el registro los imprimimos
					if(isset($errores) && count($errores)>0 && $errores!=""){
	  					foreach($errores as $elemento){
	  	   					printf("$elemento");
	   					}
    				}
					//Destruimos la variable con los errores
					unset($_SESSION["errores"]);?>
  				</div>
  		<p></p>
			<form id="formulario_login" name="formulario_login" action="valida_login.php" method="post"> 
				<label>Usuario: 
					<span class="small"> </span>
				</label>
				<input type="text" name="usuario" id="usuario" value='<?=$login["usuario"]?>' />
				<label>Password: 
					<span class="small"> </span>
				</label>
        		<input type="password" name="password" id="password" value='<?=$login["password"]?>' />
         			<button type="submit">Login</button>
   			</form>
    	
    	 <p>A&uacute;n no est&aacute;s registrado</p><a href="registro.php"> Registrarse!</a>
    
       	</div>
</div>
</div>
<?include_once("pie.php"); ?>
	</div>
</div>
</body>
</html>
