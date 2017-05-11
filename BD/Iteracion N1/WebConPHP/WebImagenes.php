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
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>    
			  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  <li data-target="#carousel-example-generic" data-slide-to="3"></li>
			  <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              </ol>

                  <!-- Wrapper for slides -->
                  <div
				  class="carousel-inner" role="listbox">
                     <div class="item active">
                     <img align="center" src="celu1.png" alt="..." width="25%" height="200px">
                     <div class="carousel-caption">
                     <font color="black" size=6>HUAWEI P9</font>
                     </div>
                     </div>
                        <div class="item">
                        <img align="center" src="Celu2.png" alt="..." width="50%" height="200px">
                        <div class="carousel-caption">
						<font color="black" size=6>IPHONE 7</font>
                        </div>
                        </div>   

						
						<div class="item">
                        <img align="center" img src="Celu3.png" alt="..." width="50%" height="250px">
                        <div class="carousel-caption">
						<font color="black" size=9>IDOL 4 </font>
                        </div>
                        </div>    
						
						<div class="item">
                        <img align="center" img src="Celu4.png" alt="..." width="20%" height="250px">
                        <div class="carousel-caption">
						<font color="black" size=9>LG G2 </font>
                        </div>
                        </div>   
                  </div>

                              <!-- Controls -->
                              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only">Anterior</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only">Siguiente</span>
                              </a>
            </div>


		
		<div class="row">
          <div class="col-sm-2 ">
          <a href="#" class="thumbnail">
             <img align="center" img src="celu1.jpg" alt="Celular1">
          </a>
		  <h2>  Huawei P9 </h2>
			 <h2> $49.990.- </h2>
			 <span class="label label-default">Oferta!</span>
          </div>
       
           
          <div class="col-sm-2">
          <a href="#" class="thumbnail">
             <img align="center" img src="celu2.jpg" alt="Celular2">
          </a>
		  <h2>  Iphone 6 </h2>
			 <h2> $459.999.-</h2>
          </div>
		   
        </div> 
		
	
	</body>
	   
</html>