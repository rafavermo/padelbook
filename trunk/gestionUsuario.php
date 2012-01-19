<?php

/* Insertando datos en la tabla usuarios */  
 
function insertarUsuario($nombre,$apellidos,$usuario,$password,$fechaNacimiento,$ciudad,$email,$conexion)
{
	try{
		$fechaNacimiento1= explode("/",$fechaNacimiento);
		$dia=$fechaNacimiento1[0];
		$mes=$fechaNacimiento1[1];
		$anyo=$fechaNacimiento1[2];
		$fecha = new DateTime("$anyo-$mes-$dia");
	    $sfecha=$fecha->format('Y-m-d H:i:s');
		$sql='INSERT INTO Usuarios (nombre,apellidos,usuario,password,fechaNacimiento,ciudad,email) VALUES(:nombre,:apellidos,:usuario,:password,:fechaNacimiento,:ciudad,:email)';
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':apellidos',$apellidos);
		$stmt->bindParam(':usuario',$usuario);
		$stmt->bindParam(':password',sha1($password));
		$stmt->bindParam(':fechaNacimiento',$sfecha);
		$stmt->bindParam(':ciudad',$ciudad);
		$stmt->bindParam(':email',$email);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }

//Devuelve 1 si el usuario ya existe
function seleccionarExiteUsuario($usuario,$conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM Usuarios WHERE usuario=:usuario');
		$stmt->bindParam(':usuario',$usuario);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt->rowCount();
 }

//Devuelve 1 si el usuario y su contraseña coinciden
 function validaUsuarioYPassword($usuario,$password,$conexion)
{
	try{
		$stmt=$conexion->prepare('SELECT * FROM Usuarios WHERE usuario=:usuario AND password=:password');
		$stmt->bindParam(':usuario',$usuario);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt->rowCount();
 }

function seleccionaUsuarioIDporNombre($nombreUsuario, $conexion)
{
	try{

		$stmt=$conexion->prepare('SELECT usuarioID FROM Usuarios WHERE usuario=:usuario');
		$stmt->bindParam(':usuario',$nombreUsuario);

		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }
	
function seleccionaNombreUsuarioporIDUsuario($UsuarioID, $conexion)
{
	try{

		$stmt=$conexion->prepare('SELECT usuario FROM Usuarios WHERE usuarioID=:usuarioID');
		$stmt->bindParam(':usuarioID',$UsuarioID);

		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }	
	
	
function DatosUsuario($usuario, $conexion)
{
	try{

		$stmt=$conexion->prepare('SELECT * FROM Usuarios WHERE usuario=:usuario');
		$stmt->bindParam(':usuario',$usuario);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }		
	
//
	

function ActualizaDatosUsuario($usuarioID,$nombre,$apellidos,$usuario,$password,$fechaNacimiento,$ciudad,$email,$conexion)
{
	try{
        //Le damos formato a la fecha antes de introducirla
        
		$fechaNacimiento1= explode("/",$fechaNacimiento);
		$dia=$fechaNacimiento1[0];
		$mes=$fechaNacimiento1[1];
		$anyo=$fechaNacimiento1[2];
		$fecha = new DateTime("$anyo-$mes-$dia");
	    $sfecha=$fecha->format('Y-m-d H:i:s');
		/////Fin formato fecha ////

		$stmt=$conexion->prepare('UPDATE usuarios SET usuarioID=:usuarioID,nombre=:nombre,apellidos=:apellidos,usuario=:usuario,password=:password,fechaNacimiento=:fechaNacimiento,ciudad=:ciudad,email=:email WHERE usuario=:usuario');
		$stmt->bindParam(':usuarioID',$usuarioID);
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':apellidos',$apellidos);
		$stmt->bindParam(':usuario',$usuario);
		$stmt->bindParam(':password',$password);
		$stmt->bindParam(':fechaNacimiento',$sfecha);
		$stmt->bindParam(':ciudad',$ciudad);
		$stmt->bindParam(':email',$email);
		$stmt->execute();
	}catch(PDOException $e){
		return false;
	}
	return $stmt;
 }			
	
	
	
 	
	
	
	
	
	
?>