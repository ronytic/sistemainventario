<?php
$ruta="../";
include_once("../cabecerahtml.php");
?>
<?php include_once("../cabecera.php");?>

<div class="prefix_3 grid_6">
  <div class="titulo">Listado de Productos</div>
   <form action="buscar.php" method="post" target="contenido">
    <table class="tablareg">
       <tr>
           <td>Nombre Producto:<br>
           <input type="text" name="nombre" value="">
           </td>
           <td>Código de Producto:<br>
           <input type="text" name="codigo" value="">
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
<?php include_once("../piepagina.php");?>