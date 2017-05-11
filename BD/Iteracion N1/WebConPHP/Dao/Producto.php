<?php
/**
 * En el patrón DAO representa
 * al TransferObject
 * 
 */

class Producto {
	
	private $id = 0;
	private $stock;
	private $marca;
	private $categoria;
	private $compañia;
	
	public function __construct($id, $stock, $marca, $categoria, $compañia) {
		// argumentos como array
		$argumentos = func_get_args();
		// número de argumentos
		$numArgs 	= func_num_args();
		
		// si usa 4 o más argumentos
		if($numArgs >= 5) {
			$this->id 				= $id;
			$this->stock 			= $stock;
			$this->marca 		= $marca;
			$this->categoria 	= $categoria;
			$this->compañia 	= $compañia;
			
		}
	}
	
	// PHP Magic Methods
	
	public function __get($propiedad) {
		if( property_exists($this, $propiedad) ){
			return $this->$propiedad;
		}
	}
	
	public function __set($propiedad, $valor) {
		if( property_exists($this, $propiedad) ){
			return $this->$propiedad = $valor;
		}
	}
	
}
