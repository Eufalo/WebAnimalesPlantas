<!DOCTYPE html>
<html>
  <head>
	  <!-- Librerías para usar Bootstrap -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
   integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
   crossorigin=""></script>
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
   <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
   <script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  <!-- Nuestro código JavaScript y nuestro CSS-->


    <link rel="stylesheet" href="cabeceraEstilo.css">
    <link rel="stylesheet" href="animalesEstilo.css">
    <link rel="stylesheet" href="footerEstilos.css">

  </head>
  <body>
  <div data-role="page" data-theme="a">
  	<div data-role="header" id="cabecera">
         <div class="col-md-10" id ="titulo">Tienda animales
           <div class="col-sm-2">
         <a href="./login.php">Login</a></div></div>
         <div class="botonesMenuCabecera">
           <div data-role="navbar">
		      <ul>
            <li><a href="./index.php"  data-theme="a" data-icon="icon-home" ></a></li>
            <li><a href="./animalesInfo.php"  data-theme="a" data-icon="icon-animales" ></a></li>
            <li><a href="./plantasInfo.php" data-icon="icon-plantas" data-theme="a"></a></li>
            <li><a href="./terrariosInfo.php" data-icon="icon-terrarios" data-theme="a"></a></li>
            <li><a href="#" data-theme="a" data-icon="icon-contacto"></a></li>
		      </ul>
	       </div><!-- /navbar -->
       </div>
    </div>
	<div data-role="content"> <div id="content">
    <ul id="listaAnimales" data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Buscar animales...">
</ul>


	</div>
  </div>
	<div data-role="footer" id="MyFooter">

						<div class="footerContenedor">
							<div class="rowFooter">
								<div class="col-sm-3 myCols">
									<h5>Get started</h5>
									<ul>
										<li><a href="#">Home</a></li>
										<li><a href="#">Sign up</a></li>
										<li><a href="#">Downloads</a></li>
									</ul>
								</div>
								<div class="col-sm-3 myCols">
									<h5>About us</h5>
									<ul>
										<li><a href="#">Company Information</a></li>
										<li><a href="#">Contact us</a></li>
										<li><a href="#">Reviews</a></li>
									</ul>
								</div>
								<div class="col-sm-3 myCols">
									<h5>Support</h5>
									<ul>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">Help desk</a></li>
										<li><a href="#">Forums</a></li>
									</ul>
								</div>
								<div class="col-sm-3 myCols">
									<h5>Legal</h5>
									<ul>
										<li><a href="#">Terms of Service</a></li>
										<li><a href="#">Terms of Use</a></li>
										<li><a href="#">Privacy Policy</a></li>
									</ul>
								</div>
							</div>
						<div class="social-networks">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook-official"></i></a>
							<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
						</div>
            </div>
						<div class="footer-copyright">
							<p>© 2018 Copyright Text </p>
						</div>


        </div>


<script src="scriptsTerrariosSeleccionAnimales.js"></script>
  </body>
</html>
