<?php
if(isset($var) && $var = true)
{
    include('/../bdd/connect.php');
    $select = "SELECT compras.Id_Compra, proveedores.Nombre, compras.Fecha, compras.Total, compras.Descripcion, usuarios.Usuario from compras INNER JOIN proveedores on compras.Id_Proveedor = proveedores.Id_Proveedor INNER JOIN usuarios on usuarios.Id_Usuario = compras.Id_Usuario limit ".(($_GET['page']-1)*$tpages).', '.($_GET['page']*$tpages);
    
    if($resultado = $con->query($select))
    {
        while($fila = $resultado->fetch_assoc())
        {
            echo '<tr>';
            echo '<td>'.$fila['Id_Compra'].'</td>';
            echo '<td>'.$fila['Nombre'].'</td>';
            echo '<td>'.$fila['Fecha'].'</td>';
            echo '<td>'.$fila['Total'].'</td>';
            echo '<td>'.$fila['Descripcion'].'</td>';
            echo '<td>'.$fila['Usuario'].'</td>';
            echo '<td><button class="btn btn-small btn-info fa fa-book"';
            echo ' onclick="return book(\''.$fila['Id_Compra'].'\',\''.$fila['Nombre'].'\')"';
            echo '></td>';
            echo '</tr>';
        }
    }
}
