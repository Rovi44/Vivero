<?php

    if(isset($_POST['id']))
    {
        $datos = explode('_', $_POST['id']);
        $qr = 'SELECT permisos.Id_Grupo,modulos.Id_Pantalla, modulos.Pantalla, permisos.Ingresar, permisos.Agregar, permisos.Modificar, permisos.Borrar from permisos inner JOIN modulos on permisos.Id_Pantalla = modulos.Id_Pantalla ';
        $qr =$qr." where permisos.Id_Grupo = ".$datos[0];
        if($resultado = $con->query($qr))
        {
            echo '<table class="table" style="color: #CEF6CE; ">';
            echo '<tr>';
            echo '<th>Modulo</th>';
            echo '<th>Ingresar</th>';
            echo '<th>Agregar</th>';
            echo '<th>Modificar</th>';
            echo '<th>Borrar</th>';
            if($_SESSION['permisos']['Permisos']['Modificar'] === '1'){
                echo '<th>Modificar</th></tr>';
            }
            
            while($fila = $resultado->fetch_assoc())
            {
                echo '<tr>';
                echo '<td>'.$fila['Pantalla'].'</td>';
                echo ($fila['Ingresar'] == '1'? '<td class="text-success">true</td>' : '<td class="text-warning">false</td>');
                echo ($fila['Agregar'] == '1'? '<td class="text-success">true</td>' : '<td class="text-warning">false</td>');
                echo ($fila['Modificar'] == '1'? '<td class="text-success">true</td>' : '<td class="text-warning">false</td>');
                echo ($fila['Borrar'] == '1'? '<td class="text-success">true</td>' : '<td class="text-warning">false</td>');
                if($_SESSION['permisos']['Permisos']['Modificar'] === '1'){
                echo '<td><button class="btn btn-small btn-info fa fa-pencil"';
                echo 'onclick="return modPermisos(\''.$fila['Id_Grupo'].'\',\''.$fila['Id_Pantalla'].'\',\''.$fila['Pantalla'].'\',\''.$fila['Ingresar'].'\',\''.$fila['Agregar'].'\',\''.$fila['Modificar'].'\',\''.$fila['Borrar'].'\')"></button></td>';}
                echo '</tr>';
            }
            echo '</table>';
        }
    }
