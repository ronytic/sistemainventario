<?php
$ruta="../";
include_once($ruta."login/verificar.php");
include_once("../basedatos/bd.php");
$codigo_usuario=$_GET['codigo_usuario'];
//echo $codigo_usuario;
$fila=seleccionar("usuario","*","codigo_usuario=$codigo_usuario");
$fila=array_shift($fila);
$titulo="REGISTRO DE USUARIOS DEL SISTEMA";

include_once($ruta."cabecerahtml.php");
?>
<?php
include_once($ruta."cabecera.php");
?>
<form action="actualizar.php" method="post">
	<input type="hidden" name="codigo_usuario" value="<?php echo $codigo_usuario?>">
        <table class="table">
     		<tr>
          		<td><label for="usuario"> Usuario:</label> </td>
             	<td><input type="text" class="form-control" name="usuario" id="usuario" maxlength="20" size="20" value="<?php echo $fila['usuario']?>">
                </td>
       		</tr>
       		<tr>
           		<td><label for="contrasena"> Contraseña:</label> </td>
        		<td><input type="password" class="form-control" name="contrasena" id="contrasena" maxlength="60" size="60" value="<?php echo $fila['contrasena']?>">
            	</td>
       		</tr>
      		<tr>
        		<td><label for="nombres"> Nombres:</label> </td>
       			<td colspan="2"><input type="text" class="form-control" name="nombres" id="nombres" maxlength="50" size="50" value="<?php echo $fila['nombres']?>">
               	</td>
			</tr>
           	<tr>
             	<td><label for="ap_paterno"> Apellido Paterno:</label> </td>
             	<td colspan="2"><input type="text" class="form-control" name="ap_paterno" id="ap_paterno" maxlength="50" size="50" value="<?php echo $fila['ap_paterno']?>"></td> 
           	</tr>
           	<tr>
           		<td><label for="ap_materno"> Apellido Materno:</label> </td>
              	<td colspan="2"><input type="text" class="form-control" name="ap_materno" id="ap_materno" maxlength="50" size="50" value="<?php echo $fila['ap_materno']?>">
   				</td> 
  			</tr>
         	<tr>
           		<td><label for="carnet">Carnet de Identidad:</label> </td>
              	<td >
              		<input type="text" class="form-control" name="ci" id="ci" maxlength="12" size="12"value="<?php echo $fila['ci']?>">
              	</td>
  			</tr>
        	<tr>
       			<td><label for="nivel">Nivel de Usuario:</label></td>
        		<td>
             		<select name="nivelusuario" class="form-control">
              			<option value="1"<?php echo $fila['nivelusuario']=="1"?'selected="selected"':''?>></option>
                    	<option value="2"<?php echo $fila['nivelusuario']=="2"?'selected="selected"':''?>>Jefe de Unidad</option>
              	      	<option value="3"<?php echo $fila['nivelusuario']=="3"?'selected="selected"':''?>>Ventanilla Unica</option>
                      	<option value="4"<?php echo $fila['nivelusuario']=="4"?'selected="selected"':''?>>Inspector</option>
                      	<option value="5"<?php echo $fila['nivelusuario']=="5"?'selected="selected"':''?>>Medico</option>
                       	<option value="6"<?php echo $fila['nivelusuario']=="6"?'selected="selected"':''?>>Enfermera</option>
                       	<option value="7"<?php echo $fila['nivelusuario']=="7"?'selected="selected"':''?>>Recepcion de Certificacion</option>
                       	<option value="8"<?php echo $fila['nivelusuario']=="8"?'selected="selected"':''?>>Cajero</option>
                        <option value="9"<?php echo $fila['nivelusuario']=="9"?'selected="selected"':''?>>Doctora de Laboratorio</option>
                        <option value="10"<?php echo $fila['nivelusuario']=="10"?'selected="selected"':''?>>Recepcion de Carnet</option>
					</select>
          		 </td>
    		</tr>
        </table>
  		<center>
       		<input type="submit" id="guardar" name="guardar" value="Guardar" class="btn btn-primary">
        	<input type="reset" id="limpiar" name="limpiar" value="Limpiar" class="btn btn-warning">
      	</center>	
</form>

<?php
include_once($ruta."pie.php");
?>