<?php 

require_once "../clases/Conexion.php";
require_once "../clases/crud.php";


$obj = new Crud();

echo $obj->eliminar($_POST['idgasto']);


 ?>