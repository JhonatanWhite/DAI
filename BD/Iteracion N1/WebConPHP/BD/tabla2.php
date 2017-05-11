<html>
  <head>
  <title>Tabla Clientes</title>
  </head>
    <body>
<?php
require "datos.php";

try {
     $conexion = new PDO("mysql:host=$host;port=$puerto;dbname=$bd", $usuario, $password);
     // configura el modo de errores a excepciones
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
     // modo seguro con "Prepared Statements"
     $sql = "SELECT * FROM registro";
     $statement = $conexion->prepare($sql);
     $statement->execute();
	
     // configura para traer un array asociativo
     $statement->setFetchMode(PDO::FETCH_ASSOC);
?>
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
		
 <table border="1">
		<tr>
			<th>id</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Correo</th>
			<th>Telefono</th>
		</tr>
<?php
	while( $fila = $statement->fetch() ): ?>
		 <tr>
			   <td><?=$fila["id"]?></td>
			   <td><?=$fila["nombre"]?></td>
			   <td><?=$fila["direccion"]?></td>
			   <td><?=$fila["correo"]?></td>
			   <td><?=$fila["telefono"]?></td>
			   <td>
				 <a href="registro.php?id=<?=$fila["id"]?>">Editar</a>
				 <a href="eliminar.php">Eliminar</a>
			   </td>
		 </tr>
<?php endwhile;?>
</table>
<?php
}catch(PDOException $e) {	
	echo "error :( => ".$e->getmessage();
}

// cierra la conexión
$conexion = null;

?>

    </body>
	   
</html>