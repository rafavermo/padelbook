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
    <script type="text/javascript" src="valida_formulario.js" ></script>

</head>
		<?

  $formulario=$_SESSION["formulario"];
  $errores=$_SESSION["errores"];
 
// Asignamos valor por defecto a los elementos

if(!isset($formulario)){   
     $formulario["nombre"]="";
	 $formulario["apellidos"]="";
	 $formulario["usuario"]="";
	 $formulario["password"]="";
	 $formulario["cpassword"]="";
	 $formulario["fecha_nacimiento"]="";
	 $formulario["ciudad"]="";
	 $formulario["correo"]="";
	 
	 $_SESSION["formulario"]=$formulario;
}
?>
    <title>
       PadeLBooK
    </title>
    <link rel="stylesheet" type="text/css" title="Original" href="estilo/Estilo_principal.css" />
    <script type="text/javascript" src="ajax.js" ></script>
    <script type="text/javascript" src="valida_formulario.js" ></script>

</head>
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
	<form id="form" action="validar_formulario.php" method="post" name="datos" onSubmit="return valida_formulario(this);">
		<h1>Registro de Usuario</h1>
		<p>Debe introducir sus datos para poder registrarse. Campos obligatorios *</p>
		<div id="errores">
			 <?php include("errores_php.php"); ?>
  		</div>
  		<p></p>
			<label>Nombre * 
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="nombre" id="nombre"  value='<?=$formulario["nombre"]?>' />
			<label>Apellidos *
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="apellidos" id="apellidos" value='<?=$formulario["apellidos"]?>' />
			<label>Usuario *
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="usuario" id="usuario" value='<?=$formulario["usuario"]?>' />
			<label>Password *
				<span class="small">Minimo 6 car&aacute;cteres</span>
			</label>
			<input class="text" type="password" name="password" id="password" value='<?=$formulario["password"]?>' onkeyup="muestra_seguridad_clave(this.value, this.form)"/>
			<label>Confirmar Password
				<span class="small"> </span>
			</label>
			<input class="text" type="password" name="cpassword" id="cpassword" value='<?=$formulario["cpassword"]?>' />
			<label>Fecha Nacimiento
				<span class="small">Fecha (ej. 19/01/2012)</span>
			</label>
			<input class="text" type="text" name="fecha_nacimiento" id="fecha_nacimiento" maxlength="10" value='<?=$formulario["fecha_nacimiento"]?>'/>
			<label>Ciudad
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="ciudad" id="ciudad" value='<?=$formulario["ciudad"]?>' />
			<label>Email *
				<span class="small"> </span>
			</label>
			<input class="text" type="text" name="correo" id="correo" value='<?=$formulario["correo"]?>'/>
				<button type="submit">Enviar</button>
			<div class="spacer"> </div>
	</form>

<!--          	<i>seguridad:</i> -->
<!-- <input type="text" onfocus="blur()" style="border: 0px; background-color:ffffff; text-decoration:italic;" name="seguridad">-->	
       	</div>
</div>
</div>
<?include_once("pie.php"); ?>
	</div>
</div>
</body>
</html>
	

  
			