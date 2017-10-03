<?php
$ruta="../";
include_once("../basededatos/bd.php");

$codentrada=$_GET['codentrada'];

$entrada=seleccionar("entrada","*","codentrada=$codentrada");
$entrada=array_shift($entrada);



$productos=seleccionar("producto","*","activo=1 ORDER BY nombre");

include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Modificar de Entrada de Producto</div>
   <form action="actualizar.php" method="post" enctype="multipart/form-data">
   <input type="hidden" name="codentrada" value="<?php echo $codentrada?>">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto:<br>
           <select name="codproducto">
               <?php foreach($productos as $p){
                ?>
               <option value="<?php echo $p['codproducto']?>" <?php echo $p['codproducto']==$entrada['codproducto']?'selected="selected"':'';?> ><?php echo $p['nombre'];?></option>
                <?php
                }?>
           </select>
           </td>
       </tr>
       <tr>
           <td>Cantidad:<br>
           <input type="number" name="cantidad" value="<?php echo $entrada['cantidad']?>" min="0">
           </td>
       </tr>
       <tr>
           <td>Fecha Entrada:<br>
           <input type="date" name="fechaentrada" value="<?php echo $entrada['fechaentrada']?>">
           </td>
       </tr>
       <tr>
           <td>Devolución:<br>
           <input type="number" name="devuelto" value="<?php echo $entrada['devuelto']?>" min="0">
           </td>
       </tr>
       <tr>
           <td>Fecha Devolución:<br>
           <input type="date" name="fechadevuelto" value="<?php echo $entrada['fechadevuelto']?>">
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