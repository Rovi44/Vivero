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
<style type="text/css">
body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse; }

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
</style>





  </head>

  <body>
<div class="spinner"></div>

<header>
      <?php 
       
        include(dirname(__DIR__)."/seguridad/sinIniciar.php");
      include(dirname(__DIR__)."/inc/header.inc"); 
        if($_SESSION['permisos']['Ventas']['Ingresar'] === '0')
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
        <center><h3>DEVOLUCIONES</h3></center>
        </article>
             <div class="form-group">
              <?php
       include(dirname(__DIR__).'/bdd/connect.php');

      $sql="select producto.Id_Proudcto ,producto.Nombre, producto.Precio ,devolucionesventas.Cantidad, devolucionesventas.Total,ventas.Fecha,usuarios.Usuario from devolucionesventas INNER join producto on devolucionesventas.Id_Proudcto = producto.Id_Proudcto INNER JOIN ventas on ventas.Id_Venta=devolucionesventas.Id_Venta INNER JOIN usuarios on usuarios.Id_Usuario=ventas.Id_Usuario";

      $respuesta=$con->query($sql);
            echo '<center><table>
        <tr>
          <td><strong>Nombre</strong></td>
          <td><strong>Precio</strong></td>
          <td><strong>Cantidad</strong></td>
          <td><strong>Total</strong></td>
          <td><strong>Usuario </strong></td>
        </tr>';

      while ($fila=mysqli_fetch_assoc($respuesta)) 
      {
        echo '
          <tr>
            <td>'.$fila['Nombre'].'</td>
            <td>'.$fila['Precio'].'</td>
            <td>'.$fila['Cantidad'].'</td>
            <td>'.$fila['Total'].'</td>
            <td>'.$fila['Usuario'].'</td>
          </tr>
            ';  
      }
      echo '</table>  <center>';
      ?>

 </div>

        <div class="clear"></div>
        
      </div>
        </div>
  </div>
</div>

<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>