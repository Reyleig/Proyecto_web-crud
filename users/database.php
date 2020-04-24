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

public function create($nombres,$apellidos,$correo,$clave,$telefono,$direccion,$id_ciudad){
	$sql = "INSERT INTO usuarios (nombres, apellidos, correo, clave, telefono, direccion, id_ciudad) VALUES ('$nombres', '$apellidos', '$correo', '$clave', '$telefono', '$direccion','$id_ciudad')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
}
public function read(){
    $sql = "SELECT * FROM usuarios";
    $res = mysqli_query($this->con, $sql);
    return $res;
    }
   
    public function single_record($id){
			$sql = "SELECT * FROM usuarios where idUsuario='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		public function update($id,$nombres,$apellidos,$correo,$clave,$telefono,$direccion,$id_ciudad){
			$sql = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', correo='$correo', 
			clave='$clave', telefono='$telefono', direccion='$direccion', id_ciudad='$id_ciudad' WHERE idUsuario=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM usuarios WHERE idUsuario=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

}

?>