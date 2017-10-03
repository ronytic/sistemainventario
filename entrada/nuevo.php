<?php
$ruta="../";
include_once("../basededatos/bd.php");

$productos=seleccionar("producto","*","activo=1 ORDER BY nombre");

include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Registro de Entrada de Producto</div>
   <form action="guardar.php" method="post" enctype="multipart/form-data">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto:<br>
           <select name="codproducto">
               <?php foreach($productos as $p){
                ?>
               <option value="<?php echo $p['codproducto']?>"><?php echo $p['nombre'];?></option>
                <?php
                }?>
           </select>
           </td>
       </tr>
       <tr>
           <td>Cantidad:<br>
           <input type="number" name="cantidad" value="0" min="0">
           </td>
       </tr>
       <tr>
           <td>Fecha:<br>
           <input type="date" name="fechaentrada" value="<?php echo date("Y-m-d");?>">
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