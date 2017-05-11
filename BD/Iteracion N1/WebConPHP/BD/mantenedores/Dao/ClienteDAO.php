<?php

require_once "Cliente.php";
require_once "ConnectionFactory.php";

class ClienteDAO {
	
	const TABLA = "registros";
	
	public static function createObject($data){
		return new Cliente($data["id"], $data["nombre"], $data["direccion"], $data["correo"], $data["telefono"]);
	}
	
	public static function getById($clienteId) {
		$conexion = self::getConnection();
		$sql = "SELECT * FROM ".self::TABLA." WHERE id = :cliente_id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":cliente_id", $clienteId);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$entidad = $statement->fetch();
		return self::createObject($entidad);
	}
	
	public static function getAll() {
		$conexion = self::getConnection();
		$sql = "SELECT * FROM ".self::TABLA."";
		$statement = $conexion->prepare($sql);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$lista = array();
		while( $entidad = $statement->fetch() ){
			array_push( $lista, self::createObject($entidad) );
		}
		return $lista;
	}
	
	public static function delete($clienteId) {
		$clienteId = intval($clienteId);
		$conexion = self::getConnection();
		$sql = "DELETE FROM ".self::TABLA." WHERE id = :cliente_id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":cliente_id", $clienteId);		
		$statement->execute();
	}
	
	public static function save(Cliente $cliente) {
		$conexion = self::getConnection();
		
		if($cliente->id == 0) {
			// alumno nuevo
			$sql = "INSERT INTO ".self::TABLA."(nombre, direccion, correo, telefono) VALUES(:nombre, :direccion, :correo, :telefono)";
		} else {
			// modificar alumno
			$sql = "UPDATE ".self::TABLA." SET nombre = :nombre, direccion = :direccion, correo = :correo, telefono = :telefono WHERE id = :cliente_id";
		}
		$statement = $conexion->prepare($sql);
		$statement->bindValue(":nombre", $cliente->nombre);
		$statement->bindValue(":direccion", $cliente->direccion);
		$statement->bindValue(":correo", $cliente->correo);
		$statement->bindValue(":telefono", $cliente->telefono);
		if($cliente->id > 0){
			$statement->bindValue(":cliente_id", $cliente->id);
		}
		$statement->execute();
		if($cliente->id == 0) {
			$cliente->id = intval($conexion->lastInsertId());
		}
		return $cliente;
	}
	
	private static function getConnection() {
		return ConnectionFactory::getConnection();
	}
	
}
