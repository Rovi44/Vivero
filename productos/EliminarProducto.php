<?php
session_start();
if(isset($_POST['id']))
{
  include('/../bdd/connect.php');

  $id=$_POST["id"];

  $sql="DELETE FROM `producto` WHERE Id_Proudcto='".$id."'";
  $con->query($sql);
  echo $sql;
 header("Location: ../productos/MostrarProduc2.php");
}
  ?>