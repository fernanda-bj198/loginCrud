<?php

require_once "../clases/Conexion.php"; 
require_once "../clases/crud.php";

$obj = new Crud();

$datos = array($_POST['concepto'], $_POST['cantidad'], $_POST['fecha']);

echo $obj->agregar($datos);

 ?>