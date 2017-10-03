<?php
include_once("../basededatos/bd.php");
$codproducto=$_POST['codproducto'];
$fechaventa=$_POST['fechaventa']!=""?$_POST['fechaventa']:'%';
$venta=seleccionar("venta","*","codproducto LIKE '$codproducto' and fechaventa LIKE '$fechaventa'and activo=1 ORDER BY fechaventa");


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
    <td>Cantidad Vendida</td>
     <td>Precio</td>
     <td>Total</td>
    <td>Fecha de Venta</td>
    <td></td>
</tr>
<?php
foreach($venta as $e){$i++;
$producto=seleccionar("producto","*","codproducto LIKE '".$e['codproducto']."' and activo=1 ORDER BY nombre");                        $p=array_shift($producto);
  ?>
  <tr class="contenido">
    <td><?php echo $i?></td>
    <td><?php echo $p['nombre']?></td>
    <td><?php echo $p['marca']?></td>
    <td><?php echo $p['precio']?></td>
    <td><?php echo $p['talla']?></td>
    <td><?php echo $p['detalle']?></td>
    <td class="der"><?php echo $e['cantidad']?></td>
    <td class="der"><?php echo $e['precio']?></td>
    <td class="der"><?php echo $e['total']?></td>
    <td><?php echo $e['fechaventa']?></td>
    <td><a href="eliminar.php?codventa=<?php echo $e['codventa']?>" class="botoninfo" target="_parent">Eliminar</a></td>
    </tr>   
  <?php  
}
?>
</table>