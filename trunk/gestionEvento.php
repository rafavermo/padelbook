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
	return $stmt->rowCount();
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
	

//SELECT * FROM eventos WHERE fecha>=now() AND propietario=1 AND usuarioID IN (SELECT usuarioID FROM usuariogrupos WHERE grupoID IN (SELECT grupoID FROM usuariogrupos WHERE usuarioID=:usuarioID) ) ORDER BY fecha ASC

//DEVUELVE TODOS LOS EVENTOS PROXIMOS DE TODOS LOS GRUPOS AL QUE PERTENEZCA EL USUARIO
function TodosLosEventosDeGRUPOSdelUsuarioApartirDeAhora($usuarioID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM eventos WHERE fecha>=now() AND propietario=1 AND usuarioID IN (SELECT usuarioID FROM usuariogrupos WHERE grupoID IN (SELECT grupoID FROM usuariogrupos WHERE usuarioID=:usuarioID) ) ORDER BY fecha ASC');
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }	

//Devuelve el nombre del centro por el ID
function nombreDelCentroPorID($centroID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT nombre FROM centros WHERE centroID=:centroID');
		$stmt->bindParam(':centroID',$centroID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

 //Devuelve el nombre de la ciudad por el ID del centro
function nombreDeCiudadPorCentroID($centroID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT ciudad FROM centros WHERE centroID=:centroID');
		$stmt->bindParam(':centroID',$centroID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 } 

function nombreDePistaPorPistaID($pistaID, $conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT descripcion FROM pistas WHERE pistaID=:pistaID');
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 } 


//Devuelve el ID del centro por el nombre
function consultaIDDelCentro($centro, $conexion){
	try{
		$stmt=$conexion->prepare('SELECT centroID FROM centros WHERE nombre=:centro');
		$stmt->bindParam(':centro',$centro);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;

}

//Devuelve el ID de la pista por el nombre
function consultaIDDePista($pista, $conexion){
	try{
		$stmt=$conexion->prepare('SELECT pistaID FROM pistas WHERE descripcion=:pista');
		$stmt->bindParam(':pista',$pista);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
}	

function PersonasDeUnEvento($centroID,$pistaID,$fecha,$conexion){

	try{
		$stmt=$conexion->prepare('SELECT usuario FROM usuarios WHERE usuarioID IN (SELECT usuarioID FROM eventos WHERE centroID=:centroID AND pistaID=:pistaID AND fecha=:fecha)');
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->bindParam(':centroID',$centroID);
		$stmt->bindParam(':fecha',$fecha);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

function consultaExisteUsuarioEnEvento($usuarioID,$centroID,$pistaID,$fecha,$conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM Eventos WHERE usuarioID=:usuarioID AND centroID=:centroID AND pistaID=:pistaID AND fecha=:fecha');
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->bindParam(':centroID',$centroID);
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->bindParam(':fecha',$fecha);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt->rowCount();
 }

 function eliminarEventoUsuario($usuarioID,$centroID,$pistaID,$fecha,$conexion)
 {
 try{
		$sql='DELETE FROM Eventos WHERE usuarioID=:usuarioID AND centroID=:centroID AND pistaID=:pistaID AND fecha=:fecha';
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->bindParam(':centroID',$centroID);
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->bindParam(':fecha',$fecha);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }
 
  function eliminarEvento($centroID,$pistaID,$fecha,$conexion)
 {
 try{
		$sql='DELETE FROM Eventos WHERE centroID=:centroID AND pistaID=:pistaID AND fecha=:fecha';
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(':centroID',$centroID);
		$stmt->bindParam(':pistaID',$pistaID);
		$stmt->bindParam(':fecha',$fecha);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }
?>