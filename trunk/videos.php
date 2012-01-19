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
				<h1>Videos</h1>
				<p>Algunos videos interesantes sobre padel.</p>
				
				<!-- div para mostrar errores en php y otros mensajes de exito-->
				<?php include_once("exito.php"); ?>
				<div id="errores">
			 		<?php include_once("errores_php.php"); ?>
  				</div>
  				
  				
 <h2>Padel Pro Tour 2011 Valencia - RESUMEN</h2>
 
<object id="video">
	<param name="movie" value="http://www.youtube.com/v/8hTgIH0luOs?version=3&feature=player_detailpage">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed class="video" src="http://www.youtube.com/v/8hTgIH0luOs?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always">	
</object>

<h2> 10 mejores puntos de la final Padel Pro Tour PPT Benicassim 2011</h2>
<object >
	<param name="movie" value="http://www.youtube.com/v/QB97Or6XpSE?version=3&feature=player_detailpage">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed class="video" src="http://www.youtube.com/v/QB97Or6XpSE?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="99%" height="360">
</object>

<h2>1ª Parte del resumen de las mejores jugadas programa Padel ProTour 2010</h2>
<object>
	<param name="movie" value="http://www.youtube.com/v/hqEYVZlMOi8?version=3&feature=player_detailpage">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed class="video" src="http://www.youtube.com/v/hqEYVZlMOi8?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="360">	
</object>

<h2>2ª Parte del resumen de las mejores jugadas programa Padel ProTour 2010</h2>
<object>
	<param name="movie" value="http://www.youtube.com/v/PfKj82Nvfec?version=3&feature=player_detailpage">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed class="video" src="http://www.youtube.com/v/PfKj82Nvfec?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="360">	
</object>

<h2> Pro Tour Madrid 2011 - RESUMEN</h2>
<object>
	<param name="movie" value="http://www.youtube.com/v/KQS-z-0HzuA?version=3&feature=player_detailpage">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed class="video" src="http://www.youtube.com/v/KQS-z-0HzuA?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="360">	
</object>

<h2> Padel Pro Tour 2011 Madrid</h2>
<object>
	<param name="movie" value="http://www.youtube.com/v/szAbFjxBdN4?version=3&feature=player_detailpage">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed class="video" src="http://www.youtube.com/v/szAbFjxBdN4?version=3&feature=player_detailpage" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="360">
</object>

</div>
	</div>
	<? include_once("pie.php");?>
	</div>
</div>
</div>

</body>
</html>
