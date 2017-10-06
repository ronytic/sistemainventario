<?php
$ruta="../";
include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Registro de Producto</div>
   <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto:<br>
           <input type="text" name="nombre" value="">
           </td>
       </tr>
       <tr>
           <td>Marca Producto:<br>
           <input type="text" name="marca" value="">
           </td>
       </tr>
       <tr>
           <td>Precio Producto:<br>
           <input type="text" name="precio" value="">
           </td>
       </tr>
    <tr>
           <td>Talla Producto:<br>
           <input type="text" name="talla" value="">
           </td>
       </tr>
       <tr>
           <td>Detalle Producto:<br>
           <select name="detalle">
               <option value="NIÑA">Niña</option>
               <option value="NIÑO">Niño</option>
               <option value="DAMA">Dama</option>
               <option value="VARON">Varon</option>
           </select>
           </td>
       </tr>
       <tr>
           <td>Foto del Producto:<br>
           <input type="file" name="foto" value="">
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