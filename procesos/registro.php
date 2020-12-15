<?php

require_once "../clases/Usuarios.php";

$Usuarios = new Usuarios(); 

$nombre = $_POST['nombre'];
$am = $_POST['apellidom'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$respuesta = $Usuarios->agregarUsuario($nombre, $am, $email, $usuario, $password);


if($respuesta){

	?>

	<script>

		alert("Regitro Exitoso");

		window.location.href='../registro.php';
		
	</script>

	<?php

}else{

	?>

	<script>

		alert("Registro Fallido");

		window.location.href='../registro.php';
		

	</script>

	<?php

}


 ?>