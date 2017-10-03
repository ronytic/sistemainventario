<?php
include_once("../basededatos/bd.php");

$ruta="../"; //DEfiniendo Ruta


//CAPTURA DE DATOS DEL FORMULARIO

$codentrada=$_POST['codentrada'];
$codproducto=$_POST['codproducto'];
$cantidad=$_POST['cantidad'];
$fechaentrada=$_POST['fechaentrada'];
$devuelto=$_POST['devuelto'];
$fechadevuelto=$_POST['fechadevuelto'];



//PREpARAMOS DATOS PARA GUARDAR
$valores=array(
    "codproducto"=>"$codproducto",
    "cantidad"=>"$cantidad",
    "fechaentrada"=>"$fechaentrada",
    "devuelto"=>"$devuelto",
    "fechadevuelto"=>"$fechadevuelto",
);

//GUARDAMOS DATOS
actualizar("entrada",$valores,"codentrada=$codentrada");



$mensaje[]="GUARDADO CORRECTAMENTE";
include_once("../mensajeresultado.php");
?>