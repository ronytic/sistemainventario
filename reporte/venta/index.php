<?php
$ruta="../../";

include_once("../../basededatos/bd.php");

$productos=seleccionar("producto","*","activo=1 ORDER BY nombre");

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>

<div class="prefix_2 grid_8">
  <div class="titulo">Reporte de Venta de Productos</div>
   <form action="buscar.php" method="post" target="contenido">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto:<br>
           <select name="codproducto">
              <option value="%">Todos</option>
               <?php foreach($productos as $p){
                ?>
               <option value="<?php echo $p['codproducto']?>"><?php echo $p['nombre'];?></option>
                <?php
                }?>
           </select>
           </td>
            <td>Desde Fecha de Venta:<br>
               <input type="date" name="desdefechaventa" required value="<?php echo date("Y-m-d")?>"></td>
           <td>
           <td>Hasta Fecha de Venta:<br>
               <input type="date" name="hastafechaventa" required value="<?php echo date("Y-m-d")?>"></td>
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