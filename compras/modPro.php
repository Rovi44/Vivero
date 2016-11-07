<?php
    include(dirname(__DIR__).'bdd/connect.php');
    if(isset($_POST['option']))
    {
        if($_POST['option'] === '1')
        {
            $insert = 'INSERT INTO `proveedores`(`Nombre`, `Correo`, `Direccion`, `Encargado`, `Telefono`) VALUES (';
            $insert = $insert."'".$_POST['name']."','".$_POST['email']."','".$_POST['dir']."','".$_POST['en']."','".$_POST['phone']."')";
            if($con->query($insert))
            {
                header('location: proveedores.php?success=1');
            }
        }
        if($_POST['option'] === '2')
        {
            $update = 'update proveedores set Nombre = \''.$_POST['name'].'\', ';
            $update = $update.'Correo = \''.$_POST['email'].'\', ';
            $update = $update.'Direccion = \''.$_POST['dir'].'\', ';
            $update = $update.'Encargado = \''.$_POST['en'].'\', ';
            $update = $update.'Telefono = \''.$_POST['phone'].'\' ';
            $update = $update.' where Id_Proveedor = '.$_POST['id'];
            if($con->query($update))
            {
                header('location: proveedores.php?success=2');
            }
        }
        
    }
