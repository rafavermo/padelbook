<?php

/* Insertando datos en la tabla grupos */  
 
function insertarGrupo($nombre_grupo,$descripcion,$conexion)
{
	try{
		
		$sql='INSERT INTO grupos (nombre,descripcion) VALUES(:nombre,:descripcion)';
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(':nombre',$nombre_grupo);
		$stmt->bindParam(':descripcion',$descripcion);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

//Devuelve 1 si el grupo ya existe
function seleccionarExiteGrupo($nombre_grupo,$conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM grupos WHERE nombre=:nombre');
		$stmt->bindParam(':nombre',$nombre_grupo);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt->rowCount();
 }

	
?>