<?php
if(isset($var) && $var==true)
{
    include(dirname(__DIR__).'/bdd/connect.php');
    $qr ="SELECT * FROM proveedores limit ".(($_GET['page']-1)*$tpages).', '.($_GET['page']*$tpages);

    if($resultado = $con->query($qr))
    {
        while($fila = $resultado->fetch_assoc())
        {
            echo '<tr>';
            echo '<td>'.$fila['Nombre'].'</td>';
            echo '<td>'.$fila['Correo'].'</td>';
            echo '<td>'.$fila['Direccion'].'</td>';
            echo '<td>'.$fila['Encargado'].'</td>';
            echo '<td>'.$fila['Telefono'].'</td>';
            if($_SESSION['permisos']['Proveedores']['Modificar'] === '1'){
            echo '<td><button class="btn btn-small fa fa-pencil"';
            echo ' onclick="return mod(\''.$fila['Id_Proveedor'].'\',\''.$fila['Nombre'].'\',\''.$fila['Correo'].'\',\''.$fila['Direccion'].'\',\''.$fila['Encargado'].'\',\''.$fila['Telefono'].'\')"';
            echo '></td>';}
            echo '</tr>';
        }
    }
}