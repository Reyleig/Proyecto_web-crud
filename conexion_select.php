<?php
  $mysqli = mysqli_connect("localhost", "root", "", "proyecto_web");
  if (mysqli_connect_errno($mysqli)) {
      echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  }
?>