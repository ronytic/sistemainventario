<?php
$titulo="USUARIOS AUTORIZADOS DEL SISTEMA";
$ruta="../";
include_once($ruta."login/verificar.php");
include_once("../basedatos/bd.php");

$consultasql="SELECT * FROM usuario";
$resultado=mysql_query($consultasql);
?>
<?php
include_once($ruta."cabecerahtml.php");
?>
<script type="text/javascript">
$(document).on("ready",function(){
	$("#formulario").on("submit",function(e){
		e.preventDefault();
		$.post("busqueda.php",function(datos){
			$("div.listado").html(datos);
			//alert(datos);
		});
	});
	$(".eliminar").click(function(e) {
        alert("Hola");
    });
	
	$(document).on("click",".eliminar",function(e) {
		e.preventDefault();
		if(confirm("¿Desea Eliminar Este Registro?")){
			var href=$(this).attr("href");
			$.get(href,{},function(data){
				$("#formulario").submit();	
			});
		}
    });
});
</script>
<?php
include_once($ruta."cabecera.php");
?>

<form action="busqueda.php" method="post" id="formulario">
	<table class="table table-bordered">
        <tr>
        	<td colspan="4"><center><input type="submit" value="Listar Usuarios del Sistema" class="btn btn-success"></center></td>
        </tr>
    </table>
</form>
<div class="listado"></div>
<?php
include_once($ruta."pie.php");
?>