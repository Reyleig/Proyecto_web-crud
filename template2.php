
<?php
include 'config/Configuracion.php';
?>
<?php
session_start();

if(@$_SESSION["name"] == ""){
  echo "No podras hackaearme";
}else{
  
  if(@$_SESSION["rol"] == 1){
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">

</head>

<body>
 
  <!-- Navigation -->
  <div class="margen">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><h1>Bienvenido <?php echo $_SESSION["name"]; ?> </h1></a>
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
      
          <li class="nav-item">
          <a class="nav-link" href="cerrarSesion.php"><b>Cerrar sesion</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <!-- Page Content -->
  <div>
  <div class="container">

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Tecno Place</h1>
    <div class="list-group">
      <a href="products/productoscrud.php" class="list-group-item">Administrar Productos</a>
      <a href="users/usercrud.php" class="list-group-item">Administrar Usuarios</a>
      
    </div>

  </div>
  <div>

      <!-- /.col-lg-3 -->

 
 

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <div>
  </div>
  <div>
  </div>
  <div>
  </div>
  <div>
  </div>
  <div>
  </div>
  <div>
  
  <div class="margenn">
  <footer class="py-5  bg-dark">
  
    <div class="container">
    <div>
  
      <p class="m-0 text-center text-white">Copyright &copy; Fundamentos Web</p>
    </div>
    <!-- /.container -->
  </footer>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
 
  }
  
  else{
    echo "No tienes permiso  <a href='cerrarSesion.php'>Cerrar sesion</a>";

  }
}
?>