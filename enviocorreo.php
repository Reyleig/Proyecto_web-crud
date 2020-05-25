<?php
// include database configuration file
include 'config/Configuracion.php';

// initializ shopping cart class
include 'config/La-carta.php';
$cart = new Cart;

// set customer ID in session
$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM clientes WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();

$cartItems = $cart->contents();
foreach($cartItems as $item);

 $articulos= $item["name"];


    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    
    $correoDesde = "revampedyreileigh@gmail.com";
    $clave = "owvwwwqitaqfrlmt";

    $para = $_POST["para"];
   $nombre = $_SESSION["name"];
   $apellido= $_SESSION["lastname"];
 

    $plantilla = "<h1>Gracias por su compra ".$nombre." ".$apellido." </h1> Su Pedido se a realizado con exito por un total de:".$cart->total().$articulos;

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        
        //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
        $mail->Username   =  $correoDesde;                     // SMTP username
        $mail->Password   =  $clave;                               // SMTP password
  
        //Recipients
        $mail->setFrom( $correoDesde, $correoDesde); 
        
        //La siguiente linea, se repite N cantidad de veces como destinarios tenga
        $mail->addAddress($para, $para);     // Add a recipient
   
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Mensaje automatico';
        $mail->Body    =  $plantilla;
        $mail->AltBody =  $plantilla;
        $mail->send();

        
        
        header("location:compra/Pedido.php");
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
?>