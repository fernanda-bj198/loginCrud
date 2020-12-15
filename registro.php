<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
	<?php require_once "dependencias.php"; ?>
</head>
<body>
	<div class="container">
	     <h1>Registro de Usuarios</h1>
		<div class="row">
		<div class="col-sm-4">
			<form action="procesos/registro.php" method="post">

				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" required="">
				<label for="apellidom">Apellido Materno</label>
				<input type="text" name="apellidom" id="apellidom" class="form-control" required="">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control" required="">
				<label for="usuario">Usuario</label>
			    <input type="text" name="usuario" id="usuario" class="form-control" required="">
			    <label for="password">Password</label>
			    <input type="password" name="password" id="password" class="form-control" required="">
			    <br>
			    <button class="btn btn-danger">Registrar</button>
			    <a href="index.php" class="btn btn-primary">Regresar</a>
			</form>

		</div>	
			
		</div>

	</div>

</body>
</html>
