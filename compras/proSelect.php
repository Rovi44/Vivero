<?php
if(isset($var) && $var==true)
    
{
    include('/../bdd/connect.php');
    $select = "select Id_Proveedor, Nombre from proveedores";
    
   if($resultado = $con->query($select))
    {
        while($fila = $resultado->fetch_assoc())
        {
            $nombre = str_replace('_', '-', $fila['Nombre']);
            echo '<option value="'.$fila['Id_Proveedor'].'">'.$fila['Nombre'];
        }
    }
}
