<?php
$usuario=$_POST['usuario'];
$contrasena=md5($_POST['contrasena']);
$nombres=$_POST['nombres'];
$ap_paterno=$_POST['ap_paterno'];
$ap_materno=$_POST['ap_materno'];
$ci=$_POST['ci'];
$celular=$_POST['celular'];
$nivelusuario=$_POST['nivelusuario'];


if($usuario!="" && $contrasena!=""){
	include_once("../basedatos/bd.php");
	$datos=array(	"usuario"=>"$usuario",
					"contrasena"=>"$contrasena",
					"nombres"=>"$nombres",
					"ap_paterno"=>"$ap_paterno",
					"ap_materno"=>"$ap_materno",
					"ci"=>"$ci",
					"celular"=>"$celular",
					"nivelusuario"=>"$nivelusuario",
					);
$resultado=insertar("usuario",$datos);
}
else{
	}
?>
<?php
$titulo="<--USUARIOS DEL SISTEMA-->";
$ruta="../";
include_once($ruta."login/verificar.php");
?>
<?php include_once($ruta."cabecerahtml.php");?>
<?php include_once($ruta."cabecera.php");?>

<?php if($resultado){
	?>
    <div class="alert alert-success">
		<?php echo  "USUARIO REGISTRADO CORRECTAMENTE";?>
    </div>
    <a href="usuarios.php" class="btn btn-info">REGISTRAR NUEVO USUARIO</a>
    
	<a href="<?php echo $ruta?>index.php" class="btn btn-info">INICIO</a>
	<?php }else{
	?>
    <div class="alert alert-danger">
		<?php echo  "USUARIO NO FUE REGISTRADO CORRECTAMENTE - VUELVA A INTENTARLO";?>
    </div>
    <a href="usuarios.php" class="btn btn-danger">Volver al Registro</a>
<?php }?>

<?php include_once($ruta."pie.php");?>


