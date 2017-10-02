<?php
session_start();
date_default_timezone_set("America/La_Paz");
setlocale(LC_TIME, 'es_ES.UTF-8');
setlocale(LC_TIME, 'spanish');
include_once("conexion.php");
$link=mysql_connect($bd_host,$bd_usuario,$bd_contrasena);
mysql_select_db($bd_nombre,$link);
mysql_query("SET NAMES utf8");

//funcion para seleccionar campos de una tabla
function seleccionar($nombre_tabla,$campos,$condicion,$orden=""){
	$consultasql="SELECT $campos FROM $nombre_tabla";
	if($condicion!=""){
		$consultasql=$consultasql." WHERE $condicion";	
	}
	if($orden!=""){
		$consultasql=$consultasql." ORDER BY $orden";		
	}
	//echo $consultasql;	
	$respuesta=mysql_query($consultasql);
	$datos=array();
	if(@mysql_num_rows($respuesta)>0){
		while($fila=mysql_fetch_assoc($respuesta)){
			array_push($datos,$fila);
		}
	}
	return $datos;
}
//funcion para insertar datos a una tabla
function insertar($nombre_tabla,$datos){
	//echo "<pre>";
	//print_r($datos);
	//echo "</pre>";
	$aux_cabecera_vector=array();
	$aux_valor_vector=array();
	foreach($datos as $cabecera=>$valor){
		array_push($aux_cabecera_vector,$cabecera);
		array_push($aux_valor_vector,"'".$valor."'");
	}
	array_push($aux_cabecera_vector,"codusuario");
	array_push($aux_cabecera_vector,"fecha");
	array_push($aux_cabecera_vector,"hora");
	array_push($aux_cabecera_vector,"activo");
	
	$cod_usuario=$_SESSION['cod_usuario'];
	if($cod_usuario==""){$cod_usuario=0;}
	array_push($aux_valor_vector,$cod_usuario);
	array_push($aux_valor_vector,"'".date("Y-m-d")."'");
	array_push($aux_valor_vector,"'".date("H:i:s")."'");
	array_push($aux_valor_vector,"1");
	
	$nombre_campos=implode(",",$aux_cabecera_vector);
	$valores=implode(",",$aux_valor_vector);

	
	$consultasql="INSERT INTO $nombre_tabla($nombre_campos) VALUES($valores)";
	//echo $consultasql;
	return mysql_query($consultasql);
}

//funcion para actualizar los datos de una tabla
function actualizar($nombre_tabla,$datos,$condicion){
	$aux_vector_datos=array();
	foreach($datos as $cabecera=>$valor){
		array_push($aux_vector_datos,"$cabecera='$valor'");
	}
	$valores=implode(",",$aux_vector_datos);
	//UPDATE tabla SET campo1='valor',campo2='valor2'
	$consultasql="UPDATE $nombre_tabla SET $valores WHERE $condicion";
	//echo $consultasql;
	return mysql_query($consultasql);
}

//funcion para eliminar datos a una tabla
function eliminar($nombre_tabla,$condicion){
	//$consultasql="DELETE FROM $nombre_tabla WHERE $condicion";
	$consultasql="UPDATE $nombre_tabla SET activo=0 WHERE $condicion";
	mysql_query($consultasql);
}
?>