<?php session_start();?>
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
    <script type="text/javascript" src="valida_crea_evento.js" ></script>
    

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
				<h1>Inicio</h1>
				<p>Bienvenido a la p&aacute;gina web PadelBook.</p>
				
				<h2>Si eres aficionado al padel y te gusta jugar a menudo partidos de padel
					con tus amigos, esta es tu web.
				En ella podras crear y unirte a los diferentes grupos donde podr&aacute;s relacionarte con tus compa&ntilde;eros y crear eventos 
				en la que ellos se podr&aacute;n inscribir para jugar partidos de padel 
				</h2>
				<!-- div para mostrar errores en php y otros mensajes de exito-->
				<?php include_once("exito.php"); ?>
				<div id="errores">
			 		<?php include_once("errores_php.php"); ?>
  				</div>
  
				</div>
		
	

	<!--<div id="header">
		<h1></h1>
	</div> -->
	
			</div>
	</div>
	<? include_once("pie.php");?>
	</div>
</div>


</body>
</html>

