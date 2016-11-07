<!DOCTYPE html>
<html lang="en">
	<head>
	<title>About</title>
	<meta charset="utf-8">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/kwicks-slider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery.js"></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/superfish.js"></script>
        <script src="../js/select2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="../js/touchTouch.jquery.js"></script>
        <script src="../js/compras.js" type="text/javascript"></script>
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
                if($_SESSION['permisos']['Compras']['Ingresar'] === '0')
                {
                    header("location: ../seguridad/noautorizado.php");
                }
                include(dirname(__DIR__)."/inc/header.inc.php");?>
	
<!--============================== header =================================-->
	<div class="bg-content">
		<div class="container">
                    <?php include('detallesCompras.php'); ?>
                    <a href="adCompras.php">Regresar</a>
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
<div id="dev">
    <form method="post" action="devoluciones.php" id="frmDevoluciones">
        <input type="hidden" name="id" class="id" <?php
            if(isset($_POST['id']))
            {
                echo 'value="'.$_POST['id'].'"';
            }
        ?>>
        <input type="hidden" name="name" class="name" <?php
            if(isset($_POST['name']))
            {
                echo 'value="'.$_POST['name'].'"';
            }
        ?>>
        <input type="hidden" name="item" class="item">
        <input type="hidden" name="max" class="max">
        <input type="hidden" name="price" class="price">
        <label>Cantidad</label>
        <input type="text" name="cantidad" class="cantidad">
        <div style="display: none" class="error cantidadEmpty">
            <small class="text-justify text-muted">*Valor requerido</small>
        </div>
        <div style="display: none" class="error cantidadError">
            <small class="text-justify text-muted">*Valor inv&aacute;lido</small>
        </div>
    </form>
</div>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>

