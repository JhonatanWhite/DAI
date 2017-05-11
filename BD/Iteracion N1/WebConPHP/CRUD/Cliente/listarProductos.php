<!DOCTYPE html>
<html>
<head>
	<title>Listado de productos</title>
	<meta charset="utf-8" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

require_once "../../DAO/productoDao.php";

$productos = productoDao::getAll();
?>
<div class="container">
<h1>Productos</h1>
<a class="btn btn-success" href="formProd.php" role="button">Nuevo</a>
<table class="table table-hover">
	<thead style="background-color:#ccc">
		<tr>
			<th>id</th>
			<th>Stock</th>
			<th>Marca</th>
			<th>Categoria</th>
			<th>Compañia</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php
foreach($productos as $producto):
?>
		<tr>
			<td><?=$producto->id?></td>
			<td><?=$producto->stock?></td>
			<td><?=$producto->marca?></td>
			<td><?=$producto->categoria?></td>
			<td><?=$producto->compañia?></td>
			<td>
				<a class="btn btn-info" href="form.php?id=<?=$producto->id?>" role="button">Editar</a>
				<a class="btn btn-danger" href="delete.php?id=<?=$producto->id?>" role="button">Eliminar</a>
			</td>
		</tr>
<?php
endforeach;
?>
	</tbody>
</table>
</div>

</body>
</html>
