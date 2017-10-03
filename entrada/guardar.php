<?php
include_once("../basededatos/bd.php");

$ruta="../"; //DEfiniendo Ruta


//CAPTURA DE DATOS DEL FORMULARIO


$codproducto=$_POST['codproducto'];
$cantidad=$_POST['cantidad'];
$fechaentrada=$_POST['fechaentrada'];



//PREpARAMOS DATOS PARA GUARDAR
$valores=array(
    "codproducto"=>"$codproducto",
    "cantidad"=>"$cantidad",
    "fechaentrada"=>"$fechaentrada",
);

//GUARDAMOS DATOS
insertar("entrada",$valores);



$mensaje[]="GUARDADO CORRECTAMENTE";
include_once("../mensajeresultado.php");
?>