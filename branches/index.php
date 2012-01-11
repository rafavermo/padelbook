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

</head>

  
<body onload=mostrarMenuConJavascript();> 
<div class="wrapper">
	<div class="page">
	<div id="header">
		<div id="logotipo">
			
		</div>
		
		<div id="logo">
			<h1>Padelbook</h1>
			<p><a href="">una nueva experiencia</a>
			</p> 
		</div>
		<div id="iconos_redes_sociales">
			<ul>
				<li>
					<a href="">
						<img src="imagenes/twitter_icon.png" alt="twitter">
					</a>
				</li>
				<li>
					<a href="">
						<img src="imagenes/facebook_icon.png" alt="facebook">
					</a>
				</li>
				<li>
					<a href="">
						<img src="imagenes/youtube_icon.png" alt="youtube">
					</a>
				</li>
			</ul>
		</div>
		<!-- <form id="search_mini_form" method="get" action="http://www.cooking-hacks.com/index.php/catalogsearch/result/">
			<div class="form-search">
				<label for="search">Search:</label>
				<input id="search" class="input-text" type="text" value="" name="q" autocomplete="off">
				<button class="button" title="Search" type="submit">
				<span>
					<span>Search</span>
				</span>
				</button>
				<div id="search_autocomplete" class="search-autocomplete" style="display: none;"></div>
			</div>
		</form> -->
	</div>
		
	

	<!--<div id="header">
		<h1></h1>
	</div> -->
 
	
<?php include_once("cabecera_fina.php"); ?>
	
	
	<div id="cuerpo">
		<div id="columna_izquierda">
  			<noscript><?php include("menuindexsinjavascript.html"); ?> </noscript>
				<!--div trasnparente que se muestra si esta activado javascript -->
 				<div id="divmenuConJavascript" >
 					<?php include("menuindexconjavascript.html"); ?>
 				</div>	
		</div> <!-- div columna_izquierda -->

		<div id="columna_derecha">
     		<ul>
     			<li><a href="./reglamento/REGLAMENTO_JUEGO_FIP_2008.pdf">Reglamento FIP 2008</a></li>
     	 		<li><a href="http://www.padelfip.org">Web oficial de la FIP</a></li>
     	 		<li><a href="http://www.padelfederacion.es">Web oficial de la FEP</a></li>
     	 		<li><a href="http://www.bwinpadelprotour.com/">Web Padel Pro Tour</a></li>
     		</ul>
		</div>

		<div id="contenido">
<? 			//Mostramos el mensaje de exito si existe REQUEST[exito] con algun valor determinado
			if(isset($_REQUEST["exito"]) && $_REQUEST["exito"]!=""){
				include_once("exito.php");
			}
   			//incluye en el div contenido, el contenido de la pagina especificada por $contenido (variable de sesion)
   			   
?>
		</div> <!-- div Contenido -->
	</div>
	
	<?include_once("pie.php"); ?>
	</div>
</div>

</body>
</html>