<?php
$ruta="../";
include_once("../basededatos/bd.php");
include_once("../basededatos/config.php");


if(isset($_GET['codigo'])){
    $codigoseparado=explode("-",$_GET['codigo']);
    $codproducto=$codigoseparado[3];
//    echo $codproducto;
    
}else{
$codproducto=$_GET['codproducto'];
}
$producto=seleccionar("producto","*","codproducto=$codproducto and activo=1");
$producto=array_shift($producto);


$entradas=seleccionar("entrada","SUM(cantidad)-SUM(devuelto) as Total","codproducto=$codproducto and activo=1");
$entradas=array_shift($entradas);
$entradasTotales=$entradas['Total'];

$salidas=seleccionar("venta","sum(cantidad) as Total","codproducto=$codproducto and activo=1");
$salidas=array_shift($salidas);
$salidasTotales=$salidas['Total'];

$stock=$entradasTotales-$salidasTotales;

include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Datos del Producto para la Venta</div>
   <form action="guardar.php" method="post" enctype="multipart/form-data">
   <input type="hidden" name="codproducto" value="<?php echo $codproducto?>">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto: <?php echo $producto['nombre']?>
           
           </td>
           <td rowspan="5">Foto del Producto: <br><img src="../imagenes/productos/<?php echo $producto['foto']?>" width="200">
           </td>
       </tr>
       <tr>
           <td>Marca Producto: <?php echo $producto['marca']?>
           
           </td>
       </tr>
       <tr>
           <td>Precio Producto: <?php echo $producto['precio']?>
           </td>
       </tr>
       <tr>
           <td>Talla Producto: <?php echo $producto['talla']?>
           </td>
       </tr>
       <tr>
           <td>Detalle Producto: <?php echo $producto['detalle']?>
           </td>
       </tr>
       <tr>
           <td colspan="2">
           <strong><h3>STOCK DE INVENTARIO: <?php echo $stock;?></h3></strong>
           </td>
       </tr>
       <tr>
           <td colspan="2">
           CANTIDAD DE VENTA: <br>
           <input type="number" name="cantidad" min="0" max="<?php echo $stock;?>" value="0">
           </td>
       </tr>
       <tr>
           <td colspan="2">
           FECHA DE VENTA: <br>
           <input type="date" name="fechaventa" value="<?php echo date("Y-m-d");?>" required>
           </td>
       </tr>
       <tr>
           <td>
           <input type="submit"  value="Guardar">
           </td>
       </tr>
   </table>
    </form>
</div>

<?php include_once("../piepagina.php");?>