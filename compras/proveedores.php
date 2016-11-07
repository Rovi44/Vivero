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
        <script src="../js/proveedor.js" type="text/javascript"></script>
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
        
                include('/../seguridad/sinIniciar.php');
                if($_SESSION['permisos']['Proveedores']['Ingresar'] === '0')
                {
                    header("location: ../seguridad/noautorizado.php");
                }
                if(!isset($_GET['page']))
                {
                    header("location: ../compras/proveedores.php?page=1");
                }
                $atable = "proveedores";
                $actual = "proveedores.php";
                $tpages = 10;
                include("/../inc/pages.inc");
                include("/../inc/header.inc");?>
<!--============================== header =================================-->
	<div class="bg-content">
            <div class="container"><br>
                
                <?php if(isset($_GET['success']) && $_GET['success']=='1')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Proveedor agregado correctamente.</center>
                            </div><br><br>
                        </div>'; }
                        if(isset($_GET['success']) && $_GET['success']=='2')
                        {
                         echo '<div class="span12 msg">
                            <div class="span8  text-success offset2 messages successMsg">
                                <center>Proveedor modificado correctamente.</center>
                            </div><br><br>
                        </div>'; }?>
                    <table class="table" style="color: #CEF6CE; ">
                            <tr>
                                <th>Proveedor
                                    <?php
                                    if($_SESSION['permisos']['Proveedores']['Agregar'] === '1'){
                                    echo '<button class="btn btn-small btn-success fa fa-plus" id="nuevo" onclick="return nuevo()" style="float: right;">';}
                                    ?>
                                    </button>
                                </th>
                                <th>Correo</th>
                                <th>Direcci&oacute;n</th>
                                <th>Encargado</th>
                                <th>Tel&eacute;fono</th>
                                <?php
                                    if($_SESSION['permisos']['Proveedores']['Modificar'] === '1'){
                                    echo '<th>Acci&oacute;n</th>';}
                                ?>
                            </tr>
                            <?php 
                                   $var = true;
                                   include_once('imprimirProveedores.php');?>
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

<div id="Proveedor">
    <form id="frmPro" class="form" method="post" action="modPro.php">
    <input type="hidden" name="option" class="option">
    <input type="hidden" name="id" class="id">
    <input type="hidden" class="hname">
    <input type="hidden" class="hemail">
    <input type="hidden" class="hdir">
    <input type="hidden" class="hen">
    <input type="hidden" class="hphone">
    <input type="hidden" class="hid">
    <div class="form-inline">
        <label for="name" class=" col-xs-12">Nombre:</label>
        <input type="text" name="name" class="name form-control">
        <div style="display: none" class="error nameEmpty">
            <small class="text-justify text-muted">*Valor requerido</small>
        </div>
    </div>
    
    <div class="form-inline">
        <label for="email" class="col-xs-12">Correo:</label><br>
        <input type="text" name="email" class="email form-control">
        <div style="display: none" class="error emailEmpty">
            <small class="text-justify text-muted">*Valor requerido</small>
        </div>
        <div style="display: none" class="error emailError">
            <small class="text-justify text-muted">*Correo no v&aacute;lido</small>
        </div>
    </div>
    
    <div class="form-inline">
        <label for="dir" class=" col-xs-12">Direcci&oacute;n:</label>
        <input type="text" name="dir" class="dir form-control">
        <div style="display: none" class="error dirEmpty">
            <small class="text-justify text-muted">*Valor requerido</small>
        </div>
    </div>
    
    <div class="form-inline">
        <label for="en" class=" col-xs-12">Encargado:</label>
        <input type="text" name="en" class="en form-control">
        <div style="display: none" class="error enEmpty">
            <small class="text-justify text-muted">*Valor requerido</small>
        </div>
    </div>
    
    <div class="form-inline">
        <label for="phone" class=" col-xs-12">Tel&eacute;fono:</label>
        <input type="text" name="phone" class="phone form-control">
        <div style="display: none" class="error phoneEmpty">
            <small class="text-justify text-muted">*Valor requerido</small>
        </div>
        <div style="display: none" class="error phoneError">
            <small class="text-justify text-muted">*Tel&eacute;fono no v&aacute;lido</small>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>

