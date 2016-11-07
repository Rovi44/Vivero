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

        <div class="clear"></div>
        <center><ul class="portfolio clearfix"> 
             
           <?php
      //$conexion=new mysqli("localhost","root","","vivero");
         if(isset($_POST['tipoP']))
         {
             
      $tipo=$_POST['tipoP'];

      $sql = "SELECT * FROM producto WHERE Id_Tipo='".$tipo."'";
      $resultado=$con->query($sql);



      while ($fila=mysqli_fetch_assoc($resultado)) 
      {


        echo '<li class="box">';
       $ruta=$fila['Imagen'];
          echo'<a href="../'.$ruta.'" class="magnifier" ><img alt="" src="../'.$ruta.'" width="350" height="200"/></a>';
            echo "<br><br>";
               $id=$fila['Id_Proudcto'];
               $nombre=$fila['Nombre'];
              $precio=$fila['Precio'];
              $cantidad=$fila['Cantidad'];
              $descripcion=$fila['Descripcion'];

                echo'<h5>"'.$fila['Nombre'].'"</h5>
                <p>'.$fila['Descripcion'].'</p>';
				
				if($_SESSION['permisos']['Productos']['Modificar'] === '1')
				{
					echo '<button type="submit" class="fa fa-pencil btn btn-small btn-success" style="margin-top: -7px;"  onclick="return abrirModificarP(\''.$id.'\',\''.$nombre.'\',\''.$precio.'\',\''.$cantidad.'\',\''.$descripcion.'\',\''.$tipo.'\',\''.$ruta.'\');"></button>';
				}
				
				if($_SESSION['permisos']['Productos']['Borrar'] === '1')
				{				
					echo '<button type="submit" class="fa fa-trash btn btn-small btn-danger" style="margin-top: -7px;" onclick="return abrirBorrarP(\''.$id.'\',\''.$nombre.'\',\''.$precio.'\',\''.$cantidad.'\',\''.$descripcion.'\',\''.$tipo.'\',\''.$ruta.'\');"></button>';
				}
				
				if($_SESSION['permisos']['Ventas']['Ingresar'] === '1')
				{
					echo '<button type="submit" class="fa fa-tag btn btn-small" style="margin-top: -7px;" onclick=" return abrirVenta(\''.$id.'\',\''.$nombre.'\',\''.$precio.'\',\''.$cantidad.'\',\''.$descripcion.'\',\''.$tipo.'\',\''.$ruta.'\');"></button>
                  ';
				}
                  ?>
             </a>
            </li>
            <?php 
            }
            }

          ?>
      
            </ul> </center>
      </div>
        </div>
  </div>
  

    <!--============================== DIALOGOS =================================-->
  
  <div id="form">
    <form id="Form" action="actionProductos.php<?php //echo'?id='. $_GET['id'] ?>" name="ModificarP" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" class="id"/> 

        <div class="grupo form-inline">
      
      <h5>  Nombre del producto </h5> 
        <br><input type="text" name="nombre" class="nombre" value="" ><br>
      <h5>  Precio del producto </h5>
        <br><input type="text" name="precio" class="precio" value="" ><br>
      <h5>  Cantidad del producto </h5>
       <br><input type="number" name="cantidad" class="cantidad" value=""><br>


     <div class="form-group">
            <h5>  Tipo de producto </h5>
            <select class="seleccion form-control" class="descripcion" name="tipo">
            <?php 

            foreach($resultado as $row) 
            {
           echo '<option class="tipo" value="'.$row['Id_Tipo'].'">'.$row['Nombre'].'</option>';
            }
            if($_SESSION['permisos']['Permisos']['Agregar'] === '1'){

}

             ?>
            </select>
                
    </div>

      <h5>  Descripcion del producto </h5>
       <br> <textarea class="descripcion form-control" name="descripcion" type="text" rows="10" value=""></textarea>
       <br>
      <h5>Ingresar Imagen del producto </h5>
      <input id="SubirImagen file-1" type="file" class="file" name="SubirImagen" value=""  > 
      <br>
      <br>

            <div class="emptyName" style="display: none;"></div>
        </div>
    </form>
</div>

<div id="formVenta">
    <form id="newVenta" action="../ventas/IngresarVenta.php<?php //echo'?id='. $_GET['id'] ?>" name="formVenta" method="POST">
    <input type="hidden" name="id" class="id"/> 
    <input type="hidden" class="hiddenCant"/> 
    <input type="hidden" name="descripcion" class="descripcion"/> 
    <label>Ingrese la cantidad a comprar</label>
    <input type="text" name="cantidad" class="cantidad"/>
            <div class="emptyName" style="display: none;"></div>
    </form>
</div>

<div id="BorrarP">
    <form id="borrar" action="../productos/EliminarProducto.php<?php //echo'?id='. $_GET['id'] ?>" name="BorrarP" method="POST">
    <input type="hidden" name="id" class="id"/> 
    <label>Desea eliminar el producto</label>
            <div class="emptyName" style="display: none;"></div>
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


