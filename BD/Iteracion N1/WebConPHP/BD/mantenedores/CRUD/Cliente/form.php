<?php
require_once "../../DAO/ClienteDAO.php";
require_once "../../DAO/Cliente.php";

$mensajes = array();
$mensajesError = array();

// si viene para editar
if( isset($_GET["id"]) ){
	$id = intval($_GET["id"]);
	$cliente = clienteDAO::getById($id);
}else {
	$cliente = new Cliente(null, "", "", "", "");
}

// si se envió el formulario procesar
if( isset($_POST["nombre"]) ){
	$cliente = new Cliente(intval($_POST["id"]), $_POST["nombre"], $_POST["direccion"], $_POST["correo"], $_POST["telefono"]);
	$cliente = ClienteDAO::save($cliente);
	$mensajes[] = "cliente guardado correctamente";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de cliente</title>
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
		<h1>cliente</h1>
		
		<?php foreach($mensajes as $mensaje): ?>
		<div class="alert alert-success" role="alert"> 
			<?=$mensaje?>
		</div>
		<?php endforeach; ?>
		
		<form method="post" action="">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<?=$cliente->id?>">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del cliente" value="<?=$cliente->nombre?>">
			</div>
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion del cliente" value="<?=$cliente->direccion?>">
			</div>
			
			<div class="form-group">
				<label for="correo">Correo</label>
				<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo del cliente" value="<?=$cliente->correo?>">
			</div>
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono del cliente" value="<?=$cliente->telefono?>">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			<a class="btn btn-danger" href="listar.php" role="button">Cancelar</a>
		</form>
	</div>
	
</body>
</html>
