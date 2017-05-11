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
	
<body>
			
    <div class="row">
     
	    <div class="col-sm-10">
         	
	     <label for="basic-url">Ingrese Su Nombre</label>
		   <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Nombre: </span>
           <input type="text" class="form-control" placeholder="Ejemplo:Juan Perez" name="name" aria-describedby="basic-addon1">
           </div>

		
		
	     <label for="basic-url">Ingrese Su Correo</label>
           <div class="input-group">
		   <span class="input-group-addon" id="basic-addon2">Correo: </span>
           <input type="text" class="form-control" placeholder="xxxxx@hotmail.com" name="correo" aria-describedby="basic-addon2">
           </div>

        
         <label for="basic-url">Su Telefono</label>
		
            <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Número: </span>
            <input type="text" class="form-control" placeholder="+569xxxxxxxx" id="basic-url" name="telefono" aria-describedby="basic-addon3">
            </div>
		
		   <button type="submit" class="btn btn-default navbar-btn">Contactarme!</button>
		
        </div>

   </div>
<?php
if(isset($_POST["name"]))
{
$para      = 'jhonatanwhitem@hotmail.com';
$titulo    = 'Registro Nuevo Cliente';
$mensaje   = 'Nombre: '.$_POST["name"]. ' '.'Correo:'.$_POST["correo"].'Telefono : '.$_POST["telefono"];
$cabeceras = 'From: Pagina SW' . "\r\n" ;
echo("Enviado Exitosamente Será Contactado en Breve Datos enviados Para:" .$para. "Titulo:". $titulo. "Su mensaje :". $mensaje. "Enviado Desde: ". $cabeceras);
mail($para, $titulo, $mensaje, $cabeceras);
}
?>	  
 </body>
</html>