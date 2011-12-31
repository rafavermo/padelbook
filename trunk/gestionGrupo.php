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
function seleccionarExisteGrupo($nombre_grupo,$conexion)
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

//Devuelve 1 si el usuario ya esta en ese grupo
function seleccionarExisteUsuarioEnGrupo($usuarioID,$grupoID,$conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM usuariogrupos WHERE usuarioID=:usuarioID AND grupoID=:grupoID');
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->bindParam(':grupoID',$grupoID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt->rowCount();
 }

function seleccionaGrupoIDporNombre($nombreGrupo, $conexion)
{
	try{

		$stmt=$conexion->prepare('SELECT grupoID FROM grupos WHERE nombre=:nombre');
		$stmt->bindParam(':nombre',$nombreGrupo);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }
 
 //Funcion para insertar un usuario en un grupo en la tabla usuariogrupos
 function insertarUsuarioEnGrupo($grupoID,$usuarioID,$conexion)
{
	try{
		
		$sql='INSERT INTO usuariogrupos (grupoID,usuarioID) VALUES(:grupoID,:usuarioID)';
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(':grupoID',$grupoID);
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }
 
 


	
?>