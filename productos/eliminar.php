<?php
$codproducto=$_GET['codproducto'];
include_once("../basededatos/bd.php");
actualizar("producto",array("activo"=>0),"codproducto=".$codproducto);
header("Location:listar.php");
?>