<!DOCTYPE html>
<html>
<head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="../css/index.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
	<title>Vivero</title>
        <?php 
        session_start();
        if(isset($_SESSION['valido']) && $_SESSION['valido'] == true)
        {
            header('location: ../home/index.php');
        }
        ?>
</head>
<body>
	<section class="container">
		<h3 class="text-center">Ingrese sus datos</h3>
		<div class="col-xs-offset-3 col-xs-6">
                    <form class="form" action="../usuarios/nuevoUsuario.php" method="post">
                        
                                <div class="form-group">
                                        <label for="name" class="col-xs-12">Nombre:</label>
                                        <input type="text" name="name" class="name form-control">
                                        <div style="display: none" class="nameEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="nameError">
                                            <small class="text-justify text-muted">*Nombres no v&aacute;lidos</small>
                                        </div>
                                        
				</div>
                        
                                <div class="form-group">
                                        <label for="lname" class="col-xs-12">Apellido:</label>
                                        <input type="text" name="lname" class="lname form-control">
                                        <div style="display: none" class="lnameEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="lnameError">
                                            <small class="text-justify text-muted">*Apellidos no v&aacute;lidos</small>
                                        </div>
				</div>
                        
                                <div class="form-group">
                                    <label for="phone" class="col-xs-12">Tel&eacute;fono:</label>
                                        <input type="text" name="phone" class="phone form-control" placeholder="xxxx-xxxx">
                                        <div style="display: none" class="phoneEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="phoneError">
                                            <small class="text-justify text-muted">*Tel&eacute;fono no v&aacute;lido</small>
                                        </div>
				</div>
                        
                                <div class="form-group" >
                                    <div style="height: 59px">
                                        <label for="phone" class="col-xs-12">Fecha de Nacimiento:</label>
                                        <input type="text" name="date" class="datepicker form-control" placeholder="YYYY-MM-DD">
                                    </div>
                                    <div style="display: none" class="dateEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                    </div>
                                        <div style="display: none" class="dateError">
                                            <small class="text-justify text-muted">*Fecha no v&aacute;lida</small>
                                        </div>
				</div>
                        
                                <div class="form-group">
                                        <label for="email" class=" col-xs-12">Correo:</label>
                                        <input type="text" name="email" class="email form-control">
                                        <div style="display: none" class="emailEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="emailError">
                                            <small class="text-justify text-muted">*Correo no v&aacute;lido</small>
                                        </div>
                                        
				</div>
                        
                                <div class="pass form-group">
                                        <label for="pass" class=" col-xs-12">Contrase&ntilde;a:</label>
                                        <input type="password" name="pass" class="pass form-control">
                                        <div style="display: none" class="passEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="passError">
                                            <small class="text-justify text-muted">*Contrase&ntilde;as no v&aacute;lida</small>
                                        </div>
                                        
				</div>
                                
                                <div class="form-group">
                                        <label for="pass" class="col-xs-12">Confirme su contrase&ntilde;a:</label>
                                        <input type="password" name="passc" class="passc form-control">
                                        <div style="display: none" class="passcEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="passcError">
                                            <small class="text-justify text-muted">*Las contrase&ntilde;as no coinciden</small>
                                        </div>   
				</div>
				<div class="col-xs-offset-3 col-xs-6">
                                    <input type="submit" name="submit" class="btn btn-success btn-block" value="Enviar">
                                </div>
                        <div class="col-xs-12">
                            <center><small class="text-muted text-center"> O <a href="login.php">Inicia Sesion</a> si ya tienes una cuenta.</small> </center>
                            <div class="col-xs-offset-3 col-xs-6">';
                        </form>
		</div>
	</section>

        <script src="../js/signForm.js" type="text/javascript"></script>
</body>
</html>