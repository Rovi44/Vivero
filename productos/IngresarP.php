<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Contact</title>
  <meta charset="utf-8">
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
  <meta name="description" content="Your description">
  <meta name="keywords" content="Your keywords">
  <meta name="author" content="Your name">
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
  <link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen">
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/superfish.js"></script>
  <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>  
  <script src="../js/forms.js"></script>


  <script>    
   jQuery(window).load(function() { 
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

<div class="spinner"></div>
<!--============================== header =================================-->
    <?php 
        include("/../seguridad/sinIniciar.php");
        include("/../inc/header.inc"); 
        if($_SESSION['permisos']['Productos']['Agregar'] === '0')
        {
            header("location: ../seguridad/noautorizado.php");
        }
    ?>
    

  <body>
<div class="bg-content"> 
 <div id="content">
    <div class="container">
          <div class="row">
            <div class="span12">
             <center> <h1>Ingresar un producto</h1></center>
              <div class="inner-1">
           <center> 

          <!-- <form id="contact-form" action="Controles/Ingresar.php" method="POST" enctype="multipart/form-data">


                    <h5>  Nombre del producto </h5> 
                    <label class="name">
                    <input type="text" value="Nombre del producto" name="producto">
                    <br>
                    <span class="error">*Ingrese el nombre del producto</span> <span class="empty">Ingrese el nombre del producto.</span> </label>


                    <h5>  Precio del producto </h5> 
                    <label class="numero">
                    <input type="numero" value="Precio" name="precio">
                    <br>
                    <span class="error">*Ingrese el precio en numeros</span> <span class="empty">*Se requiere que ingrese el precio</span> </label>

                    <h5>  Cantidad de producto </h5> 
                    <label class="number">
                    <input type="number" value="Cantidad" name="cantidad">
                    <br>
                    <span class="error">*Ingrese la cantidad en numeros </span> <span class="empty">*Se requiere que ingrese la cantidad de productos</span> </label><br>

                  <h5>  Seleccione la imagen </h5>   
                    <br>
                    <input id="file-1" type="file" class="file" name="SubirImagen" required > </input>
                    <br>
                  <span class="empty">*Se requiere que ingrese una imagen del producto .</span> </label>
                    <br><br>

                     <h5> Ingrese una descripcion</h5> 
                    <label class="message">
                    <textarea name="descripcion" type="text" rows="5" >Descripcion</textarea>
                    <br>
                    <span class="error">*Ingrese una descripcion.</span> <span class="empty">*Se requiere que ingrese una descripcion.</span> </label>
                <div class="buttons-wrapper"> 
                <a class="btn btn-1" data-type="reset">Borrar</a> 
                <a class="btn btn-1" data-type="submit">Agregar</a> 
                </div>
                </form>-->

      <?php
      $conexion =new mysqli("localhost","root","","vivero");
        if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
        }

      $sql="SELECT Id_Tipo,Nombre FROM `tipo`";
      $resultado=$conexion->query($sql);
      ?>

       <form action=Ingresar.php method="POST" enctype="multipart/form-data">
      

      <h5>  Nombre del producto </h5> 
        <br><input type="text" name="nombre"  placeholder="Nombre " required><br>
      <h5>  Precio del producto </h5>
        <br><input type="text" name="precio"  placeholder="Precio " required><br>
      <h5>  Cantidad del producto </h5>
       <br><input type="number" name="cantidad" placeholder="Cantidad " required><br>


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
                <button type="submit" class="fa fa-plus btn btn-small btn-success" style="margin-top: -7px;" onclick="return nuevoPermiso();"></button>
    </div>

      <h5>  Descripcion del producto </h5>
       <br> <textarea class="form-control" name="descripcion" type="text" rows="10"  placeholder="Descripcion" required></textarea>
       <br>
      <h5>Ingresar Imagen del producto </h5>
      <input id="file-1" type="file" class="file" name="SubirImagen" required > 
      <br>
      <br>
        <div class="buttons-wrapper"> 
        <a class="btn btn-1" data-type="reset">Borrar</a> 
        </div>
      <p class="submit"><input type="submit" name="commit" value="Agregar Producto"></p>
    </form>
                </center>
          </div>
  <script>
    $("#file-1").fileinput({
      showCaption: false,
      browseClass: "btn btn-primary",
      fileType: "any"
    });
    </script>
      </div>
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