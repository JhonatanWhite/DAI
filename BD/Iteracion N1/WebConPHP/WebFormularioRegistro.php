<html>
   <head>
      <title>Empresa MS</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
		
	
	
	</head>
	
	 <?php 
	 require 'menu1.php';
	 ?>
 
     <?php
	 require 'menu2.php';
	 ?>
	
	<?php

	require "datos.php";
	
	if( isset($_GET['id']) ){
	$accion = "ACTUALIZAR";
	$id = $_GET['id'];
	$u = "";
	// reemplazar por el codigo el usuario de la bd 
	
	try {
		 $conexion = new PDO("mysql:host=$host;port=$puerto;dbname=$bd", $usuario, $password);
		 // configura el modo de errores a excepciones
		 $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		 // modo seguro con "Prepared Statements"
		 $sql = "SELECT * FROM registros WHERE id=:id";
		 $statement = $conexion->prepare($sql);
		 $statement->bindParam(":id", $id);	
		 $statement->execute();
		 $u = $statement->fetch();
		
		 // configura para traer un array asociativo
		 $statement->setFetchMode(PDO::FETCH_ASSOC);
	}catch(PDOException $e) {	
	echo "error :( => ".$e->getmessage();
	}
	
} else {
	$accion = "Nuevo Registro";
	$u['id'] = ""; 
	$u['nombre'] = "";
	$u['direccion'] = "";
	$u['correo'] = "";
	$u['telefono'] = "";
}

echo "<h1>".$accion."</h1>";
?>
    	<body>
	
		<form action="" method="post">	
		 <div class="row">
     
	          <div class="col-sm-10">
         	
	             <label for="basic-url">Ingrese Su Nombre</label>
		         <div class="input-group">
                 <span class="input-group-addon" id="basic-addon1">Nombre: </span>
                 <input type="text" class="form-control" placeholder="Ejemplo:Juan Perez" name="nombre" aria-describedby="basic-addon1">
                 </div>

		           <label for="basic-url">Ingrese Su Dirección</label>
		           <div class="input-group">
                   <span class="input-group-addon" id="basic-addon1">Dirección: </span>
                   <input type="text" class="form-control" placeholder="Avda Siempre Viva #157" name="direccion" aria-describedby="basic-addon1">
                   </div>
		
		            <label for="basic-url">Ingrese Su RUT</label>
		            <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">RUT: </span>
                    <input type="text" class="form-control" placeholder="Ejemplo:19876198-8" name="RUT" aria-describedby="basic-addon1">
                    </div>
		
		             <label for="basic-url">Ingrese Su Correo</label>
                     <div class="input-group">
					 <span class="input-group-addon" id="basic-addon2">Correo: </span>
                     <input type="text" class="form-control" placeholder="xxxxx@hotmail.com" name="correo" aria-describedby="basic-addon2">
                     </div>

        
                      <label for="basic-url">Su Teléfono</label>
		
                      <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3">Número: </span>
                      <input type="text" class="form-control" placeholder="+569xxxxxxxx" id="basic-url" name="telef" aria-describedby="basic-addon3">
                      </div>
		
		               <button type="submit" class="btn btn-default navbar-btn">Registrame!</button>
		
		
               </div>

          </div>
		  
		  <?php


//CERAR METODO GUARDAR O ACTUALIZAR
function guardarDatos($accion){
	require "datos.php";
		try
		{
			$conexion = new PDO("mysql:host=$host;port=$puerto;dbname=$bd", $usuario,$password);
			//configura el modo de errores a excepciones
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conexión exitosa!!!";
			echo "<br />";
		
		
			 // modo seguro con "Prepared Statements"
			 $nombre = $_POST["nombre"];
			 $id = $_POST["RUT"];
			 $direccion = $_POST["direccion"];
			 $correo = $_POST["correo"];
			 $telefono = $_POST["telef"];
			 
			// if($accion == "nuevo") {
				 
				 //INSERTA REGISTRO
				 $registros = "INSERT INTO registros
				 (id, nombre, direccion, correo, telefono) 
				 VALUES(:id, :firstname, :dir, :corr, :telefo)";
				 $statement = $conexion->prepare($registros);
				 $statement->bindParam(":id", $id);	
				 $statement->bindParam(":firstname", $nombre);
				 $statement->bindParam(":dir", $direccion);
				 $statement->bindParam(":corr", $correo);
				 $statement->bindParam(":telefo", $telefono);
				 $statement->execute();
				  echo ("Registro Ingresado");
			/* } else {
				 // Actualiza Registro 
				 $registros = "UPDATE registros SET  id=:id, nombre=:firstname, direccion=:dir, correo=:corr, telefono=:telefo WHERE id=:id";
				 $statement = $conexion->prepare($registros);
				 $statement->bindParam(":id", $id);	
				 $statement->bindParam(":firstname", $nombre);
				 $statement->bindParam(":dir", $direccion);
				 $statement->bindParam(":corr", $correo);
				 $statement->bindParam(":telefo", $telefono);
				 $statement->execute();
				 echo ("Registro Actualizado");
			 }*/
		
		
		
	
		} catch(PDOException $e) {
	        echo "Error :c => ".$e->getMessage();
		}
		
         // cierra la conexión
         $conexion = null;
		
}

if(isset($_POST["RUT"]))
{
	guardarDatos($accion);
	echo("Registro Ingresado Exitosamente");
} 

?>	  




<?php
if(isset($_POST["name"]))
{
$para      = 'jhonatanwhitem@hotmail.com';
$titulo    = 'Registro Nuevo Cliente';
$mensaje   = 'Nombre: '.$_POST["name"]. ' '.'Correo:'.$_POST["correo"].'Telefono : '.$_POST["telefono"];
$cabeceras = 'From: Pagina SW' . "\r\n" ;
echo("Para:" .$para. "Titulo:". $titulo. "Su mensaje :". $mensaje. "Enviado Desde: ". $cabeceras);
mail($para, $titulo, $mensaje, $cabeceras);
}
?>	  
  </body>
	   
</html>