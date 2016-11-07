<?php
    if(isset($_POST['id']))
    { 
        include("/../bdd/connect.php");
        if($_POST['option'] == "1")
        {
            $correo = $con->real_escape_string(strtolower($_POST['email']));
            $name = $con->real_escape_string($_POST['name']);
            $lname = $con->real_escape_string($_POST['lname']);
            $phone = $con->real_escape_string($_POST['phone']);
            $date = $con->real_escape_string($_POST['date']);
            $group = $con->real_escape_string($_POST['grupo']);

            $qr = "update usuarios set ";
            $qr = $qr." Usuario = '".$correo."', ";
            $qr = $qr." Nombre = '".$name."', ";
            $qr = $qr." Apellido = '".$lname."', ";
            $qr = $qr." Telefono = '".$phone."', ";
            $qr = $qr." Id_Grupo = ".$group.", ";
            $qr = $qr." Nacimiento = '".$date."'";
            $qr = $qr.' where Id_Usuario = '.$_POST['id'];

            if($con->query($qr)){}
                header("location: adUsusarios.php?success=2&page=".$_POST['actual']);
        }
        
        if($_POST['option'] == "2")
        {
            $qr = 'update usuarios set Password = \''.md5($_POST['pass']).'\' where Id_Usuario = '.$_POST['id'];
            if($con->query($qr)){}
                header("location: adUsusarios.php?success=3&page=".$_POST['actual']);
        }
    }
?>