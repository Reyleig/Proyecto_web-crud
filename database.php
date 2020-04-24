<?php
class Database{
    private $con;
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "proyecto_web";
    function __construct(){
        $this->connect_db();
	}
	
	

		  
public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
		} 
}

public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}

public function create($nombre,$descripcion,$valorunitario,$cantidad){
	$sql = "INSERT INTO productos (nombre, descripcion, valorunitario, cantidad) VALUES ('$nombre', '$descripcion', '$valorunitario', '$cantidad')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
}
public function read(){
    $sql = "SELECT * FROM productos";
    $res = mysqli_query($this->con, $sql);
    return $res;
    }
   
    public function single_record($id){
			$sql = "SELECT * FROM productos where idProductos='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		public function update($id,$nombre,$descripcion,$valorunitario,$cantidad){
			$sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', valorunitario='$valorunitario', 
			cantidad='$cantidad' WHERE idProductos=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM productos WHERE idProductos=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

}

?>