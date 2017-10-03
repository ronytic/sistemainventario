<?php
include_once("../../basededatos/bd.php");
$codproducto=$_POST['codproducto'];
$desdefechaventa=$_POST['desdefechaventa']!=""?$_POST['desdefechaventa']:'%';
$hastafechaventa=$_POST['hastafechaventa']!=""?$_POST['hastafechaventa']:'%';
$entrada=seleccionar("venta","*","codproducto LIKE '$codproducto' and fechaventa BETWEEN '$desdefechaventa' and '$hastafechaventa'and activo=1 ORDER BY fechaventa");


?>
<link href="../../css/core.css" type="text/css" rel="stylesheet">
<input type="button"  value="Imprimir" onClick="window.print()">
<h3>Reporte de Venta de Productos</h3>
<table class="tablalistado">
<tr class="titulo">
    <td>N</td>
    <td>Nombre</td>
    <td>Marca</td>
    <td>Precio</td>
    <td>Talla</td>
    <td>Detalle</td>
    <td>Cantidad</td>
    <td>Precio</td>
    <td>Total</td>
    <td>Fecha de Venta</td>
</tr>
<?php
    $t=0;
    $tot=0;
foreach($entrada as $e){$i++;
                        $t=$t+$e['cantidad'];
                        $tot=$tot+$e['total'];
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
    </tr>   
  <?php  
}
?>
<tr class="titulo">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="der"><?php echo $t?></td>
    <td></td>
    <td class="der"><?php echo $tot?></td>
</tr>
</table>