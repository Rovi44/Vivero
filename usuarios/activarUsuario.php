<?php
        if(isset($_POST['id']))
        {
            include(dirname(__DIR__)."/bdd/connect.php");
            $qr = "update usuarios set Estado = 1 where Id_Usuario = ".$_POST['id'];
            $con->query($qr);
            echo $qr;
            header("location: adUsusarios.php?success=5&page=".$_POST['actual']);
        }
            

