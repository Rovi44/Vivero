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
        <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
   <script src="../js/Productos.js" type="text/javascript"></script>
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
      $conexion =new mysqli("localhost","root","","vivero");
        if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
        }

      $sql="SELECT Id_Tipo,Nombre FROM `tipo`";
      $resultado=$conexion->query($sql);
      ?>
<header>
      <?php 
       
        include("/../seguridad/sinIniciar.php");
      include("/../inc/header.inc"); 
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
      $resultado=$conexion->query($sql);
      
      while ($fila=mysqli_fetch_assoc($resultado)) 
      {
        
        echo '<li class="box">';
       $ruta=$fila['Imagen'];
          echo'<a href="'.$ruta.'" class="magnifier" ><img alt="" src="../'.$ruta.'" width="350" height="200"/></a>';
            echo "<br><br>";
               $id=$fila['Id_Proudcto'];
                echo'<h5>"'.$fila['Nombre'].'"</h5>
                <p>'.$fila['Descripcion'].'</p>
                <button type="submit" class="fa fa-pencil btn btn-small btn-success" style="margin-top: -7px;"  onclick="return abrirModificarP('.$id.'); "></button>
          
          '.$id.'
<button type="submit" class="fa fa-trash btn btn-small btn-danger" style="margin-top: -7px;" onclick="return abrirBorrarP();"></button>

                  ';

            echo '</li>';
            }
            }

          ?>        
                  
            </ul> </center>
      </div>
        </div>
  </div>
    <!--============================== DIALOGOS =================================-->
  
 <?php
      $conexion =new mysqli("localhost","root","","vivero");
        if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
        }

      $sql="SELECT Id_Tipo,Nombre FROM `tipo`";
      $resultado=$conexion->query($sql);

            ?>
  
  <div id="ModificarP">
    <form class="form" action="actionProductos.php?id=<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" name="ModificarP" method="POST">
    <input type="hidden" name="id" class="id" /> 

    <?php
    echo $id;
       $consulta = "SELECT * FROM `producto` WHERE Id_Proudcto='" . $id ."' " ;
       $resultc = $conexion->query($consulta);
       //Obteniendo el número de registros devueltos
       $num_results = $resultc->num_rows;
       $rows = $resultc->fetch_assoc();
    ?>
        <div class="grupo form-inline">
      
      <h5>  Nombre del producto </h5> 
        <br><input type="text" name="nombre"  value="<?php echo $rows['Nombre'] ?>" ><br>
      <h5>  Precio del producto </h5>
        <br><input type="text" name="precio" value="<?php echo $rows['Precio'] ?>" ><br>
      <h5>  Cantidad del producto </h5>
       <br><input type="number" name="cantidad" value="<?php echo $rows['Cantidad'] ?>"><br>


     <div class="form-group">
            <h5>  Tipo de producto </h5>
            <select class="form-control" name="tipo">
            <?php 

            foreach($resultado as $row) 
            {
           echo '<option value="'.$row['Id_Tipo'].'">'.$row['Nombre'].'</option>';
            }
            if($_SESSION['permisos']['Permisos']['Agregar'] === '1'){

}

             ?>
            </select>
                
    </div>

      <h5>  Descripcion del producto </h5>
       <br> <textarea class="form-control" name="descripcion" type="text" rows="10" value="<?php echo $rows['Cantidad'] ?>"></textarea>
       <br>
      <h5>Ingresar Imagen del producto </h5>
      <input id="file-1" type="file" class="file" name="SubirImagen" value="<?php echo $rows['Imagen'] ?>"  > 
      <br>
      <br>
        <div class="buttons-wrapper"> 
        <a class="btn btn-1" data-type="reset">Borrar</a> 
        <p class="submit"><input type="submit" name="commit" value="Agregar Producto"></p>
        </div>
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

