<?php
if(isset($var) && $var==true)
{
    include(dirname(__DIR__).'/bdd/connect.php');
    $select = "select Id_Proudcto, Nombre, Precio from producto";
    
   if($resultado = $con->query($select))
    {
        while($fila = $resultado->fetch_assoc())
        {
            $nombre = str_replace('_', '-', $fila['Nombre']);
            echo '<option value="'.$fila['Id_Proudcto'].'_'.$fila['Nombre'].'_'.$fila['Precio'].'">'.$fila['Nombre'];
        }
    }
}
    
