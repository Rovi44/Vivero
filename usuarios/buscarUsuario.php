<?php
    include(dirname(__DIR__).'/bdd/connect.php');
    
    if(isset($_POST['value']))
    {
        $id = $_POST['value'];
        $qr = "SELECT * FROM usuarios WHERE Id_Usuario = '".$id."'";
        
        $resultado = $con->query($qr);
        
        $usuario = $resultado->fetch_assoc();
    }
