<?php
session_start();
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
//echo "_".$contrasena."_";
if($usuario=="" or $contrasena==""){
	// echo "Entro";	
	header("Location:index.php?vacio=1");//REDIRIGI A OTRO ARCHIVO INMEDIATAMENTE
	exit();
}
//Consulta de conexión de la BD
include_once("../basededatos/bd.php");
$registro=seleccionar("usuario","*","usuario='$usuario' and password=MD5('$contrasena')");
$cantidadfilas=count($registro);

if($cantidadfilas==0){//incorrecto
	$_SESSION['login']=0;
	header("Location:index.php?incorrecto=1");	
}else{//correcto
	$fila=array_shift($registro);
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	$agente=$_SERVER['HTTP_USER_AGENT'];
	
	$_SESSION['login']=1;
	$_SESSION['cod_usuario']=$fila['codigo_usuario'];
	$_SESSION['nivelusuario']=$fila['nivelusuario'];
	
	$valores=array("nivelusuario"=>$fila['nivelusuario'],
				   "ip"=>"$ip",
				   "agente"=>"$agente"
	);
	insertar("login",$valores);
	header("Location:../index.php");	
}
?>