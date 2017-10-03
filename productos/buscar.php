<?php
include_once("../basededatos/bd.php");
$nombre=$_POST['nombre'];
$productos=seleccionar("producto","*","nombre LIKE '$nombre%' and activo=1 ORDER BY nombre");

?>
<link href="../css/core.css" type="text/css" rel="stylesheet">
<table class="tablalistado">
<tr class="titulo">
    <td>N</td>
    <td>Nombre</td>
    <td>Marca</td>
    <td>Precio</td>
    <td>Talla</td>
    <td>Detalle</td>
    <td></td>
</tr>
<?php
foreach($productos as $p){$i++;
  ?>
  <tr class="contenido">
    <td><?php echo $i?></td>
    <td><?php echo $p['nombre']?></td>
    <td><?php echo $p['marca']?></td>
    <td><?php echo $p['precio']?></td>
    <td><?php echo $p['talla']?></td>
    <td><?php echo $p['detalle']?></td>
    <td><a href="ver.php?codproducto=<?php echo $p['codproducto']?>" class="botoninfo" target="_parent">Ver Datos</a></td>
    <td><a href="modificar.php?codproducto=<?php echo $p['codproducto']?>" class="botoninfo" target="_parent">Modificar</a></td>
    <td><a href="eliminar.php?codproducto=<?php echo $p['codproducto']?>" class="botoninfo" target="_parent">Eliminar</a></td>
    </tr>   
  <?php  
}
?>
</table>