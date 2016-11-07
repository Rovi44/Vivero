<?php
if(isset($_POST['submit']))
{
    session_start();
    include(dirname(__DIR__).'/bdd/connect.php');
        
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $usuario = mysqli_escape_string($con, strtolower($_POST['user']));
        $pass = mysqli_escape_string($con, $_POST['pass']);

        $qr = "select * from usuarios where Usuario = '".$usuario."' and Password = '" .md5($pass)."'";
        $resultado = $con->query($qr);

        $nr = $resultado->num_rows;
        $usuario = $resultado->fetch_assoc();
        $resultado->close();

        if($nr == 1)
        {
                $_SESSION = array();
                if($usuario['Usuario'] != 'sin_ingresar' && $usuario['Estado'] == 1)
                {
                    $_SESSION['id'] = $usuario['Id_Usuario'];
                    $_SESSION['usr'] = $usuario['Usuario'];
                    $_SESSION['nombre'] = $usuario['Nombre'];
                    $_SESSION['apellido'] = $usuario['Apellido'];
                    $_SESSION['telefono'] = $usuario['Telefono'];
                    $_SESSION['fecha'] = $usuario['Nacimiento']; 
                    $_SESSION['grupo'] = $usuario['Id_Grupo'];
                    $_SESSION['valido'] = true;
                    
                    $qr = "SELECT modulos.Pantalla, grupo.Grupo , `Ingresar`, `Agregar`, `Modificar`, `Borrar` FROM `permisos` ";
                    $qr = $qr. "INNER JOIN modulos ON permisos.Id_Pantalla = modulos.Id_Pantalla INNER JOIN grupo on permisos.Id_Grupo = grupo.Id_Grupo ";
                    $qr = $qr."where grupo.Id_Grupo = ".$usuario['Id_Grupo'];
                   
                    $resultado = $con->query($qr);
                    
                    while($fila = $resultado->fetch_assoc())
                    {
                        $permisos[$fila['Pantalla']]['Ingresar'] = $fila['Ingresar'];
                        $permisos[$fila['Pantalla']]['Agregar'] = $fila['Agregar'];
                        $permisos[$fila['Pantalla']]['Modificar'] = $fila['Modificar'];
                        $permisos[$fila['Pantalla']]['Borrar'] = $fila['Borrar'];
                    }
                    $_SESSION['permisos'] = $permisos;
                    header("location: ../home/index.php");
                }
                else
                {
                    if($usuario['Estado'] == 0)
                    {
                        header("location: login.php?state=true");
                    }
                }
        }
        else
        {
                header("location: login.php?error=true");
        }
    }
}