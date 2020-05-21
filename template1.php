
<?php
include 'config/Configuracion.php';
?>
<?php
session_start();

if(@$_SESSION["name"] == ""){
  echo "No podras hackaearme";
}else{
  
  if(@$_SESSION["rol"] == 0){
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
          </li>
          <li class="nav-item">
            <a class="nav-link" href="compra/VerCarta.php">Carrito</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="compra/pagos.php">Pagos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="cerrarSesion.php"><b>Cerrar sesion</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Tecno Place</h1>
        <a href="reportes/index.php"><b>Reporte de Productos</b></a>


      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://www.adslzone.net/app/uploads/2017/07/pc-gaming-por-piezas.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://i.ytimg.com/vi/SxiL1_QcWxw/maxresdefault.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://www.profesionalreview.com/wp-content/uploads/2016/11/Pc-Gaming.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">


        <?php
        //get rows query
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>

      <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
              <a href="#"><img class="card-img-top" src="https://us.123rf.com/450wm/putracetol/putracetol1706/putracetol170603872/80612547-reparaci%C3%B3n-de-icono-de-computadora-elemento-de-dise%C3%B1o-de-logotipo.jpg?ver=6" alt=""></a>
              <div class="card-body">
               <h4 class="card-title">
               <a href="#"><?php echo $row["name"]; ?></a>
               </h4>
                  <h5><a href="#"><?php echo '$'.$row["price"].' COP'; ?></a>
                  </h5>
                  <p class="card-text"><a href="#"><?php echo $row["description"]; ?></a></p>
                  <a class="btn btn-success" href="compra/AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar a la Carta</a>
                        
                </div>
              </div>
            </div>

        <?php } }else{ ?>
        <p>Producto(s) no existe.....</p>
        <?php } ?>
    </div>
        </div>
 

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Fundamentos Web</p>
    </div>
    <!-- /.container -->
  </footer>

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