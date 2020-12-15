<?php 

require_once "../clases/Conexion.php";
require_once "../clases/crud.php";


$obj = new Crud();
$datos = array($_POST['conceptoU'], $_POST['cantidadU'], $_POST['fechaU'], $_POST['idgasto']);
echo $obj->actualizar($datos);

 ?>