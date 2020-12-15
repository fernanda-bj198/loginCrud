<?php

  require_once "Conexion.php";

  class Usuarios extends Conexion{

	public function agregarUsuario($nombre, $am, $email, $usuario, $password){

		//Invocando al metodo conectar de la clase Conexion
		$conexion = Conexion::conectar();

		$password = sha1($password);

		$sql = "INSERT INTO l_registro (nombre, am, email, usuario, password) VALUES ('$nombre','$am','$email','$usuario','$password')";

		$result = mysqli_query($conexion,$sql);

		return $result;
	}

	public function login($usuario, $password){

		//Invocar al metodo conectar de la clase Conexion
		$conexion = Conexion::conectar();

		$password = sha1($password);

		$sql = "SELECT count(*) as Total FROM l_registro WHERE usuario = '$usuario' AND password = '$password'";

		$result = mysqli_query($conexion,$sql);

		$datos = mysqli_fetch_array($result);

		if($datos['Total'] > 0){

			//Si encuentra al usuario
			$_SESSION['usuario'] = $usuario; 

			header("location:../vistas/inicio.php");

		}else{

			//Si no encuentra al usuario
			header("location:../index.php");
		}

	}

  }

?>
