<?php
session_start();
if($_SESSION['login']==0 or $_SESSION['cod_usuario']==0){
	header("Location:".$ruta."login/index.php");	
}
?>