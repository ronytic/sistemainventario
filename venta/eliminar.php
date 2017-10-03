<?php
$codventa=$_GET['codventa'];
include_once("../basededatos/bd.php");
actualizar("venta",array("activo"=>0),"codventa=".$codventa);
header("Location:listar.php");
?>