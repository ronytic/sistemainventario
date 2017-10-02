<?php 
switch($nivelusuario){
    case 1:{$nu="superadmin";}break;
    case 2:{$nu="administrador";}break;
    case 3:{$nu="inventario";}break;
    case 4:{$nu="ventas";}break;
}
$men=seleccionar("menu","*","$nu=1 and activo=1 ORDER BY orden");
//print_r($men);
?>
<div  class="grid_12" >
<br>
<div id='cssmenu'>
<ul>
    <li><a href="<?php echo $folder; ?>index.php" class="selected active"><?php /*<img src="<?php echo $folder; ?>imagenes/ico/home2.png" width="40" height="40" align="middle" />*/?>Inicio</a></li>
<?php 
    $i=1;
    foreach ($men as $m) {$i++;?>
        <li  class='has-sub'><a href="#" rel="tab<?php echo $i;?>"><?php /*<img src="<?php echo $folder; ?>imagenes/ico/<?php echo $m['imagen'] ?>" width="40" height="40" align="middle" /> */?><?php echo $m['nombre'] ?></a>
        <?php if($m['submenu']){?>
            <ul>
              <?php foreach (seleccionar("submenu","*","$nu=1 and codmenu=".$m['codmenu']." and activo=1") as $sb): ?>
                <li><a href="<?php echo $ruta?><?php echo $m['url'] ?><?php echo $sb['url'] ?>"><?php /*<img src="<?php echo $folder; ?>imagenes/ico/<?php echo $sb['imagen']==""?'tick.png':$sb['imagen']; ?>" height="20" align="middle" />*/?> <?php echo $sb['nombre'] ?></a></li>	
              <?php endforeach ?>
            </ul>
        <?php }?>
        </li>
    <?php }?>
</ul>
</div>
</div>
<div class="clear"></div>
<div class="grid_12">
	<div class="usuariocuerpo">
		<span class="pequenol">Nombre:</span> <?php echo $us['nombre'];?> | 
		<span class="pequenol">Usuario:</span> <?php echo $us['usuario'];?> |
		
		<!--<a href="<?php echo $ruta?>usuarios/cambiarp.php?id=<?php echo $_SESSION['cod_usuario']?>" class="enlaceusuario">Cambiar Contraseña</a>-->
		<a href="<?php echo $ruta ?>login/salir.php" class="botonplomo">Salir del Sistema</a>
	</div>
</div>
<div class="clear"></div>