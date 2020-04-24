<?php 
if (isset($_GET['id'])){
	include('../config/databaseusers.php');
	$usuario = new Database();
	$id=intval($_GET['id']);
	$res = $usuario->delete($id);
	if($res){
		header('location: usercrud.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>