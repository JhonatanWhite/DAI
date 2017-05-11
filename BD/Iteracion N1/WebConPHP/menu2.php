<header>
   <title>Menu Desplegable</title>
		
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
				<li><a href="index.php">Inicio</a></li>
				<li><a href="WebFormularioContacto.php">Form. Contacto</a></li>
				<li><a href="WebQuienesSomos.php">Quienes Somos</a></li>
				<li><a href="WebFormularioRegistro.php">Form. Registro</a></li>
			</ul>
			<button type="button" class="btn btn-success" onClick="window.location.href='login.html'">Iniciar Sesión</button>
			<?php 
			require 'micuenta.php';
			?>
		</div>
	</body>

</header>