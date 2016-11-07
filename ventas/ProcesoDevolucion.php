<?php
session_start();
if(isset($_POST["idP"]))
{
       include('/../bdd/connect.php');
  				$idP=$_POST["idP"];
				$Nombre=$_POST["Nombre"];
				$Precio=$_POST["Precio"];
				$Cantidad=$_POST["Cantidad"];
				$Total=$_POST["Total"];
				$Fecha=$_POST["Fecha"];
				$idU=$_POST["idU"];
				$idV=$_POST["idV"];
				$NuevaCantidad=$_POST["NuevaCantidad"];
				$Descripcion=$_POST["Descripcion"];

echo "<br>";
echo $idP;
echo "<br>";
echo $Nombre;
echo "<br>";
echo $Precio;
echo "<br>";
echo $Cantidad;
echo "<br>";
echo $Total;
echo "<br>";
echo $Fecha;
echo "<br>";
echo $idU;
echo "<br>";
echo $idV;
echo "<br>";
echo $NuevaCantidad;
echo "<br>";
echo $Descripcion;
echo "<br>";

$precioNuevo=$NuevaCantidad*$Precio;
$restaCantidad=$Cantidad-$NuevaCantidad;
$NuevoTotal=$Total-$precioNuevo;
echo "NUEVO PRECIO";
echo $NuevoTotal;

$sql="INSERT INTO `devolucionesventas`(`Id_Proudcto`, `Id_Venta`, `Cantidad`, `Total`) VALUES ('".$idP."','".$idV."','".$NuevaCantidad."','".$precioNuevo."')";
echo $sql;

$con->query($sql);

$sql2="UPDATE `ventas` SET `Total`='".$NuevoTotal."',`Fecha`='2016-10-10',`Id_Usuario`='".$idU."',`Descripcion`='".$Descripcion."' WHERE `Id_Venta`='".$idV."'";
$con->query($sql2);
echo $sql2;

$sql3="UPDATE `ventasxproducto` SET `Id_Proudcto`='".$idP."',`Id_Venta`='".$idV."',`Cantidad`='".$restaCantidad."',`Total`='".$NuevoTotal."' WHERE `Id_Venta`='".$idV."'";
$con->query($sql3);
echo $sql3;
$update= "UPDATE producto SET Cantidad = Cantidad + ".$cantidad." where Id_Proudcto =  ".$idP;
$con->query($update);

header("Location: ../ventas/VerDevoluciones.php");
}
  ?>