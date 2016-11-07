<?php
    include('/../bdd/connect.php');
    $qr = "select count(Id_Usuario) as total from usuarios";
    $resultado = $con->query($qr);
    $actual = $_GET['page'];
    $fila = $resultado->fetch_assoc();
    $total = $fila['total'];
    $pages = ceil($total/10);
    $qr ="SELECT * FROM usuarios INNER JOIN grupo on usuarios.Id_Grupo = grupo.Id_Grupo where usuarios.Id_Usuario order by usuarios.Id_Usuario ASC limit ".(($_GET['page']-1)*10)." , ".($_GET['page']*10);

    if($resultado = $con->query($qr))
    {
        while($fila = $resultado->fetch_assoc())
        {
            echo '<tr>';
            echo '<td>'.$fila['Usuario'].'</td>';
            echo '<td>'.($fila['Nombre'] == NULL ? 'N/A':$fila['Nombre']).'</td>';
            echo '<td>'.($fila['Apellido'] == NULL ? 'N/A':$fila['Apellido']).'</td>';
            echo '<td>'.($fila['Telefono'] == NULL ? 'N/A':$fila['Telefono']).'</td>';
            echo '<td>'.($fila['Nacimiento'] == NULL ? 'N/A':$fila['Nacimiento']).'</td>';
            echo '<td>';
            if($fila['Id_Grupo'] != '1' && $fila['Id_Grupo'] != '2')
            {
                if($fila['Estado'] == '1'){
                    echo '<button class="btn btn-danger" ';
                    if($_SESSION['permisos']['Usuarios']['Borrar'] === '1')
                    {
                    echo 'onclick="return dropUser(\''.$fila['Id_Usuario'].'\')"><i class="fa fa-trash"></i></button>';
                    }
                    else
                    {
                        echo 'onclick="return false"><i class="fa fa-trash"></i></button>';
                    }
                }
                else
                {
                    echo '<button class="btn btn-success" ';
                    if($_SESSION['permisos']['Usuarios']['Borrar'] === '1')
                    {
                        echo 'onclick="return activateUser(\''.$fila['Id_Usuario'].'\')"><i class="fa fa-rebel"></i></button>';
                    }
                    else
                    {
                        echo 'onclick="return false"><i class="fa fa-rebel"></i></button>';
                    }
                    }
            }   
            echo '</td><td>'.$fila['Grupo'].'</td>';
            
            if($_SESSION['permisos']['Usuarios']['Modificar'] === '1')
            {
                echo '<td width="100px">';
                if($fila['Id_Grupo'] != '1' && $fila['Id_Grupo'] != '2')
                {
                    echo '<button class="btn btn-info fa fa-pencil" onclick="return modUser(\'';
                    echo $fila['Id_Usuario'].'\',\'';
                    echo $fila['Usuario'].'\',\'';
                    echo $fila['Nombre'].'\',\'';
                    echo $fila['Apellido'].'\',\'';
                    echo $fila['Telefono'].'\',\'';
                    echo $fila['Nacimiento'].'\',\'';
                    echo $fila['Id_Grupo'].'\')">';
                }
                if($fila['Id_Grupo'] != '2' && $_SESSION['permisos']['Usuarios']['Modificar'] === '1')
                {
                    echo '<button class="fa fa-expeditedssl btn" onclick="return modPass(\''.$fila['Id_Usuario'].'\',\''.$fila['Usuario'].'\')"></button>';
                }
                echo '</td>';
            }
           
        }
    }
    
    $qr = "select * from grupo";
    if($resultado = $con->query($qr))
    {
        $i = 0;
        while($fila = $resultado->fetch_assoc())
        {
            if($fila['Id_Grupo'] != '1' && $fila['Id_Grupo'] != '2')
            {
                $grupos[$i]= $fila['Id_Grupo'].'_'.$fila['Grupo'];
                $i++;
            }
        }
    }
