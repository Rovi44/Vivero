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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="../css/select2.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <link href="../css/Messages.css" rel="stylesheet" type="text/css"/>
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
        <script src="../js/Messages.js" type="text/javascript"></script>
        <script src="../js/select2.min.js" type="text/javascript"></script>
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
                include(dirname(__DIR__).'/inc/carrito.php');
                include(dirname(__DIR__).'/seguridad/sinIniciar.php');
                if($_SESSION['permisos']['Compras']['Ingresar'] === '0')
                {
                    header("location: ../seguridad/noautorizado.php");
                }
                
                    if(isset($_POST['item']))
                    {
                        $temp = explode('_', $_POST['item']);
                        $item = new Item($temp[0],$temp[1],$temp[2],$_POST['cantidad']);
                        if(!isset($_SESSION['carrito']))
                        {
                            $_SESSION['carrito'] = new Carrito();
                        }
                        $_SESSION['carrito']->add($item);
                    }
                include(dirname(__DIR__)."/inc/header.inc.php");?>
<!--============================== header =================================-->
	<div class="bg-content">
            <div class="container"><br>
                <?php if(isset($_GET['success']) && $_GET['success']=='1')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Compra agregada correctamente.</center>
                            </div><br><br>
                        </div>'; }?>
                <form id="items" method="post" class="form">
                    <input type="hidden" name="option" class="option">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="des" class="des">
                    <div class="span4">
                            <div class="form-inline">
                                <label for="name" class=" col-xs-12">Producto:</label>
                                <select id="option" name="item">
                                    <?php $var =true; include('productSelect.php'); ?>
                                </select>
                            </div>
                    </div>
                    <div class="span7">
                            <div class="form-inline">
                                <label for="cantidad" class=" col-xs-12">Cantidad:</label>
                                <input type="text" name="cantidad" class="cantidad form-control">
                                <button class="add btn fa fa-plus btn-success btn-small"></button>
                                <?php
                                if(isset($_SESSION['carrito']) && (count($_SESSION['carrito']->productos) > 0))
                                {
                                    echo '<button class="ready btn fa fa-check btn-info btn-small" onclick="return accept()"></button>';
                                }
                                else
                                {
                                    echo '<button class="ready btn fa fa-check btn-info btn-small" onclick="return false"></button>';
                                }
                                ?>
                                <button class="cancel btn fa fa-close btn-danger btn-small" onclick="return dropCar()"></button>
                                <div style="display: none" class="error cantidadEmpty">
                                    <small class="text-justify text-muted">*Valor requerido</small>
                                </div>
                                <div style="display: none" class="error cantidadError">
                                    <small class="text-justify text-muted">*Valor inv&aacute;lido</small>
                                </div>
                            </div>
                    </div>
                </form>
                <br><br><br>
                <?php 
                    if(isset($_SESSION['carrito']))
                    {
                        $_SESSION['carrito']->imprimir();
                    }
                    //unset($_SESSION['carrito']);
                ?>
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

<div id="Proveedor">
    <select class="proSelect">
        <?php include('proSelect.php')?>    
    </select>
    <label>Comentario(Opcional):</label>
    <textarea class="des"></textarea>
</div>

<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>


