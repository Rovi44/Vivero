<?php
        if(isset($_POST['id']))
        {
            include("/../bdd/connect.php");
            $qr = "update usuarios set Estado = 0 where Id_Usuario = \"".$_POST['id'].'"';
            $con->query($qr);
            header("location: adUsusarios.php?success=4&page=".$_POST['actual']);
        }
            

