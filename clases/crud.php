<?php 

class Crud {

	public function agregar($datos){

		$obj = new Conexion();

		$conexion = $obj->conectar();

		$sql = "INSERT INTO t_gasto (conceptoG, cantidadG, fecha) VALUES ('$datos[0]', '$datos[1]', '$datos[2]')";

		return mysqli_query($conexion, $sql);
		
	}


	public function obtenDatos($idgasto){

		$obj = new Conexion();

		$conexion = $obj->conectar();

		//Consultar el id
		$sql = "SELECT id_gasto, conceptoG, cantidadG, fecha FROM t_gasto WHERE id_gasto = '$idgasto'";

		$result = mysqli_query($conexion, $sql);

		$ver = mysqli_fetch_row($result);

		//Visualizar los datos en los inputs para poder editarlos
		$datos = array('id_gasto'=> $ver[0],'conceptoG'=> $ver[1], 'cantidadG'=> $ver[2], 'fecha'=> $ver[3]);

		return $datos;
	}


	public function actualizar ($datos){

		$obj = new Conexion();

		$conexion = $obj->conectar();

		$sql = "UPDATE t_gasto SET conceptoG='$datos[0]', cantidadG='$datos[1]', fecha='$datos[2]' WHERE id_gasto = '$datos[3]'";

		return mysqli_query($conexion, $sql);

	}


	public function eliminar($idgasto){

		$obj = new Conexion();

		$conexion = $obj->conectar();

		$sql = "DELETE FROM t_gasto WHERE id_gasto = '$idgasto'";

		return mysqli_query($conexion, $sql);

	}

}

 ?>