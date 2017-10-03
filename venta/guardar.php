<?php
include_once("../basededatos/bd.php");

$ruta="../"; //DEfiniendo Ruta


//CAPTURA DE DATOS DEL FORMULARIO


$codproducto=$_POST['codproducto'];
$cantidad=$_POST['cantidad'];
$fechaventa=$_POST['fechaventa'];
$precio=$_POST['precio'];
$total=$_POST['total'];
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];


//PREpARAMOS DATOS PARA GUARDAR
$valores=array(
    "codproducto"=>"$codproducto",
    "cantidad"=>"$cantidad",
    "fechaventa"=>"$fechaventa",
    "precio"=>"$precio",
    "total"=>"$total",
    "ci"=>"$ci",
    "nombre"=>"$nombre",
);

//GUARDAMOS DATOS
insertar("venta",$valores);



$mensaje[]="GUARDADO CORRECTAMENTE";
include_once("../mensajeresultado.php");
?>