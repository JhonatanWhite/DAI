<html>
   <head>
	<meta charset="UTF-8">
      <title>Registro Clientes</title>
	</head>
	
	<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
	</style>
	
	
    	<body>
		<div id="header">
			<ul class="nav">
				<li><a href="">Menú</a>
					<ul>
					<li><a href="registro.php">Ingreso de Clientes</a></li>
					<li><a href="eliminar.php">Eliminación de Clientes</a></li>
					<li><a href="tabla2.php">Listado de Clientes</a></li>
					</ul>
			</ul>
		</div>
		</br>
		</br>
		</br>
<?php

	require "datos.php";
		
// si entra en el IF voy a editar un registro
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
     $sql = "SELECT * FROM registro WHERE id=:id";
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
	$accion = "NUEVO INGRESO";
	$u['id'] = ""; 
	$u['nombre'] = "";
	$u['direccion'] = "";
	$u['correo'] = "";
	$u['telefono'] = "";
}

echo "<h1>".$accion."</h1>";
?>
	
		<form action="" method="post">	
		 <div class="row">
     
	          <div class="col-sm-10">
         	
	             <label for="basic-url">Ingrese Su Nombre</label>
		         <div class="input-group">
                 <span class="input-group-addon" id="basic-addon1">Nombre: </span>
                 <input type="text" class="form-control" placeholder="Ejemplo:Juan Perez" name="nombre" aria-describedby="basic-addon1" value="<?=$u['nombre']?>">
                 </div>

		           <label for="basic-url">Ingrese Su Dirección</label>
		           <div class="input-group">
                   <span class="input-group-addon" id="basic-addon1">Dirección: </span>
                   <input type="text" class="form-control" placeholder="Ejemplo:Juan Perez" name="direccion" aria-describedby="basic-addon1" value="<?=$u['direccion']?>">
                   </div>
		
		            <label for="basic-url">Ingrese Su RUT</label>
		            <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">RUT: </span>
                    <input type="text" class="form-control"  value="<?=$u['id']?>" placeholder="Ejemplo:Juan Perez" name="RUT" aria-describedby="basic-addon1">
                    </div>
		
		             <label for="basic-url">Ingrese Su Correo</label>
                     <div class="input-group">
                     <input type="text" class="form-control" placeholder="Nombre Usuario" name="correo" aria-describedby="basic-addon2" value="<?=$u['correo']?>">
                     <span class="input-group-addon" id="basic-addon2">@hotmail.com</span>
                     </div>

        
                      <label for="basic-url">Su Telefono</label>
                      <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3">Número</span>
                      <input type="text" class="form-control" id="basic-url" name="telef" aria-describedby="basic-addon3" value="<?=$u['telefono']?>">
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
			 
			 if($accion == "nuevo") {
				 
				 //INSERTA REGISTRO
				 $registros = "INSERT INTO registro
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
			 } else {
				 // Actualiza Registro 
				 $registros = "UPDATE registro SET  id=:id, nombre=:firstname, direccion=:dir, correo=:corr, telefono=:telefo WHERE id=:id";
				 $statement = $conexion->prepare($registros);
				 $statement->bindParam(":id", $id);	
				 $statement->bindParam(":firstname", $nombre);
				 $statement->bindParam(":dir", $direccion);
				 $statement->bindParam(":corr", $correo);
				 $statement->bindParam(":telefo", $telefono);
				 $statement->execute();
				 echo ("Registro Actualizado");
			 }
		
		
		
	
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
  </body>
	   
</html>