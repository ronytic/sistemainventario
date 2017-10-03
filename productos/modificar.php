<?php
$ruta="../";

include_once("../basededatos/bd.php");
include_once("../basededatos/config.php");
$codproducto=$_GET['codproducto'];
$producto=seleccionar("producto","*","codproducto=$codproducto");
$producto=array_shift($producto);


include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Modificar de Producto</div>
   <form action="actualizar.php" method="post" enctype="multipart/form-data">
   <input type="hidden" name="codproducto" value="<?php echo $codproducto?>">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto:<br>
           <input type="text" name="nombre" value="<?php echo $producto['nombre']?>">
           </td>
       </tr>
       <tr>
           <td>Marca Producto:<br>
           <input type="text" name="marca" value="<?php echo $producto['marca']?>">
           </td>
       </tr>
       <tr>
           <td>Precio Producto:<br>
           <input type="text" name="precio" value="<?php echo $producto['precio']?>">
           </td>
       </tr>
       <tr>
           <td>Talla Producto:<br>
           <input type="text" name="talla" value="<?php echo $producto['talla']?>">
           </td>
       </tr>
       <tr>
           <td>Detalle Producto:<br>
           <select name="detalle">
               <option value="NIÑA" <?php echo $producto['detalle']=='NIÑA'?'selected="selected"':''?>>Niña</option>
               <option value="NIÑO" <?php echo $producto['detalle']=='NIÑO'?'selected="selected"':''?>>Niño</option>
               <option value="DAMA" <?php echo $producto['detalle']=='DAMA'?'selected="selected"':''?>>Dama</option>
               <option value="VARON" <?php echo $producto['detalle']=='VARON'?'selected="selected"':''?>>Varon</option>
           </select>
           </td>
       </tr>
       <tr>
           <td>Foto del Producto:<br>
           <input type="file" name="foto" value="">
           <br><img src="../imagenes/productos/<?php echo $producto['foto']?>" width="200">
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