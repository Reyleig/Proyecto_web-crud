<?php
// include database configuration file
include '../config/Configuracion.php';

// initializ shopping cart class
include '../config/La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: ../template1.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM clientes WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
   
    input[type="number"]{width: 20%;}
    </style>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">
  <link href="../css/style2.css" rel="stylesheet">
  
    <title>View Cart - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
    <style>
    
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><h1>Bienvenido <?php echo $_SESSION["name"]; ?> </h1></a>
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="../template1.php">Home
            </a>
          </li> 
          <li class="nav-item">
          <a class="nav-link" href="../cerrarSesion.php"><b>Cerrar sesion</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Inicio</a></li>
  
</ul>
</div>

</div>
<div class="margen"></div>
<div class="panel-body">
<h1><b>Pedido Realizado a </b></h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' COP'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' COP'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay articulos en tu carta......</p></td>
        <?php } ?>

        <?php
//segun yo esto hace la consulta e ingresa los datos
	$email = $_SESSION["email"];
  $nombre = $_SESSION["name"];
  $apellido= $_SESSION["lastname"];
  $productos = "";

  if($cart->total_items() > 0){
   $cartItems = $cart->contents();
   foreach($cartItems as $item){
   $productos = $productos." ".$item["name"];
   
   $conect=mysqli_connect("localhost","root","","carta");
   mysqli_query($conect,"INSERT INTO historial (`id`, `email`, `name`, `lastname`) VALUES ('$email', '$nombre', '$apellido');");
   }
   }
?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' COP'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    
    <div class="footBtn">
        <a href="../template1.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
    </div>
        </div>

 </div><!--Panek cierra-->
</div>
</body>
</html>

