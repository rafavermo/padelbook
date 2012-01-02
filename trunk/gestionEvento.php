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
	

 //Devuelve todos los eventos proximos de un USUARIO determinado a partir del momento actual, usando la funcion now() --> que devuelve la fecha y hora actual del sistema	
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
	


//Devuelve TODOS LOS EVENTOS PROXIMOS DE UN GRUPO a partir del momento actual	
function TodosLosEventosDeUnGrupoApartirDeAhora($grupoID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT DISTINCT * FROM eventos WHERE fecha>=now() AND usuarioID IN (SELECT usuarioID FROM usuariogrupos WHERE grupoID=:grupoID) ORDER BY fecha ASC');
		$stmt->bindParam(':grupoID',$grupoID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }		
	

//SELECT DISTINCT * FROM eventos WHERE fecha>=now() AND propietario=1 AND usuarioID IN (SELECT usuarioID FROM usuariogrupos WHERE grupoID IN (SELECT grupoID FROM usuariogrupos WHERE usuarioID=:usuarioID) ) ORDER BY fecha ASC

//DEVUELVE TODOS LOS EVENTOS PROXIMOS DE TODOS LOS GRUPOS AL QUE PERTENEZCA EL USUARIO
function TodosLosEventosDeGRUPOSdelUsuarioApartirDeAhora($usuarioID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT DISTINCT * FROM eventos WHERE fecha>=now() AND propietario=1 AND usuarioID IN (SELECT usuarioID FROM usuariogrupos WHERE grupoID IN (SELECT grupoID FROM usuariogrupos WHERE usuarioID=:usuarioID) ) ORDER BY fecha ASC');
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }	





	
?>