<?php
include_once("../../basededatos/bd.php");
$codproducto=$_POST['codproducto'];
$codigo=$_POST['codigo'];
$producto=seleccionar("producto","*","codproducto= '$codproducto'");
$p=array_shift($producto);
?>
<link href="../../css/core.css" type="text/css" rel="stylesheet">
<input type="button" value="Imprimir" onClick="window.print()">
<h3 class="centrar">Kardex</h3>
<table class="tablareg">
<tr class="titulo">
    <td>Nombre</td>
    <td>Marca</td>
    <td>Precio</td>
    <td>Talla</td>
    <td>Detalle</td>
    <td>Código</td>
</tr>

  <tr class="contenido">
    <td><?php echo $p['nombre']?></td>
    <td><?php echo $p['marca']?></td>
    <td><?php echo $p['precio']?></td>
    <td><?php echo $p['talla']?></td>
    <td><?php echo $p['detalle']?></td>

    <td><?php echo $p['codigo']?><?php echo $p['codproducto']?><br>
       <img src="../../productos/qr/<?php echo $p['codigo']?><?php echo $p['codproducto']?>.png" width="80">
        
    </td>
    
    </tr>   
</table>


<table class="tablareg">
<tr class="titulo">
    <td rowspan="2">Fecha</td>
    <td rowspan="2">Detalle</td>
    <td colspan="3">Entrada</td>
    <td colspan="3">Salida</td>
    <td colspan="3">Existencia</td>

</tr>
<tr class="titulo">
    <td>C</td> 
    <td>PU</td>
    <td>Total</td>
    <td>C</td> 
    <td>PU</td>
    <td>Total</td>
    <td>C</td> 
    <td>PU</td>
    <td>Total</td>
</tr>
<?php
    $totalc=0;
    $totalpu=0;
    $totalt=0;
    $ent=0;
for($j=1506830400;$j<=strtotime(date("Y-m-d"));$j=$j+86400){
    
    $entrada=seleccionar("entrada","*","fechaentrada='".date("Y-m-d",$j)."' and codproducto= '$codproducto'");
    if(count($entrada)>0){
       
        foreach($entrada as $e){
            $totalc=$totalc+$e['cantidad'];

            $ent++;
            ?>
            <tr>
                <td><?php echo date("d-m-Y",strtotime($e['fechaentrada']))?></td>
                <td>Entrada <?php echo $ent?></td>
                <td class="der"><?php echo $e['cantidad']?></td> 
                <td class="der"><?php echo $p['precio']?></td>
                <td class="der"><?php echo $e['cantidad']*$p['precio']?></td>
                <td class="der"></td> 
                <td class="der"></td>
                <td class="der"></td>
                <td class="der"><?php echo $totalc?></td> 
                <td class="der"><?php echo $p['precio']?></td>
                <td class="der"><?php echo $totalc*$p['precio']?></td>
            </tr>
           <?php 
                if($e['devuelto']>0){
                    $totalc=$totalc-$e['devuelto'];
                   ?>
                   <tr>
                        <td><?php echo date("d-m-Y",strtotime($e['fechaentrada']))?></td>
                        <td>Devolución</td>
                        <td class="der"></td> 
                        <td class="der"></td>
                        <td class="der"></td>
                        <td class="der"><?php echo $e['devuelto']?></td> 
                        <td class="der"><?php echo $p['precio']?></td>
                        <td class="der"><?php echo $e['devuelto']*$p['precio']?></td>
                        <td class="der"><?php echo $totalc?></td> 
                        <td class="der"><?php echo $p['precio']?></td>
                        <td class="der"><?php echo $totalc*$p['precio']?></td>
                    </tr>
                   
                   <?php 
                }
        }    
    
    }
    $ven=0;
    $venta=seleccionar("venta","*","fechaventa='".date("Y-m-d",$j)."' and codproducto= '$codproducto'");
    if(count($venta)>0){
       
        foreach($venta as $v){
            $totalc=$totalc-$v['cantidad'];

            $ven++;
            ?>
            <tr>
                <td><?php echo date("d-m-Y",strtotime($e['fechaentrada']))?></td>
                <td>Venta <?php echo $ven?> - <?php echo $v['ci'].", ".$v['nombre']?></td>
                <td class="der"></td> 
                <td class="der"></td>
                <td class="der"></td>
                <td class="der"><?php echo $v['cantidad']?></td> 
                <td class="der"><?php echo $v['precio']?></td>
                <td class="der"><?php echo $v['cantidad']*$v['precio']?></td>
                <td class="der"><?php echo $totalc?></td> 
                <td class="der"><?php echo $p['precio']?></td>
                <td class="der"><?php echo $totalc*$p['precio']?></td>
            </tr>
           <?php 
        }    
    
    }
  
}    
?>
</table>