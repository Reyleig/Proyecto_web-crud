<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
    <div class ="container">
    <div class ="table-wrapper">
    <div class ="table-title">
    <div class="row">
    <div class="col-sm-8"><h2>Registrarse <b></b></h2></div>
    <div class="col-sm-4">
	<a href="index.php" class="btn btn-info addnew">
    <i class="fa fa-arrow-left"></i>Regresar</a>
    </div>
    </div>
    </div>
            <div class="row">
				<form method="post">
				
				<div class="col-md-6">
					<label>name:</label>
					<input type="text" name="name" id="name" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>lastname:</label>
					<input type="text" name="lastname" id="lastname" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-12">
					<label>email:</label>
					<input type="email" name="email" id="email" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>password:</label>
					<input type="text" name="password" id="password" class='form-control' maxlength="30" required>
				</div>
				<div class="col-md-6">
					<label>phone:</label>
					<input type="text" name="phone" id="phone" class='form-control' maxlength="64" required>
				</div>
				<div class="col-md-6">
					<label>address:</label>
					<input type="text" name="address" id="address" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Ciudad:</label>
					<select name='id_ciudad'>
        <?php
          include ("conexion_select.php");
          $sql = "Select * from ciudad";
          $resultado = mysqli_query($mysqli, $sql);
          if (!$resultado) {
            echo "Fallo al ejecutar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
          }else{  
            while($fila = mysqli_fetch_assoc($resultado)){
              echo "
                <option value='$fila[id]'>$fila[descripcion]</option>
              ";
            }
          }
        ?>
      </select>			
	  </div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
    <?php
				include ("../config/databaseusers.php");
				$usuarios= new Database();
				if(isset($_POST) && !empty($_POST)){
					
					$name = $usuarios->sanitize($_POST['name']);
					$lastname = $usuarios->sanitize($_POST['lastname']);
					$email = $usuarios->sanitize($_POST['email']);
					$password = $usuarios->sanitize($_POST['password']);
					$phone = $usuarios->sanitize($_POST['phone']);
					$address = $usuarios->sanitize($_POST['address']);
					$id_ciudad = $usuarios->sanitize($_POST['id_ciudad']);
					
					$res = $usuarios->create($name, $lastname, $email, $password, $phone,
					$address,$id_ciudad);
					if($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>


</body>
</html>