<?php
    include('/../bdd/connect.php');
    include('../inc/carrito.php');
    session_start();
    if(isset($_POST['option']))
    {
        if($_POST['option'] === '2')
        {
            $i = $_POST['id'];
            echo $i;
            $prod = $_SESSION['carrito']->productos;
            unset($prod[$i]);
            $prod = array_values($prod);
            $_SESSION['carrito']->productos = $prod;
            $_SESSION['carrito']->calcularTotal();
            header('location: nuevaCompra.php');
        }
        if($_POST['option'] === '3')
        {
            unset($_SESSION['carrito']);
            header('location: nuevaCompra.php');
        }
        if($_POST['option'] === '4')
        {
            $compra = 'INSERT INTO `compras`(`Id_Proveedor`, `Total`, `Descripcion`, `Id_Usuario`) VALUES (';
            $compra = $compra.$_POST['id'].','.$_SESSION['carrito']->total.',\''.$_POST['des'].'\','.$_SESSION['id'].')';
            if($con->query($compra))
            {
                $idcompra = $con->insert_id;
                $total = 0;
                foreach ($_SESSION['carrito']->productos as $item) {
                    $insert = "INSERT INTO `comprasxproducto`(`Id_Proudcto`, `Id_Compra`, `Cantidad`, `Total`) VALUES ";
                    $insert = $insert."(".$item->id.",".$idcompra.",".$item->cantidad.",".($item->cantidad * $item->precio).")";
                    if(!$con->query($insert))
                    {
                        break;
                    }
					$update= "UPDATE producto SET Cantidad = Cantidad + ".$item->cantidad." where Id_Proudcto =  ".$item->id;
					$con->query($update);
                }
                unset($_SESSION['carrito']);
                header('location: nuevaCompra.php?success=1');
            }
        }
    }
