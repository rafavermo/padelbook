<?php 
session_start();

 //include_once("gestionBD.php");
  
  
  //$_SESSION["contenido"]="crear_grupo.php";


 //Creamos la variable de SESSION si no existe para el formulario con los valores por defecto

 if(!isset($_SESSION["crea_grupo"])){
  	
  $formularioGrupo=$_SESSION["crea_grupo"];

    $formularioGrupo["nombre_grupo"]="";
 	$formularioGrupo["descripcion_grupo"]="";
 	
	
 $_SESSION["crea_grupo"]=$formularioGrupo;

 }
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
<body onload=mostrarMenuConJavascript();> 
<div class="wrapper">
	<div class="page">
	<?	include_once("cabecera.php");
		include_once("cabecera_fina.php");?>
	
 		<div id="cuerpo">  
 			<? 
		   include_once("columna_derecha.php");
		   include_once("columna_izquierda.php");
			?>
			<div id="contenido">
				<div id="stylized">
				<h1>Registro de Grupos</h1>
				<p>Debe introducir los datos correspondiente al grupo que desea crear.</p>
				<div id="errores">
			 		<?php include_once("errores_php.php"); ?>
  				</div>
  				
  				<!-- Aqui empieza el nuevo contenido de crear grupo -->
  				
  				<p></p>
				<form action="valida_crear_grupo.php" method="get"> 
					<label> Nombre del grupo:
						<span class="small"> </span>
					</label>
        			<input type="text" name="nombre_grupo" id="nombre_grupo" />
         			<label> Descripci&oacute;n:
						<span class="small"> </span>
					</label>
        			<textarea name="descripcion_grupo" id="descripcion_grupo" ><?=$_SESSION["crea_grupo"]["descripcion_grupo"]; ?></textarea>
          				<button type="submit" >Crear Grupo</button>
   				 </form>
		</div>
	</div>
	<? include_once("pie.php");?>
	</div>
</div>
</body>
</html>


       	