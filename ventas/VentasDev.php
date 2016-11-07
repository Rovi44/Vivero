<!DOCTYPE html>
<html lang="en">
    
      <?php 
       
        include("/../seguridad/sinIniciar.php");
        include("/../inc/header.inc"); 
        if($_SESSION['permisos']['Ventas']['Agregar'] === '0')
        {
            header("location: ../seguridad/noautorizado.php");
        }?>
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


  <body>
<div class="spinner"></div>

  </head>
<div class="bg-content">
<!--============================== content =================================-->      
      <div id="content"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
    <div class="container">
          <div class="row">
        <article class="span12">
        <center><h3>Mis Compras</h3></center>
        </article>
             <div class="form-group">

<?php
                        include('/../bdd/connect.php');


			$idS=$_SESSION['id'];
			$sql= "select producto.Id_Proudcto ,producto.Nombre, producto.Precio ,producto.Descripcion,ventasxproducto.Cantidad, ventasxproducto.Total, ventas.Fecha, ventas.Id_Usuario, ventas.Id_Venta from ventasxproducto INNER join producto on ventasxproducto.Id_Proudcto = producto.Id_Proudcto  INNER JOIN ventas on ventas.Id_Venta= ventasxproducto.Id_Venta  WHERE ventas.Id_Usuario='".$idS."'";
			$respuesta=$con->query($sql);
                         if($respuesta->num_rows >0)
                         {
						echo '<center><table>
				<tr>
				  <td><strong>Nombre</strong></td>
				  <td><strong>Precio</strong></td>
				  <td><strong>Cantidad</strong></td>
				  <td><strong>Total</strong></td>';
                                   if($_SESSION['permisos']['Ventas']['Modificar'] === '1')
                                    {
                                    echo '<td><strong>Devolver</strong></td>';}
				echo '</tr>';
                            while ($fila=mysqli_fetch_assoc($respuesta)) 
                            {
                                    $idP=$fila['Id_Proudcto'];
                                    $Nombre=$fila['Nombre'];
                                    $Precio=$fila['Precio'];
                                    $Cantidad=$fila['Cantidad'];
                                    $Total=$fila['Total'];
                                    $Fecha=$fila['Fecha'];
                                    $idU=$fila['Id_Usuario'];
                                    $idV=$fila['Id_Venta'];
                                    $Descripcion=$fila['Descripcion'];

                                    echo '
                                            <tr>
                                              <td>'.$fila['Nombre'].'</td>
                                              <td>'.$fila['Precio'].'</td>
                                              <td>'.$fila['Cantidad'].'</td>
                                              <td>'.$fila['Total'].'</td>';
                                    if($_SESSION['permisos']['Ventas']['Modificar'] === '1')
                                    {
                                            echo  '<td> <button  class="fa fa-share btn btn-small btn-success" style="margin-top: -7px;" onclick="return abrirDevolucion(\''.$idP.'\',\''.$Nombre.'\',\''.$Precio.'\',\''.$Cantidad.'\',\''.$Total.'\',\''.$Fecha.'\',\''.$idU.'\',\''.$idV.'\',\''.$Descripcion.'\');"></button></td>
                                            
                                                    ';
                                    }
                                    echo '</tr>';
                            }
                            echo '</table>	<center>';
                         }
 else {echo '<h2>No se han comprado productos</h2>';}
			?>

	</div>

        <div class="clear"></div>
        
      </div>
        </div>
  </div>
</div>

  <!--============================== DIALOG =================================-->
<div id="formDev">
    <form id="Devolucion" action="../ventas/ProcesoDevolucion.php<?php //echo'?id='. $_GET['id'] ?>" name="formDev" method="POST">
    <input type="hidden" name="idP" class="idP"/>  
    <input type="hidden" name="Nombre" class="Nombre"/> 
        <input type="hidden" name="Precio" class="Precio"/>
    <input type="hidden" name="Cantidad" class="Cantidad"/>
    <input type="hidden" name="Total" class="Total"/> 
    <input type="hidden" name="Fecha" class="Fecha"/> 
    <input type="hidden" name="idU" class="idU"/> 
    <input type="hidden" name="idV" class="idV"/>
     <input type="hidden" name="Descripcion" class="Descripcion"/>
    <label>Ingrese la cantidad a devolver</label>
    <input type="number" name="NuevaCantidad" class="NuevaCantidad"/>
            <div class="emptyName" style="display: none;"></div>
    </form>
</div>

<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>