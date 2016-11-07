<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Administrar Productos</title>
	<meta charset="utf-8">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/kwicks-slider.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/superfish.js"></script>
	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="../js/touchTouch.jquery.js"></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
        <link href="../css/Messages.css" rel="stylesheet" type="text/css"/>
        <script src="../js/Messages.js" type="text/javascript"></script>
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='../js/jquery.preloader.js'></"+"script>");}	</script>

	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();    }	
	jQuery('.magnifier').touchTouch();			
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 	
	</script>

	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
  <![endif]-->
	</head>

	<body>
    <div class="spinner"></div> 
<!--============================== header =================================-->
	<?php   
        
                include(dirname(__DIR__).'/seguridad/sinIniciar.php');
                if($_SESSION['permisos']['Usuarios']['Ingresar'] === '0')
                {
                    header("location: ../seguridad/noautorizado.php");
                }
                if(!isset($_GET['page']))
                {
                    header("location: ../usuarios/adUsusarios.php?page=1");
                }
                include(dirname(__DIR__)."/inc/header.inc");?>
<!--============================== header =================================-->
	<div class="bg-content">
            <div class="container"><br>
                <?php if(isset($_GET['success']) && $_GET['success']=='1')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Usuario agregado correctamente.</center>
                            </div><br><br>
                        </div>';}
                        if(isset($_GET['success']) && $_GET['success']=='2')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Usuario modificado correctamente.</center>
                            </div><br><br>
                        </div>';}
                        if(isset($_GET['success']) && $_GET['success']=='3')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Contraseña modificada correctamente.</center>
                            </div><br><br>
                        </div>';}
                        if(isset($_GET['success']) && $_GET['success']=='4')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Usuario desactivado correctamente.</center>
                            </div><br><br>
                        </div>';}
                        if(isset($_GET['success']) && $_GET['success']=='5')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Usuario activado correctamente.</center>
                            </div><br><br>
                        </div>';}
                        if(isset($_GET['error']) && $_GET['error']=='1')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Error al agregar usuario.</center>
                            </div><br><br>
                        </div>';}
                 ?>
                    <table class="table" style="color: #CEF6CE; ">
                            <tr>
                                <th>Usuario
                                    <?php
                                    if($_SESSION['permisos']['Usuarios']['Agregar'] === '1'){
                                    echo '<button class="btn btn-small btn-success fa fa-plus" id="nuevo" onclick="return newUser()" style="float: right;">';}
                                    ?>
                                    </button>
                                </th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Tel&eacute;fono</th>
                                <th>Fecha de Nacimineto</th>
                                <th>Estado</th>
                                <th>Grupo</th>
                                <?php
                                    if($_SESSION['permisos']['Usuarios']['Modificar'] === '1'){
                                    echo '<th>Acci&oacute;n</th>';}
                                ?>
                            </tr>
                            <?php 
                                   include_once('imprimirUsuarios.php');?>
                        </table>
                <div style="float:  right;">
                    <?php
                     echo 'Página: ';
                     if($_GET['page'] != '1')
                     {
                        echo '<a href="adUsusarios.php?page='.(intval($_GET['page'])-1).'">Anterior</a>, ';
                     }
                     for($i = 1; $i<=$pages;$i++)
                     {
                         echo '<a href="adUsusarios.php?page='.$i.'">'.$i.'</a> , ';
                     }
                     if($_GET['page'] != $pages)
                     {
                        echo '<a href="adUsusarios.php?page='.(intval($_GET['page'])+1).'">Siguiente</a>';
                     }
                    ?>
                </div>
                    <div id="nuevoUsuario">
                    <form id="frmNew" method="post" class="form" action="nuevoUsuario.php">
                            <input type="hidden" name="option" class="option">
                            <input type="hidden" name="max" <?php echo 'value="'.$pages.'"'?>>
                            <div class="form-inline">
                                        <label for="email" class=" col-xs-12">Usuario:</label>
                                        <input type="text" name="email" class="email form-control">
                                        <div style="display: none" class="error emailEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error emailError">
                                            <small class="text-justify text-muted">*Correo no v&aacute;lido</small>
                                        </div>
                            </div>
                            <div class="form-inline">
                                        <label for="name" class="col-xs-12">Nombre:</label>
                                        <input type="text" name="name" class="name form-control">
                                        <div style="display: none" class="error nameEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error nameError">
                                            <small class="text-justify text-muted">*Nombres no v&aacute;lidos</small>
                                        </div>
                            </div>
                            <div class="form-inline">
                                        <label for="lname" class="col-xs-12">Apellido:</label>
                                        <input type="text" name="lname" class="lname form-control">
                                        <div style="display: none" class="error lnameEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error lnameError">
                                            <small class="text-justify text-muted">*Apellidos no v&aacute;lidos</small>
                                        </div>
                            </div>
                            <div class="form-inline">
                                    <label for="phone" class="col-xs-12">Tel&eacute;fono:</label>
                                        <input type="text" name="phone" class="phone form-control" placeholder="xxxx-xxxx">
                                        <div style="display: none" class="error phoneEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error phoneError">
                                            <small class="text-justify text-muted">*Tel&eacute;fono no v&aacute;lido</small>
                                        </div>
                            </div>
                            <div class="form-inline">
                                    <div style="height: 59px">
                                        <label for="phone" class="col-xs-12">Fecha de Nacimiento:</label>
                                        <input type="text" name="date" class="datepicker form-control" placeholder="YYYY-MM-DD">
                                    </div>
                                    <div style="display: none" class="error dateEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                    </div>
                                        <div style="display: none" class="error dateError">
                                            <small class="text-justify text-muted">*Fecha no v&aacute;lida</small>
                                        </div>
                            </div>

                            <div class="form-inline">
                                <label for="grupo">Grupo</label><br>
                                <select class="form-control" name="grupo">
                                    <?php
                                    foreach ($grupos as $key) {
                                        echo '<option value="'.$key.'">'.explode("_",$key)[1];
                                        echo '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="pass form-inline">
                                        <label for="pass" class=" col-xs-12">Contrase&ntilde;a:</label>
                                        <input type="password" name="pass" class="pass form-control">
                                        <div style="display: none" class="error passEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error passError">
                                            <small class="text-justify text-muted">*Contrase&ntilde;as no v&aacute;lida</small>
                                        </div>
                            </div>
                            <div class="form-inline">
                                        <label for="pass" class="col-xs-12">Confirme su contrase&ntilde;a:</label>
                                        <input type="password" name="passc" class="passc form-control">
                                        <div style="display: none" class="error passcEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error passcError">
                                            <small class="text-justify text-muted">*Las contrase&ntilde;as no coinciden</small>
                                        </div>   
                            </div>
                        </form>
                    </div>
                
                
                    <div id="modifier">
                         <form id="frmModify" method="post"  class="form" action="actualizarUsuario.php">
                         <input type="hidden" name="option" value="1">
                         <input type="hidden" name="actual" <?php echo 'value="'.$actual.'"'?>>
                         <input type="hidden" name="id" class="id">
                         <input type="hidden" class="hiddenName">
                         <input type="hidden" class="hiddenLName">
                         <input type="hidden" class="hiddenUser">
                         <input type="hidden" class="hiddenDate">
                         <input type="hidden" class="hiddenPhone">
                         <input type="hidden" class="hiddenGroup">
                            <div class="user form-inline">
                                        <label for="email" class=" col-xs-12">Usuario:</label>
                                        <input type="text" name="email" class="email form-control">
                                        <div style="display: none" class="error emailEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error emailError">
                                            <small class="text-justify text-muted">*Correo no v&aacute;lido</small>
                                        </div>
                            </div>
                            <div class="name form-inline">
                                        <label for="name" class="col-xs-12">Nombre:</label>
                                        <input type="text" name="name" class="name form-control">
                                        <div style="display: none" class="error nameEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error nameError">
                                            <small class="text-justify text-muted">*Nombres no v&aacute;lidos</small>
                                        </div>
                            </div><div class="lname form-inline">
                                        <label for="lname" class="col-xs-12">Apellido:</label>
                                        <input type="text" name="lname" class="lname form-control">
                                        <div style="display: none" class="error lnameEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error lnameError">
                                            <small class="text-justify text-muted">*Apellidos no v&aacute;lidos</small>
                                        </div>
                            </div>
                            <div class="phone form-inline">
                                    <label for="phone" class="col-xs-12">Tel&eacute;fono:</label>
                                        <input type="text" name="phone" class="phone form-control" placeholder="xxxx-xxxx">
                                        <div style="display: none" class="error phoneEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="error phoneError">
                                            <small class="text-justify text-muted">*Tel&eacute;fono no v&aacute;lido</small>
                                        </div>
                            </div>
                            <div class="date form-inline">
                                <div class="date"style="height: 59px">
                                        <label for="phone" class="col-xs-12">Fecha de Nacimiento:</label>
                                        <input type="text" name="date" class="datepicker form-control" placeholder="YYYY-MM-DD">
                                    </div>
                                    <div style="display: none" class="error dateEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                    </div>
                                        <div style="display: none" class="error dateError">
                                            <small class="text-justify text-muted">*Fecha no v&aacute;lida</small>
                                        </div>
                            </div>

                            <div class="group form-inline">
                                <label for="grupo">Grupo</label><br>
                                <select class="group form-control" name="grupo">
                                    <?php
                                    foreach ($grupos as $key) {
                                        $grupo = explode("_",$key);
                                        echo '<option value="'.$grupo[0].'">'.$grupo[1];
                                        echo '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            </form>
                        </div>
                
                       <div id="passm">    
                           <form id="frmPass"  class="form" action="actualizarUsuario.php" method="post">
                            <input type="hidden" name="actual" <?php echo 'value="'.$actual.'"'?>>
                            <input type="hidden" name="id" class="id">
                            <input type="hidden" name="option" class="option">
                            <small class="user"></small>
                            <div class="pass form-inline">
                                        <label for="pass" class=" col-xs-12">Contrase&ntilde;a:</label>
                                        <input type="password" name="pass" class="pass form-control">
                                        <div style="display: none" class="passEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="passError">
                                            <small class="text-justify text-muted">*Contrase&ntilde;as no v&aacute;lida</small>
                                        </div>
                            </div>
                            <div class="passc form-inline">
                                        <label for="pass" class="col-xs-12">Confirme su contrase&ntilde;a:</label>
                                        <input type="password" name="passc" class="passc form-control">
                                        <div style="display: none" class="passcEmpty">
                                            <small class="text-justify text-muted">*Valor requerido</small>
                                        </div>
                                        <div style="display: none" class="passcError">
                                            <small class="text-justify text-muted">*Las contrase&ntilde;as no coinciden</small>
                                        </div>   
                            </div>
                        </form>
                        </div>
                    </div>
                
                <form id="frmState" method="post">
                    <input type="hidden" name="actual" <?php echo 'value="'.$_GET['page'].'"'?>>
                    <input type="hidden" name="id" class="id">
                </form>
                
                
                </div>

<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
          <li><a class="icon-1" href="#"></a></li>
          <li><a class="icon-2" href="#"></a></li>
          <li><a class="icon-3" href="#"></a></li>
          <li><a class="icon-4" href="#"></a></li>
        </ul>
    <div class="privacy pull-left">Website Template designed by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">TemplateMonster.com</a> </div>
  </div>
    </footer>

<script type="text/javascript" src="../js/bootstrap.js"></script>
<script src="../js/modUsr.js" type="text/javascript"></script>  
<script src="../js/signForm.js" type="text/javascript"></script>
</body>
</html>

