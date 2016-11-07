<!DOCTYPE html>
<html>
<head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/index.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
	<title>Vivero</title>
</head>
<body>
	<section class="container">
		<h2 class="text-center">Ingrese sus datos</h2>
                <?php
                session_start();
                
                    if(isset($_SESSION['valido']) && $_SESSION['valido'] === true)
                    {
                        header('location: ../home/index.php');
                    }
                    if(isset($_GET['error']) && $_GET['error'] == true)
                    {
                        echo '<h4 class="text-center text-danger">Datos incorrectos</h2>';
                    }
                    elseif (isset($_GET['state']) && $_GET['state'] == true)
                    {
                        echo '<h4 class="text-center text-danger">Cuenta Inactiva</h2>';
                    }
                ?>
                
		<div class="col-sm-offset-4 col-sm-4">
                    <form action="autenticar.php" method="post" id="form">                              
				<div class="form-group">
                                        <label for="user" class="col-xs-12">Usuario:</label>
					<input type="text" name="user" id="user" class="form-control">
                                        <div style="display: none" id="userEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
				</div>           

				<div class="form-group">
                                    <label for="pass" class="col-xs-12">Contrase&ntilde;a:</label>
                                    <input type="password" name="pass" id="pass" class="form-control">
                                        <div style="display: none" id="passEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
				</div>   
                        
                        <div class="col-xs-offset-3 col-xs-6"><br>
		            <input type="submit" name="submit" class="btn btn-success btn-block" value="Enviar">
		        </div>
	        </form>
		</div>
		<div class="col-sm-offset-4 col-sm-4">
                        <center><small class="text-muted text-center">&iquest;No tienes una cuenta?<a href="signup.php"> Crea una</a></small> </center>
		</div>
	</section>
    
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../js/login.js" type="text/javascript"></script>
</body>
</html>