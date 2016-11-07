<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Folio</title>
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
   <script src="../js/Productos.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/Messages.js" type="text/javascript"></script>
        <link href="../css/Messages.css" rel="stylesheet" type="text/css"/>

    
  <script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='../js/jquery.preloader.js'></"+"script>");}  </script>
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

  </head>

  <body>
<div class="spinner"></div>
<!--============================== header =================================-->
<header>
 <?php
        include(dirname(__DIR__).'/bdd/connect.php');
        if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
        }

      $sql="SELECT Id_Tipo,Nombre FROM `tipo`";
      $resultado=$con->query($sql);
      ?>
<header>
      <?php 
       
        include(dirname(__DIR__)."/seguridad/sinIniciar.php");
      include(dirname(__DIR__)."/inc/header.inc"); 
        if($_SESSION['permisos']['Productos']['Ingresar'] === '0')
        {
            header("location: ../seguridad/noautorizado.php");
        }?>
    </header>
<div class="bg-content">       

<!--============================== content =================================-->      
      <div id="content"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
    <div class="container">
          <div class="row">
        <article class="span12">
        <center><h3>Catalogo de productos</h3></center>
        </article>
             <div class="form-group">
            <h5>  Tipo de producto </h5>
            <form action="TipoProducto.php" method="POST">
            <select class="form-control" name="tipoP">
                    <?php   

                    foreach($resultado as $row) 
                    {
                   echo '<option value="'.$row['Id_Tipo'].'">'.$row['Nombre'].'</option>';
                    }
                    

             ?>
             </select>
                <?php
                if($_SESSION['permisos']['Productos']['Agregar'] === '1')
                {
                echo '<button  class="fa fa-plus btn btn-small btn-success" style="margin-top: -7px;" onclick="return abrirGrupo();"></button>';
                }
                if($_SESSION['permisos']['Productos']['Borrar'] === '1')
                {
               echo '<button  class="fa fa-trash btn btn-small btn-danger" style="margin-top: -7px;" onclick="return abrirTipo();"></button>';
                }
                 ?>
             </form>
        </div>

        <div class="clear"></div>
        
      </div>
        </div>
  </div>
</div>

  <!--============================== DIALOG =================================-->
<div id="formGrupo">
    <form class="form" id="nuevoP" action="IngresarTipo.php" method="post">
        <input type="hidden" name="option" class="option">
        <input type="hidden" name="id" class="id">
        <div class="grupo form-inline">
            <label for="groupName">Grupo</label>
            <input type="text" id="groupName" name="groupName" class="name" required />
            <div class="emptyName" style="display: none;"></div>
        </div>
    </form>

</div>

<div id="formTipo">
    <form class="form" id="TipoP" action="EliminarTipo.php" method="post">
            <input type="hidden" name="option" class="option">
        <input type="hidden" name="id" class="id">
        <div class="grupo form-inline">
            <label for="groupName">Grupo</label>
                        <select class="form-control" name="tipoP">
                    <?php   

                    foreach($resultado as $row) 
                    {
                   echo '<option value="'.$row['Id_Tipo'].'">'.$row['Nombre'].'</option>';
                    }
                    

             ?>
             </select>
            <div class="emptyName" style="display: none;"></div>
        </div>
    </form>

</div>

  <!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <div class="privacy pull-left">Website Template designed by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">PHP 2016 </a> </div>
  </div>
    </footer>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>

