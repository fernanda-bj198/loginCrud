<?php
  class Conexion{

  	public function conectar(){

  		$conexion = mysqli_connect('localhost', 'root', '', 'topicos');
  		
  		return $conexion;
  	}

  }

 ?>


 