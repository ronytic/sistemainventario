<?php
$ruta="../";
include_once("../basededatos/bd.php");
include_once("../basededatos/config.php");
$codproducto=$_GET['codproducto'];
$producto=seleccionar("producto","*","codproducto=$codproducto");
$producto=array_shift($producto);

$direccionqr=$url.$directorio."/venta/ver.php?codigo=".$producto['codigo']. $producto['codproducto'];
//GENERAMOS CODIGO QR
include_once("phpqrcode/qrlib.php");
QRcode::png($direccionqr,"qr/".$producto['codigo']. $producto['codproducto'].".png",'L',5,1);

include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Datos del Producto</div>
   <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto: <?php echo $producto['nombre']?>
           
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
           <td>Foto del Producto: <br><img src="../imagenes/productos/<?php echo $producto['foto']?>" width="200">
           </td>
       
           <td>Código QR del Producto: <br><img src="qr/<?php echo $producto['codigo']?><?php echo $producto['codproducto']?>.png" width="200">
           </td>
       </tr>
       <tr>
           <td>
           <input type="button"  value="Imprimir" onClick="window.print()">
           </td>
       </tr>
   </table>
    </form>
</div>

<?php include_once("../piepagina.php");?>