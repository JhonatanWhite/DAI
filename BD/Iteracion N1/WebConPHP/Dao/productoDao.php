<?php

require_once "Producto.php";
require_once "ConnectionFactory.php";

class productoDao {
	
	const TABLA = "productos";
	
	public static function createObject($data){
		return new Producto($data["id"], $data["stock"], $data["marca"], $data["categoria"], $data["compania"]);
	}
	
	public static function getById($productoId) {
		$conexion = self::getConnection();
		$sw = "SELECT * FROM ".self::TABLA." WHERE id = :producto_id";
		$statement = $conexion->prepare($sw);
		$statement->bindParam(":producto_id", $productoId);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$entidad = $statement->fetch();
		return self::createObject($entidad);
	}
	
	public static function getAll() {
		$conexion = self::getConnection();
		$sw = "SELECT * FROM ".self::TABLA."";
		$statement = $conexion->prepare($sw);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$lista = array();
		while( $entidad = $statement->fetch() ){
			array_push( $lista, self::createObject($entidad) );
		}
		return $lista;
	}
	
	public static function delete($productoId) {
		$productoId = intval($productoId);
		$conexion = self::getConnection();
		$sw = "DELETE FROM ".self::TABLA." WHERE id = :producto_id";
		$statement = $conexion->prepare($sw);
		$statement->bindParam(":producto_id", $productoId);		
		$statement->execute();
	}
	
	public static function save(Producto $producto) {
		$conexion = self::getConnection();
		
		if($producto->id == 0) {
			// producto nuevo
			$sw = "INSERT INTO ".self::TABLA."(stock, marca, categoria, compania) VALUES(:stock, :marca, :categoria, :compania)";
		} else {
			// modificar producto
			$sw = "UPDATE ".self::TABLA." SET stock = :stock, marca = :marca, categoria = :categoria, compania = :compania WHERE id = :producto_id";
		}
		$statement = $conexion->prepare($sw);
		$statement->bindValue(":stock", $producto->stock);
		$statement->bindValue(":marca", $producto->marca);
		$statement->bindValue(":categoria", $producto->categoria);
		$statement->bindValue(":compania", $producto->compania);
		if($producto->id > 0){
			$statement->bindValue(":producto_id", $producto->id);
		}
		$statement->execute();
		if($producto->id == 0) {
			$producto->id = intval($conexion->lastInsertId());
		}
		return $producto;
	}
	
	private static function getConnection() {
		return ConnectionFactory::getConnection();
	}
	
}
