<?php
$codigo_usuario=$_GET['codigo_usuario'];
include_once("../login/verificar.php");
include_once("../basedatos/bd.php");
eliminar("usuario","codigo_usuario=$codigo_usuario");
?>