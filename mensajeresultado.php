<?php
include_once $ruta.'cabecerahtml.php';

?>
<?php include_once $ruta.'cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
                <?php
                foreach($mensaje as $m){
					?>
                    <div class="titulo"><?php echo $m?></div>
                    <?php
						
				}
				?>
                <?php if(count($botones)){foreach($botones as $ba=>$bn){
				?><a href="<?php echo $ba;?>?id=<?php echo $id;?>" class="botoninfo" target="_blank" ><?php echo $bn?></a><?php
				}
				}?>
                <hr />
                <?php if($nuevo==0){?>
                <a href="nuevo.php" class="botoncorrecto" >Nuevo Registro</a>
                <?php }?>
                
                <?php if($listar==0){?>
                <a href="listar.php" class="botonalerta">Listar Registros</a>
                <?php }?>
         	</fieldset>
        </div>
        <div class="clear"></div>
    </div>
</div> 
<?php include_once($ruta."piepagina.php")?>