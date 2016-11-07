<?php
    include(dirname(__DIR__).'/bdd/connect.php');
    $qr = "select count(*) as total from ".$atable;
    $resultado = $con->query($qr);
    $actual = $_GET['page'];
    $fila = $resultado->fetch_assoc();
    $total = intval($fila['total']);
	if($total > 0)
	{$pages = ceil($total/$tpages);}
    else {$pages = 1;}
    if($actual > $pages)
    {
        $actual = $pages;
        $redirect = 'location: '.$acpage.'?page='.$actual;
        if(isset($_GET['success']))
        {
            $redirect = $redirect.'&success='.$_GET['success'];
        }
        elseif(isset ($_GET['error']))
        {
            $redirect = $redirect.'&error='.$_GET['error'];
        }
        header($redirect);
    }
    if($actual <= 0)
    {
        $actual = 1;
        $redirect = 'location: '.$acpage.'?page='.$actual;
        if(isset($_GET['success']))
        {
            $redirect = $redirect.'&success='.$_GET['success'];
        }
        elseif(isset ($_GET['error']))
        {
            $redirect = $redirect.'&error='.$_GET['error'];
        }
        header($redirect);
    }