<?php
session_start();    
    if(!isset($_SESSION['valido']))
    {
        include_once('/../bdd/connect.php');
        $_SESSION['user'] = "sin_validar";
        $_SESSION['valido'] = "false";
        $qr = "SELECT modulos.Pantalla, grupo.Grupo , `Ingresar`, `Agregar`, `Modificar`, `Borrar` FROM `permisos` ";
        $qr = $qr. "INNER JOIN modulos ON permisos.Id_Pantalla = modulos.Id_Pantalla INNER JOIN grupo on permisos.Id_Grupo = grupo.Id_Grupo ";
        $qr = $qr."where grupo.Id_Grupo = 2";
        
        $resultado = $con->query($qr);
                    
        while($fila = $resultado->fetch_assoc())
        {
            $permisos[$fila['Pantalla']]['Ingresar'] = $fila['Ingresar'];
            $permisos[$fila['Pantalla']]['Agregar'] = $fila['Agregar'];
            $permisos[$fila['Pantalla']]['Modificar'] = $fila['Modificar'];
            $permisos[$fila['Pantalla']]['Borrar'] = $fila['Borrar'];                 
        }
        $_SESSION['permisos'] = $permisos;
    }
    
