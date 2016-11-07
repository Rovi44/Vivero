<!DOCTYPE html>
<html lang="en">
	<head>
	<title>About</title>
	<meta charset="utf-8">
	<link rel="icon" href=../img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/kwicks-slider.css" type="text/css" media="screen">
        <link href="../css/moduser.css" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/superfish.js"></script>
	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="../js/touchTouch.jquery.js"></script>
        <script src="../js/modUsr.js" type="text/javascript"></script>
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
        include(dirname(__DIR__)."/seguridad/sinIniciar.php");
            if($_SESSION['permisos']['Usuarios']['Modificar'] === '0')
            {
                header("location: ../seguridad/noautorizado.php");
            }
        include(dirname(__DIR__)."/inc/header.inc"); ?>
	
<!--============================== header =================================-->
        <?php include('buscarUsuario.php'); ?>
	<div class="bg-content">
            <form id="form" method="post" action="actualizarUsuario.php">
                <input type="hidden" id="mod" name="mod">
                <input type="hidden" name="id" value="<?php echo $usuario['Id_Usuario'] ?>">
            <div class="container offset3">
                            <div class="block-slogan">
                                <a>Usuario:</a>
                                <h3 style="margin-top: 10px"><?php echo $usuario['Id_Usuario'] ?></h3>
                                <div class="modifier">
                                    <input type="text" name="user" id='user' style="margin-top: 8px;">
                                    <button class="btn btn-info" onclick="return setField('1');"><i class="fa fa-save"></i></button>
                                </div>
                                <div id="userEmpty" style="display: none">*Valor Requerido</div>
                                <div id="userError" style="display: none">*Valor inv&aacute;lido</div>
                            </div>
                    
                            <div class="block-slogan">
                                <a>Nombres:</a>
                                <h3 style="margin-top: 10px"><?php echo $usuario['Nombre'] ?></h3>
                                <div class="modifier">
                                    <input type="text" name="name" id="name" style="margin-top: 8px;">
                                    <button class="btn btn-info" onclick="return setField('2');"><i class="fa fa-save"></i></button>
                                </div>
                                <div id="nameEmpty" style="display: none">*Valor Requerido</div>
                                <div id="nameError" style="display: none">*Valor inv&aacute;lido</div>
                            </div>
                    
                    
                            <div class="block-slogan">
                                <a>Apellidos:</a>
                                <h3 style="margin-top: 10px"><?php echo $usuario['Apellido'] ?> </h3>
                                <div class="modifier">
                                    <input type="text" name="lname" id="lname" style="margin-top: 8px;">
                                    <button class="btn btn-info" onclick="return setField('3');"><i class="fa fa-save"></i></button>
                                </div>
                                <div id="lnameEmpty" style="display: none">*Valor Requerido</div>
                                <div id="lnameError" style="display: none">*Valor inv&aacute;lido</div>
                            </div>
                    
                            <div class="block-slogan">
                                <a>Tel&eacute;fono:</a>
                                    <h3 style="margin-top: 10px"><?php echo $usuario['Telefono'] ?></h3>
                                    <div class="modifier">
                                    <input type="text" name="phone" id="phone" style="margin-top: 8px;">
                                    <button class="btn btn-info" onclick="return setField('4');"><i class="fa fa-save"></i></button>
                                </div>
                                <div id="phoneEmpty" style="display: none">*Valor Requerido</div>
                                <div id="phoneError" style="display: none">*Valor inv&aacute;lido</div>
                            </div>
                    
                            <div class="block-slogan">
                                <a>Nacimiento:</a>
                                <div>
                                    <h3 style="margin-top: 10px"><?php echo $usuario['Nacimiento'] ?> </h3>
                                    <input type="text" name = "date" id="name" style="margin-top: 8px;">
                                    <button class="btn btn-info" name="date" onclick="return setField('5');"><i class="fa fa-save"></i></button>
                                </div>
                                <div id="dateEmpty" style="display: none">*Valor Requerido</div>
                                <div id="dateError" style="display: none">*Valor inv&aacute;lido</div>
                            </div>
                    
                       <div class="block-slogan">
                                <a>Grupo:</a>
                                <div>
                                    <h3 style="margin-top: 10px"><?php echo $usuario['Id_Grupo'] ?> </h3>
                                    <input type="text" name="group" id="g" style="margin-top: 8px;">
                                    <button class="btn btn-info" onclick="return setField('6');"><i class="fa fa-save"></i></button>
                                </div>
                                <div id="gEmpty" style="display: none">*Valor Requerido</div>
                                <div id="gError" style="display: none">*Valor inv&aacute;lido</div>
                            </div>
                    
                            <div class="block-slogan">
                                                <a>Cambiar Contraseña:</a>
                                                <div>
                                                    <h3 style="margin-top: 10px">Nueva Contraseña:</h3>
                                                    <input name="pass" id="pass" type="text">
                                                    <div id="passEmpty" style="display: none">*Valor Requerido</div>
                                                    <h3 style="margin-top: 10px">Confirmar Contraseña:</h3>
                                                    <input name="passc" id="passc" type="text" style="margin-top: 8px;">
                                                    <button class="btn btn-info" onclick="return setField('7');"><i class="fa fa-save"></i></button>
                                                    <div id="passcEmpty" style="display: none">*Valor Requerido</div>
                                                    <div id="passError" style="display: none">*Contrase&ntilde;as no coinciden</div>
                                                </div>
                            </div>
                        </div>
            </form>
                        </div>
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
</body>
</html>

