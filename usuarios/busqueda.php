<?php
$titulo="LISTA DE USUARIOS DEL SISTEMA";
$ruta="../";
include_once("../login/verificar.php");
/*
$ci=$_POST['ci'];
$ap_paterno=$_POST['ap_paterno'];
$ap_materno=$_POST['ap_materno'];
$nombres=$_POST['nombres'];*/

include_once("../basedatos/bd.php");


$resultado=seleccionar("usuario","*","ci LIKE '$ci%' AND ap_paterno LIKE '$ap_paterno%' AND ap_materno LIKE '$ap_materno%' AND nombres LIKE '$nombres%' and activo=1");

?>
<table class="table table-striped table-bordered table-hover">
	<thead>
    	<tr>
        	<th>N</th>
            <th>Nombres</th>
            <th>Ap. Paterno</th>
            <th>Ap. Materno</th>
            <th>Usuario</th>
            <th>Nivel de Usuario</th>
            <th>Celular</th>
            <th><a href="reporteusuario.php" class="btn btn-success btn-sm btn-block" target="_blank" title="Reporte General"><center><i class=" glyphicon glyphicon-list"></i></center></a></th>
        </tr>
    </thead>

<?php
foreach($resultado as $fila){$i++;
?>
    <tr>
    	<td><?php echo $i?></td>
        <td><?php echo ucwords($fila['nombres'])?></td>
        <td><?php echo ucwords($fila['ap_paterno'])?></td>
        <td><?php echo ucwords($fila['ap_materno'])?></td>
        <td><?php echo $fila['usuario']?></td>
        <td><?php switch($fila['nivelusuario']){
				case '1':echo 'Administrador';break;
				case '2':echo 'Jefe de Unidad';break;
				case '3':echo 'Ventanilla Unica';break;
				case '4':echo 'Inspector';break;
				case '5':echo 'Medico';break;
				case '6':echo 'Enfermera';break;
				case '7':echo 'Recepcion de certificado';break;
				case '8':echo 'Cajero(a)';break;
				case '9':echo 'Dr(a) Laboratorio';break;
				case '10':echo 'Recepcion de Carnet';break;
				}?></td>
        <td><?php echo $fila['celular']?></td>
        <td><a href="modificar.php?codigo_usuario=<?php echo $fila['codigo_usuario']?>" class="btn btn-warning btn-xs " title="Modificar"><i class=" glyphicon glyphicon-pencil"></i></a>
        	<a href="eliminar.php?codigo_usuario=<?php echo $fila['codigo_usuario']?>" class="btn btn-danger btn-xs eliminar" title="Eliminar"><i class=" glyphicon glyphicon-remove"></i></a>
        </td>
    </tr>
<?php
}
?>
</table>