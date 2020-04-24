<?php
class Database{
    private $con;
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "carta";
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

public function create($name,$description,$price){
	$sql = "INSERT INTO mis_productos (name, description, price) VALUES ('$name', '$description', '$price')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
}
public function read(){
    $sql = "SELECT * FROM mis_productos";
    $res = mysqli_query($this->con, $sql);
    return $res;
    }
   
    public function single_record($id){
			$sql = "SELECT * FROM mis_productos where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		public function update($id,$name,$description,$price){
			$sql = "UPDATE mis_productos SET name='$name', description='$description', price='$price' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM mis_productos WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

}

?>