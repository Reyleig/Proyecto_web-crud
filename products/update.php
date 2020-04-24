<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:productoscrud.php");
	}
?>
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
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Producto</b></h2></div>
                    <div class="col-sm-4">
                        <a href="productoscrud.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ('../config/databaseproducts.php');
				$productos= new Database();
				if(isset($_POST) && !empty($_POST)){
					
					$name = $productos->sanitize($_POST['name']);
					$description = $productos->sanitize($_POST['description']);
					$price = $productos->sanitize($_POST['price']);
					$res = $productos->update($id,$name, $description, $price);
					if($res){
						$message= "Producto actualizado con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudo actualizar el producto";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_productos=$productos->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="name" id="name" class='form-control' maxlength="100" required  value="<?php echo $datos_productos->name;?>">
				</div>
				<div class="col-md-6">
					<label>Descripcion:</label>
					<input type="text" name="description" id="description" class='form-control' maxlength="100" required value="<?php echo $datos_productos->description;?>">
				</div>
				<div class="col-md-12">
					<label>Precio:</label>
					<input type="text" name="price" id="price" class='form-control' maxlength="15" required value="<?php echo $datos_productos->price;?>">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar Producto</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            