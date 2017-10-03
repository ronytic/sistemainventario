<?php
$titulo="REGISTRO DE USUARIOS DEL SISTEMA";
$ruta="../";
include_once($ruta."login/verificar.php");
include_once($ruta."cabecerahtml.php");
?>
<?php
include_once($ruta."cabecera.php");
?>
<form action="guardar.php" method="post">
	
        	<table class="table">
             	<tr>
                    <td><label for="usuario"> Usuario:</label> </td>
                    <td><input type="text" class="form-control input-sm" name="usuario" id="usuario" maxlength="20" size="20">
                    </td>
               	</tr>
                <tr>
                    <td><label for="contrasena"> Contraseña:</label> </td>
                    <td><input type="password" class="form-control input-sm" name="contrasena" id="contrasena" maxlength="60" size="60">
                    </td>
               	</tr>
                <tr>
                   	<td><label for="nombres"> Nombres:</label> </td>
                    <td colspan="2"><input type="text" class="form-control input-sm" name="nombres" id="nombres" maxlength="50" size="50">
                	</td>
                </tr>
                    <tr>
                   		<td><label for="ap_paterno"> Apellido Paterno:</label> </td>
                        <td colspan="2"><input type="text" class="form-control input-sm" name="ap_paterno" id="ap_paterno" maxlength="50" size="50"></td> 
                    </tr>
                    <tr>
                   		<td><label for="ap_materno"> Apellido Materno:</label> </td>
                        <td colspan="2"><input type="text" class="form-control input-sm" name="ap_materno" id="ap_materno" maxlength="50" size="50">
                        </td> 
                    </tr>
                    <tr>
                    	<td><label for="carnet">Carnet de Identidad:</label> </td>
                        <td >
                        	<input type="text" class="form-control input-sm" name="ci" id="ci" maxlength="12" size="12">
                        </td>
                    </tr>
                    <tr>
        				<td><label for="celular"> Celular:</label></td>
        				<td>
                        	<input type="tel" class="form-control input-sm" name="celular" id="celular" >
                        </td>
    				</tr>
                    <tr>
        				<td><label for="nivel">Nivel de Usuario:</label></td>
        				<td>
                        	<select name="nivelusuario" class="form-control input-sm">
                            <option ><-----Seleccione el nivel de usuario-----></option>
                        	<option value="1"> </option>
                            <option value="2"> Jefe de Unidad</option>
              	            <option value="3"> Ventanilla Unica</option>
                            <option value="4"> Inspector(a)</option>
                            <option value="5"> Medico</option>
                            <option value="6"> Enfermera</option>
                            <option value="7"> Recepcion de Certificacion</option>
                            <option value="8"> Cajero(a)</option>
                      		<option value="9"> Doctora de Laboratorio</option>
                            <option value="10"> Recepcion de Carnet</option>
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