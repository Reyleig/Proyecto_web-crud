<?php

session_start();

          include("conexionBD.php");

          $email = $_POST["email"];
          $password = $_POST["password"];

          $sql = "Select * from clientes where email='$email' and password='$password'";
          $resultado = mysqli_query($mysqli, $sql);
          if (!$resultado) {
            echo "Fallo al ejecutar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
          }else{  

            while($fila = mysqli_fetch_assoc($resultado)){
              $_SESSION["name"] = $fila["name"];
              $_SESSION["id"] = $fila["id"];
              $_SESSION["rol"] = $fila["id_roles"];
              $_SESSION["email"] = $fila["email"];
              $_SESSION["id"] = $fila["id"];
              $_SESSION["rol"] = $fila["id_roles"];
              

              if($fila["id_roles"] == 1){
                header("location:template1.php");
                exit();
              }else if($fila["id_roles"] == 0){
                header("location:template2.php");
                exit();
              }
          } 

            header("location:index.php");
          }
?>
   