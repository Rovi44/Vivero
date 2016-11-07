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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" src="../js/superfish.js"></script>
	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="../js/touchTouch.jquery.js"></script>
        <script src="../js/permisos.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/Messages.js" type="text/javascript"></script>
        <link href="../css/Messages.css" rel="stylesheet" type="text/css"/>
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
                if($_SESSION['permisos']['Permisos']['Ingresar'] === '0')
                {
                    header("location: ../seguridad/noautorizado.php");
                }
                include(dirname(__DIR__)."/inc/header.inc");?>
	
<!--============================== header =================================-->
	<div class="bg-content">
		<div class="container">
                    <div class="row">
                        <div class="span12">
                            <center><h3>Permisos por Grupo</h3></center> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="span12">
                            <center>
                                <form action="permisos.php" method="post">
                                    <h5>Seleccione un grupo</h5>
                                    <?php 
                                        include(dirname(__DIR__).'/bdd/connect.php'); 
                                        include('selectPermisos.php');
                                    
                                    
                                    echo '<button type="submit" class="fa fa-search btn btn-small btn-inverse" style="margin-top: -7px;"></button>';
                                    
                                    if($_SESSION['permisos']['Permisos']['Agregar'] === '1'){
                                        echo '<button type="submit" class="fa fa-plus btn btn-small btn-success" style="margin-top: -7px;" onclick="return nuevoPermiso();"></button>';}
                                    
                                    if($_SESSION['permisos']['Permisos']['Borrar'] === '1'){
                                    echo '<button type="submit" class="fa fa-trash btn btn-small btn-danger" style="margin-top: -7px;" onclick="return borrarGrupo();"></button>';}
                                     if(!isset($_POST['id'])){
                                    echo '<br><small>*No se ha seleccionado ning&uacute;n grupo</small>';} 
                                    else
                                    {
                                        $grupo = explode('_', $_POST['id'])[1];
                                        echo '<br>Grupo Actual: '.$grupo.' &nbsp;';
                                    }
                                    if(isset($_GET['error']) && $_GET['error']==1)
                                    {
                                       echo '<div class="span12 msg">'
                                        . '<div class="text-warning span8 offset1 messages errorMsg">'
                                               . 'Aun existen usuarios pertenecientes a este grupo, favor cambiarlos de grupo antes de eliminarlo.'
                                               . '</div></div>';
                                    }if(isset($_GET['success']) && $_GET['success']==1)
                                    {
                                       echo '<div class="span12 msg">'
                                        . '<div class="text-success span8 offset1 messages successMsg">'
                                               . 'Grupo creado correctamente, recuerde cambiar los permisos por defecto.'
                                               . '</div></div>';
                                    }if(isset($_GET['success']) && $_GET['success']==2)
                                    {
                                       echo '<div class="span12 msg">'
                                        . '<div class="text-success span8 offset1 messages successMsg">'
                                               . 'Grupo eliminado correctamente, los permisos tambien fueron borrados.'
                                               . '</div></div>';
                                    }if(isset($_GET['success']) && $_GET['success']==3)
                                    {
                                       echo '<div class="span12 msg">'
                                        . '<div class="text-success span8 offset1  messages successMsg">'
                                               . 'Permisos modificados correctamente.'
                                               . '</div></div>';
                                    }
                                    ?>
                                </form>  
                            </center>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="span12">
                            <center>
                                <?php include('imprimirPermisos.php'); ?>
                            </center>
                        </div>
                    </div>
                </div>
        </div>
<!--============================== Dialogs =================================-->

<div id="selectPermiso">
    <form class="form" action="actionPermisos.php" method="post">
        <input type="hidden" name="option" class="option">
        <input type="hidden" name="id" class="id">
        <div class="grupo form-inline">
            <label for="groupName">Grupo</label>
            <input type="text" name="groupName" class="name"/>
            <div class="emptyName" style="display: none;"></div>
        </div>
    </form>
</div>

<div id="modPermiso">
    <form class="form" method="post" action="actionPermisos.php">
        <span id="pantalla"></span>
        <input type="hidden" name="option" class="option">
        <input type="hidden" name="id" class="id">
        <input type="hidden" name="groupName" <?php if(isset($grupo)){echo 'value = '.$grupo;}?> >
        <input type="hidden" name="idp" class="idPantalla">
        <input type="hidden" class="ingresar">
        <input type="hidden" class="modificar">
        <input type="hidden" class="agregar">
        <input type="hidden" class="borrar">
        <div class="form-inline ingresar">
            <input type="checkbox" name="ingresar" class="checkbox" value="1"/>
            <label for="groupName">Ingresar</label>
        </div>
        <div class="form-inline agregar">
            <input type="checkbox" name="agregar" class="checkbox" value="1"/>
            <label for="groupName">Agregar</label>
        </div>
        <div class="form-inline modificar">
            <input type="checkbox" name="modificar" class="checkbox" value="1"/>
            <label for="groupName">Modificar</label>
        </div>
        <div class="form-inline borrar">
            <input type="checkbox" name="borrar" class="checkbox" value="1"/>
            <label for="groupName">Borrar</label>
        </div>
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
</body>
</html>


