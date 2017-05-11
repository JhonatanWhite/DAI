<?php
/**
 * En el patrón DAO representa
 * al TransferObject
 * 
 */

class Cliente {
	
	private $id = 0;
	private $nombre;
	private $direccion;
	private $correo;
	private $telefono;
	
	public function __construct($id, $nombre, $direccion, $correo, $telefono) {
		// argumentos como array
		$argumentos = func_get_args();
		// número de argumentos
		$numArgs 	= func_num_args();
		
		// si usa 4 o más argumentos
		if($numArgs >= 5) {
			$this->id 				= $id;
			$this->nombre 			= $nombre;
			$this->direccion 		= $direccion;
			$this->correo 	= $correo;
			$this->telefono 	= $telefono;
			
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
