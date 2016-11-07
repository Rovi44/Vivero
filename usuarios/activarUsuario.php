<?php
        if(isset($_POST['id']))
        {
            include("/../bdd/connect.php");
            $qr = "update usuarios set Estado = 1 where Id_Usuario = ".$_POST['id'];
            $con->query($qr);
            echo $qr;
            header("location: adUsusarios.php?success=5&page=".$_POST['actual']);
        }
            

