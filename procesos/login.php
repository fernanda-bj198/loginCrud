<?php

session_start();
require_once "../clases/Usuarios.php";
$Usuarios= new Usuarios();
$usuario = $_POST['usuario'];
$password = $_POST['password']; 
//Regreso a funcion login
$Usuarios->login($usuario, $password);

 ?>