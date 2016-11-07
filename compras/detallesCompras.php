<?php
    include('/../bdd/connect.php');
    include('/../inc/carrito.php');
    if(isset($_POST['id']))
    {
        echo '<div class="row text-center">'
        . '<div class="span2"><h3>Id: '.$_POST['id'].'</h3></div>'
        . '<div class="span4"><h3>Proveedor: '.$_POST['name'].'</h3></div>'
                . '</div>';
        echo '<div class="row text-center"><h3>Compras</h3></div>';
        $select =  "select producto.Id_Proudcto ,producto.Nombre, producto.Precio ,comprasxproducto.Cantidad, comprasxproducto.Total from comprasxproducto INNER join producto on comprasxproducto.Id_Proudcto = producto.Id_Proudcto";
        $select = $select." where comprasxproducto.Id_Compra = ".$_POST['id'];
        $compras = new Carrito();
        if($resultado = $con->query($select))
        {
            while($fila = $resultado->fetch_assoc())
            {
                $p = new Item($fila['Id_Proudcto'],$fila['Nombre'],$fila['Precio'],$fila['Cantidad']);
                $compras->add($p);
            }     
        }
        $compras->detalles($_SESSION['permisos']['Compras']['Modificar']);
        
        $select =  "select producto.Id_Proudcto ,producto.Nombre, producto.Precio ,devolucionescompras.Cantidad, devolucionescompras.Total from devolucionescompras INNER join producto on devolucionescompras.Id_Proudcto = producto.Id_Proudcto";
        $select = $select." where devolucionescompras.Id_Compra = ".$_POST['id'];
        $dev = new Carrito();
        if($resultado = $con->query($select))
        {
            if($resultado->num_rows > 0)
            {
                echo '<div class="row text-center"><h3>Devoluciones</h3></div>';
                while($fila = $resultado->fetch_assoc())
                {
                    $p = new Item($fila['Id_Proudcto'],$fila['Nombre'],$fila['Precio'],$fila['Cantidad']);
                    $dev->add($p);
                }
                $dev->detallesNB();
            }
        }
    }
    else
    {
        echo '<h1>No se seleccionó ninguna compra</h1>';
    }