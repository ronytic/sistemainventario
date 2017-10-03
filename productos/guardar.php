<?php
include_once("../basededatos/bd.php");

$ruta="../"; //DEfiniendo Ruta


//CAPTURA DE DATOS DEL FORMULARIO


$nombre=$_POST['nombre'];
$marca=$_POST['marca'];
$precio=$_POST['precio'];
$talla=$_POST['talla'];
$detalle=$_POST['detalle'];
$foto=$_FILES['foto']['name'];

//COPIA DE FOTO
if($foto!=""){
    copy($_FILES['foto']['tmp_name'],"../imagenes/productos/".$_FILES['foto']['name']);
}



//SACAMOS EN CODIGO
$nombreseparado=explode(" ",$nombre);
$codigo=$marca[0]."-".$nombreseparado[0][0].$nombreseparado[1][0]."-".$detalle[0].$detalle[strlen($detalle)-1]."-";


//PREpARAMOS DATOS PARA GUARDAR
$valores=array(
    "nombre"=>"$nombre",
    "marca"=>"$marca",
    "precio"=>"$precio",
    "talla"=>"$talla",
    "detalle"=>"$detalle",
    "codigo"=>"$codigo",
    "foto"=>"$foto",
);

//GUARDAMOS DATOS
//insertar("producto",$valores);



$mensaje[]="GUARDADO CORRECTAMENTE";
include_once("../mensajeresultado.php");
?>