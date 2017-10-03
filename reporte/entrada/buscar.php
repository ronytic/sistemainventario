<?php
include_once("../../basededatos/bd.php");
$codproducto=$_POST['codproducto'];
$desdefechaentrada=$_POST['desdefechaentrada']!=""?$_POST['desdefechaentrada']:'%';
$hastafechaentrada=$_POST['hastafechaentrada']!=""?$_POST['hastafechaentrada']:'%';
$entrada=seleccionar("entrada","*","codproducto LIKE '$codproducto' and fechaentrada BETWEEN '$desdefechaentrada'and '$hastafechaentrada'and activo=1 ORDER BY fechaentrada");


?>
<link href="../../css/core.css" type="text/css" rel="stylesheet">
<input type="button"  value="Imprimir" onClick="window.print()">
<h3>Reporte de Entrada de Productos</h3>
<table class="tablalistado">
<tr class="titulo">
    <td>N</td>
    <td>Nombre</td>
    <td>Marca</td>
    <td>Precio</td>
    <td>Talla</td>
    <td>Detalle</td>
    <td>Cantidad</td>
    <td>Devolución</td>
    <td>Fecha de Entrada</td>
    <td></td>
</tr>
<?php
    $t=0;
    $d=0;
foreach($entrada as $e){$i++;
                        $t=$t+$e['cantidad'];
                        $d=$d+$e['devuelto'];
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
    <td class="der"><?php echo $e['devuelto']?></td>
    <td><?php echo $e['fechaentrada']?></td>
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
    <td class="der"><?php echo $d?></td>
    <td></td>
    <td></td>
</tr>
</table>