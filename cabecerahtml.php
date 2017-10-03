<?php
session_start();
include_once 'basededatos/bd.php';
include_once 'basededatos/config.php';
$codusuario=$_SESSION['cod_usuario'];
$nivelusuario=$_SESSION['nivelusuario'];


$us=seleccionar("usuario","*","codigo_usuario=".$codusuario);
$us=array_shift($us);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<title><?php echo $titulo;?></title>
<link href="<?php echo $ruta;?>css/960/960.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $ruta;?>css/tabcontent.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ruta;?>css/core.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $ruta;?>css/menu/styles.css" type="text/css" rel="stylesheet">
<link href="<?php echo $ruta;?>css/select2.css" type="text/css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $folder; ?>imagenes/favicon.ico" />
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/tabcontent.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/select2.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/select2_locale_es.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/busquedas/busquedas.js"></script>