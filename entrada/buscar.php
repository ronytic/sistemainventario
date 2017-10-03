<?php
include_once("../basededatos/bd.php");
$codproducto=$_POST['codproducto'];
$fechaentrada=$_POST['fechaentrada']!=""?$_POST['fechaentrada']:'%';
$entrada=seleccionar("entrada","*","codproducto LIKE '$codproducto' and fechaentrada LIKE '$fechaentrada'and activo=1 ORDER BY fechaentrada");


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
    <td>Cantidad</td>
    <td>Devolución</td>
    <td>Fecha de Entrada</td>
    <td></td>
</tr>
<?php
foreach($entrada as $e){$i++;
$producto=seleccionar("producto","*","codproducto LIKE '".$e['codproducto']."' and activo=1 ORDER BY nombre");                        $p=array_shift($producto);
  ?>
  <tr class="contenido">
    <td><?php echo $i?></td>
    <td><?php echo $p['nombre']?></td>
    <td><?php echo $p['marca']?></td>
    <td><?php echo $p['precio']?></td>
    <td><?php echo $p['talla']?></td>
    <td><?php echo $p['detalle']?></td>
    <td><?php echo $e['cantidad']?></td>
    <td><?php echo $e['devuelto']?></td>
    <td><?php echo $e['fechaentrada']?></td>
    <td><a href="modificar.php?codentrada=<?php echo $e['codentrada']?>" class="botoninfo" target="_parent">Devolución</a></td>
    </tr>   
  <?php  
}
?>
</table>