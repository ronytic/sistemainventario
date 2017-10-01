<?php
session_start();
$_SESSION['login']=0;
$_SESSION['cod_usuario']=0;
unset($_SESSION['login']);//eliminan la sesion
unset($_SESSION['cod_usuario']);
session_destroy();
header("Location:../index.php");
?>