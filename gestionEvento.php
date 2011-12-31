<?php

 /* Insertando datos en la tabla Eventos */  
  
 function insertarEvento($usuarioID,$centroID,$pistaID,$fecha,$propietario,$conexion)
 {
 try{
		$sql='INSERT INTO Eventos (usuarioID,centroID,pistaID,fecha,propietario) VALUES(:usuarioID,:centroID,:pistaID,:fecha,:propietario)';
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->bindParam(':centroID',$centroID);
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->bindParam(':fecha',$fecha);
		$stmt->bindParam(':propietario',$propietario);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }


function nombresDeCentrosPorCiudad($ciudad, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT centroID,nombre FROM Centros WHERE ciudad=:ciudad');
		$stmt->bindParam(':ciudad',$ciudad);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

function pistasPorCentros($centroID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT CentroPistas.centroID, Pistas.pistaID, Pistas.descripcion FROM CentroPistas INNER JOIN Pistas WHERE CentroPistas.pistaID=Pistas.pistaID AND centroID=:centroID');
		$stmt->bindParam(':centroID',$centroID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

function nombresDeCiudades($conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT DISTINCT ciudad FROM Centros ORDER BY ciudad ASC');
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

function consultaExisteEvento($centroID,$pistaID,$fecha,$conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM Eventos WHERE centroID=:centroID AND pistaID=:pistaID AND fecha=:fecha');
		$stmt->bindParam(':centroID',$centroID);
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->bindParam(':fecha',$fecha);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }
	

 //Devuelve todos los eventos proximos de un usuario determinado a partir del momento actual, usando la funcion now() --> que devuelve la fecha y hora actual del sistema	
function EventosDisponiblesPorUsuarioAPartirDeAhora($usuarioID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM Eventos WHERE usuarioID=:usuarioID AND fecha>=now()');
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }	
	
	
	
	
	








	
?>