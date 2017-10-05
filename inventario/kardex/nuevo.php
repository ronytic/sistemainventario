<?php
$ruta="../../";
include_once("../../basededatos/bd.php");

$productos=seleccionar("producto","*","activo=1 ORDER BY nombre");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Ver kardex del Producto</div>
   <form action="buscarproducto.php" method="post" target="contenido">
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
           
           <td>
           <input type="submit"  value="Buscar">
           </td>
       </tr>
   </table>
    </form>
</div>
<div class="grid_12">
    <iframe name="contenido" width="100%" height="500"></iframe>
    
</div>
<?php include_once("../../piepagina.php");?>