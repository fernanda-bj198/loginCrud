<?php 

session_start();

//Recibe usuarios
if (isset($_SESSION['usuario'])) {

	require_once "dependencias.php";

	require_once "registroTabla.php";

	?>

	<?php

}else{

	header("location:../index.php");

}

?>