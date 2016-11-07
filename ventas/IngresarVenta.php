<?php
session_start();

if(isset($_POST['id']))
{
   include('/../bdd/connect.php');

  $id=$_POST["id"];
  //  echo $id;
$descripcion = $_POST["descripcion"];
//echo $descripcion;
$cantidad=$_POST["cantidad"];
$idS=$_SESSION['id'];
// echo $_SESSION['id'];

$sql="INSERT INTO `ventas`(`Total`, `Fecha`, `Id_Usuario`, `Descripcion`) VALUES (null,null,".$idS.", '".$descripcion."')";
if($con->query($sql))
            {

          $idventa = $con->insert_id;
          echo "ID VENTA: ";
          echo $idventa;
          echo "<br>";
           echo $sql;
          echo "<br>";
          $sqlPrecio="SELECT  `Precio` FROM `producto` WHERE Id_Proudcto='".$id."'";
          
          $precio=$con->query($sqlPrecio);

          while($fila=mysqli_fetch_assoc($precio))
          {
          echo "<br><br>";
          echo "PRECIO DEL PRODUCTO: ";
          echo $fila['Precio'];
          $precio=$fila['Precio'];

          $Total_Venta=$precio*$cantidad;
          echo "<br><br>";
          
          }

          echo $Total_Venta;
          $sqlVentas="UPDATE `ventas` SET `Total`='".$Total_Venta."',`Fecha`='2016-10-10',`Id_Usuario`='".$idS."',`Descripcion`='".$descripcion."' WHERE `Id_Venta`='".$idventa."'";

          $con->query($sqlVentas);
          echo "<br><br>";
          echo $sqlVentas;

          $sql2 ="INSERT INTO `ventasxproducto`(`Id_Proudcto`, `Id_Venta`, `Cantidad`, `Total`) VALUES ('".$id."','".$idventa."','".$cantidad."','".$Total_Venta."')";
          echo $sql2;
          $con->query($sql2);
          
          $update= "UPDATE producto SET Cantidad = Cantidad - ".$cantidad." where Id_Proudcto =  ".$id;
          $con->query($update);
  }
    header("Location: ../productos/MostrarProduc2.php");
}
?>