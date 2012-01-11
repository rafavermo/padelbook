<?php
// FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
function conectaBASEDATOS(){
	/* 1. Conexión a la base de datos */  
    $dsn = 'mysql:dbname=propadel;host=localhost';  
 	$user = 'root';  
	$password = '';  
	$conexion = null;
	try{
		$conexion=new PDO($dsn,$user,$password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		$_SESSION["excepcion"]=$e;
		header("Location: error.php");
	}
	return $conexion;
}		
//Fin funcion conectaBASEDATOS

function desconectaBASEDATOS($conexion){
	 $conexion=NULL;
}

?>