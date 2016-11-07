<?php
        $qr = " select * from grupo";
        echo '<select name="id" id="selectedGroup">';
       
        if($resultado = $con->query($qr))
        {
            while($fila = $resultado->fetch_assoc())
            {
                if($fila['Id_Grupo'] != '1')
                {
                    
                    echo '<option ';
                    echo 'value = "'.$fila['Id_Grupo'].'_'.$fila['Grupo'].'"';
                    if(isset($_POST['id']))
                    {
                        $datos = explode('_', $_POST['id']);
                        if($datos[0] == $fila['Id_Grupo'])
                        {
                            echo 'selected>';
                        }
                        else{echo '>';}
                    }
                    else {echo '>';}
                    echo $fila['Grupo'].'</option>';
                    $groups = [$fila['Id_Grupo']][$fila['Grupo']];
                 }
            }
        }
        echo '</select>';
