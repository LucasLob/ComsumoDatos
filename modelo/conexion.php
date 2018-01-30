<?php

class conexion{

	private $conexion; 
	private $server = "localhost"; 
	private $usuario = "root"; 
	private $pass = "";
	private $db = "test"; 
	private $user ; 
	private $password;


	public function __construct(){

		$this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->db);

		if($this->conexion->connect_errno){

			die("Fallo al trratar de conectar con MySQL: (". $this->conexion->connect_errno.")");


		}
	}

	public function cerrar(){

		$this->conexion->close();

	}
        
        public function login($usuario, $pass){

		$this->user = $usuario;
		$this->password = $pass;

		$query = "select id, nombre, apellido, usuario, clave, rol_Id from test where usuario = '".$this->user."' and clave = MD5('".$this->password."')";
		$consulta = $this->conexion->query($query);

		$row = mysqli_fetch_array($consulta);


		if($row['rol_Id'] == 1 ){ //Administrador

			session_start(); 

			$_SESSION['validacion'] = 1 ; 
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['id'] = $row['id'];

			echo "menu.php"; //Respuesta Mensaje donde redireccionara



		}else if($row['rol_Id'] == 2) { //Operario

			session_start(); 

			$_SESSION['validacion'] = 1 ; 
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['id'] = $row['id'];

			echo "menu.php"; 

		}else{

			session_start(); 

			$_SESSION['validacion'] = 0 ; 
			echo "1";
		}

	} // CIERRE METODO LOGIN 
    
    
    public function registrar_usuario($id, $nombre, $apellido, $usuario, $pass1, $pass2){
        
        
        if($pass1 == $pass2){
            $validacion_pass = true;
        }else{
            $validacion_pass= false;
        }
    
        
        if($validacion_pass){
            
            $consult = $this->conexion->query("select usuario from deseador where usuario = '".$usuario."'");
            
            if(mysqli_num_rows($consult)> 0){
                echo '1';
            }else{
                $this->conexion->query("insert into deseador values('".$id."', '".$nombre."', '".$apellido."', '".$usuario."', MD5('".$pass1."'), 2)");  
                session_start();
                $_SESSION['validacion'] = 1 ;
                $_SESSION['nombre']= $nombre;
                $_SESSION['apellido'] = $apellido;
                $_SESSION['cedula'] = $cedula;
    
                echo 'menu.php';
            }
          
        }else{
            echo '2';
        }
        
    }
}
        
               ?>