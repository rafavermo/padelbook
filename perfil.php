<?
	session_start();
	
  include_once("gestionBD.php"); 
  include_once("gestionUsuario.php");
	
	
	
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
    <script type="text/javascript" src="valida_modifica_perfil.js" ></script>

</head>
<title>
       PadeLBooK
    </title>
    <link rel="stylesheet" type="text/css" title="Original" href="estilo/Estilo_principal.css" />
    <script type="text/javascript" src="ajax.js" ></script>
    <script type="text/javascript" src="valida_formulario.js" ></script>

</head>

<?php
if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!="" ){
  	$usuario=$_SESSION["usuario"];
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
	
  <h1>Perfil del usuario <?php echo $usuario; ?> </h1>	
	
	<!-- DATOS DEL PERFIL DEL USUARIO -->
	
	<?php
	  //Obtenemos todos los datos del usuario
	   $conexion=conectaBASEDATOS();
	     $datos_Usuario=DatosUsuario($usuario, $conexion);
	   desconectaBASEDATOS($conexion); 
		 
	   foreach ($datos_Usuario as $datos){
	       $datos_Usuario=$datos; 
		    
	   }
	   
	   $_SESSION["datos_perfil"]["usuarioID"]=$datos["usuarioID"];
	   $_SESSION["datos_perfil"]["nombre"]=$datos["nombre"];
	   $_SESSION["datos_perfil"]["apellidos"]=$datos["apellidos"];
	   $_SESSION["datos_perfil"]["usuario"]=$datos["usuario"];
	   $_SESSION["datos_perfil"]["password"]=$datos["password"];
	   $_SESSION["datos_perfil"]["fechaNacimiento"]=$datos["fechaNacimiento"];
	   $_SESSION["datos_perfil"]["ciudad"]=$datos["ciudad"];
	   $_SESSION["datos_perfil"]["email"]=$datos["email"];
	   
	   
	  // echo "----->>>>" . $_SESSION["datos_perfil"]["nombre"] . "---" . $_SESSION["datos_perfil"]["password"];
	   
	   //$_SESSION["datos_perfil"]=$datos_Usuario; 
	   
	   //tratamiento de la fecha
	   list($fecha,$hora)=explode(" ",$datos_Usuario["fechaNacimiento"]);
	   list($anio,$mes,$dia)=explode("-",$fecha);
	   
	   $fecha_formateada= $dia."/".$mes."/".$anio;
	   
	    if($fecha_formateada=="00/00/0000"){
	    	$fecha_formateada="";
	    }
	   
	?>
	
	
	
	<!-- Formualrio para actulizar datos del usuario -->
	<form id="form" action="valida_modifica_perfil.php" method="get" name="datos">
		
		<!-- div para mostrar errores o cualquier otro mensaje -->
			<?php include_once("exito.php"); ?>
		<div id="errores">
			 <?php include("errores_php.php"); ?>
  		</div>
  		<p></p>
			<label>Nombre * 
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="nombre" id="nombre"  value='<?=$datos_Usuario["nombre"]?>' />
			<label>Apellidos *
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="apellidos" id="apellidos" value='<?=$datos_Usuario["apellidos"]?>' />
			
		<input class="text" type="hidden" name="usuario" id="usuario" value='<?=$usuario?>' />
			
			<label>Nuevo Password 
				<span class="small">Minimo 6 car&aacute;cteres</span>
			</label>
			<input class="text" type="password" name="password" id="password"  onkeyup="muestra_seguridad_clave(this.value, this.form)"/>
			<label>Confirmar Password
				<span class="small"> </span>
			</label>
			<input class="text" type="password" name="cpassword" id="cpassword"  />
			<label>Fecha Nacimiento
				<span class="small">Fecha (ej. 19/01/2012)</span>
			</label>
			<input class="text" type="text" name="fecha_nacimiento" id="fecha_nacimiento" maxlength="10" value='<?=$fecha_formateada?>'/>
			<label>Ciudad
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="ciudad" id="ciudad" value='<?=$datos_Usuario["ciudad"]?>' />
			<label>Email *
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="correo" id="correo" value='<?=$datos_Usuario["email"]?>'/>
				<button type="submit">Actualizar datos</button>
			<div class="spacer"> </div>
	</form>
	
	
	
	



	
	
	
</div>
</div>
</div>
<?include_once("pie.php"); ?>
	</div>
</div>
</body>
</html> 


<?php

}else{
	$errores[]="Debe estar registrado para poder acceder a la gesti&oacute;n de eventos!";
	$_SESSION["errores"]=$errores;
	Header("Location: login.php");
}//Fin si existe $SESSION["usuario"] y no es vacio

?>