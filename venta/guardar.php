<?php
include_once("../basededatos/bd.php");

$ruta="../"; //DEfiniendo Ruta


//CAPTURA DE DATOS DEL FORMULARIO


$codproducto=$_POST['codproducto'];
$cantidad=$_POST['cantidad'];
$fechaventa=$_POST['fechaventa'];



//PREpARAMOS DATOS PARA GUARDAR
$valores=array(
    "codproducto"=>"$codproducto",
    "cantidad"=>"$cantidad",
    "fechaventa"=>"$fechaventa",
);

//GUARDAMOS DATOS
insertar("venta",$valores);



$mensaje[]="GUARDADO CORRECTAMENTE";
include_once("../mensajeresultado.php");
?>