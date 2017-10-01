<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acceso al Sistema</title>
<link href="<?php echo ""?>css/bootstrap.min.css"type="text/css" rel="stylesheet">
<link href="<?php echo ""?>css/estilo.css" type="text/css" rel="stylesheet">


</head>
<body>
	<div class="container-fluid">
    	<div class="col-lg-offset-4 col-lg-3">
        	<div class="panel panel-info">
            	<div class="panel-heading"><strong>ACCESO AL SISTEMA</strong></div>
                <div class="panel-body">
                	<?php if($_GET['incorrecto']==1){?>
                <div class="alert alert-danger">Usuario Incorrecto</div>
                <?php }?>
                <?php if($_GET['vacio']==1){?>
                <div class="alert alert-warning">Usuario o Contraseña Vacia</div>
                <?php }?>
                <div>
                	<center><img src="imagenes/candado1.png" width="150" height="100" class="img-responsive"></center>
                </div><br>
                <form action="ingresar.php" method="post">
                	<input type="text" name="usuario" class="form-control" placeholder="Usuario" autofocus autocomplete="off" id="usuario"><br>
                    <input type="password" name="contrasena" class="form-control"  placeholder="Contraseña">
                    <br>
                    <input type="submit" value="Ingresar" class="btn btn-info btn-block btn-lg" >
                </form>
              
                </div>
            </div>
        </div>

    </div>
</body>
</html>
