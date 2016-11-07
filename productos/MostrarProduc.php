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
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/superfish.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>    
    <script type="text/javascript" src="../js/touchTouch.jquery.js"></script> 
    
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
 <?php
        include("/../seguridad/sinIniciar.php");
        include('/../bdd/connect.php');
        if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
        }

      $sql="SELECT Id_Tipo,Nombre FROM `tipo`";
      $resultado=$con->query($sql);
      ?>
    <header>
      <?php include("/../inc/header.inc"); 
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
        <center><h3>Buscar Productos </h3></center>
        </article>
             <div class="form-group">
            <h5>  Tipo de producto </h5>
            <form action="MostrarProduc2.php" method="POST">
            <select class="form-control" name="tipoP">
                    <?php   

                    foreach($resultado as $row) 
                    {
                   echo '<option value="'.$row['Id_Tipo'].'">'.$row['Nombre'].'</option>';
                    }
                    

             ?>
             </select>
             <input type="submit" name="" value="Buscar">
             </form>
        </div>

      
      </div>
        </div>
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