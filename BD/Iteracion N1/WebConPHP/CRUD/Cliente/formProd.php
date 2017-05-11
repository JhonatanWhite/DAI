<?php
require_once "../../DAO/productoDao.php";
require_once "../../DAO/Producto.php";

$mensajes = array();
$mensajesError = array();

// si viene para editar
if( isset($_GET["id"]) ){
	$id = intval($_GET["id"]);
	$producto = productoDao::getById($id);
}else {
	$producto = new Producto(null, "", "", "", "");
}

// si se envió el formulario procesar
if( isset($_POST["stock"]) ){
	$producto = new Producto(intval($_POST["id"]), $_POST["stock"], $_POST["marca"], $_POST["categoria"], $_POST["compañia"]);
	$producto = productoDao::save($producto);
	$mensajes[] = "producto guardado correctamente";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de producto</title>
	<meta charset="utf-8" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	
	<div class="container">
		<h1>producto</h1>
		
		<?php foreach($mensajes as $mensaje): ?>
		<div class="alert alert-success" role="alert"> 
			<?=$mensaje?>
		</div>
		<?php endforeach; ?>
		
		<form method="post" action="">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<?=$producto->id?>">
			</div>
			<div class="form-group">
				<label for="stock">stock</label>
				<input type="text" class="form-control" id="stock" name="stock" placeholder="stock del producto" value="<?=$producto->stock?>">
			</div>
			<div class="form-group">
				<label for="marca">marca</label>
				<input type="text" class="form-control" id="marca" name="marca" placeholder="marca del producto" value="<?=$producto->marca?>">
			</div>
			
			<div class="form-group">
				<label for="categoria">categoria</label>
				<input type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria del producto" value="<?=$producto->categoria?>">
			</div>
			<div class="form-group">
				<label for="compañia">compañia</label>
				<input type="text" class="form-control" id="compañia" name="compañia" placeholder="compañia del producto" value="<?=$producto->compañia?>">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			<a class="btn btn-danger" href="listarProductos.php" role="button">Cancelar</a>
		</form>
	</div>
	
</body>
</html>
