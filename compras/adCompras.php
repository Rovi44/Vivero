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
        <link href="../css/tableUsers.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/kwicks-slider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/superfish.js"></script>
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
        
                include('/../seguridad/sinIniciar.php');
                if($_SESSION['permisos']['Compras']['Ingresar'] === '0')
                {
                    header("location: ../seguridad/noautorizado.php");
                }
                if(!isset($_GET['page']))
                {
                    header("location: ../compras/adCompras.php?page=1");
                }
                $atable = "compras";
                $acpage = "adCompras.php";
                $actual = $_GET['page'];
                $tpages = 10;
                include("/../inc/pages.inc");
                include("/../inc/header.inc");?>
	
<!--============================== header =================================-->
	<div class="bg-content">
		<div class="container">
                    <table class="table table-responsive" style="color: #CEF6CE; ">
                      <thead>
                          <tr>
                          <th>Id</th>
                          <th>Proveedor</th>
                          <th>Fecha</th>                    
                          <th>Total</th>
                          <th>Descripci&oacute;n</th>
                          <th>Ingresado por:</th>
                          <th>Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $var = true;
                          include('imprimirCompras.php'); ?>
                      </tbody>
                    </table>
                    
                            <div style="float:  right;">
                                <?php
                                 echo 'Página: ';
                                 if($_GET['page'] != '1')
                                 {
                                    echo '<a href="proveedores.php?page='.(intval($_GET['page'])-1).'">Anterior</a>, ';
                                 }
                                 for($i = 1; $i<=$pages;$i++)
                                 {
                                     echo '<a href="proveedores.php?page='.$i.'">'.$i.'</a> , ';
                                 }
                                 if($_GET['page'] != $pages)
                                 {
                                    echo '<a href="proveedores.php?page='.(intval($_GET['page'])+1).'">Siguiente</a>';
                                 }
                                ?>
                            </div>
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
<form method="post" action="compras.php" id="frmCompra">
    <input type="hidden" name="id" class="id">
    <input type="hidden" name="name" class="name">
</form>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>

