<script src="../js/jquery.js" type="text/javascript"></script>
<?php
    include('/../bdd/connect.php');
    if(isset($_POST['id']))
    {
        $total = $_POST['cantidad']*$_POST['price'];
        $insert = "INSERT INTO `devolucionescompras`(`Id_Compra`, `Id_Proudcto`, `Cantidad`, `Total`) VALUES ";
        $insert = $insert.'('.$_POST['id'].','.$_POST['item'].','.$_POST['cantidad'].','.$total.')';
        if($con->query($insert))
        {
            $update = "update comprasxproducto  set Total = Total - ".$total.' where Id_Compra = '.$_POST['id'].' and Id_Proudcto = '.$_POST['item'];
            $con->query($update);
            $update = "update comprasxproducto  set Cantidad = Cantidad - ".$_POST['cantidad'].' where Id_Compra = '.$_POST['id'].' and Id_Proudcto = '.$_POST['item'];
            $con->query($update);
            $update = "update compras set Total = Total - ".$total.' where Id_Compra = '.$_POST['id'];
            $con->query($update);
			$update= "UPDATE producto SET Cantidad = Cantidad - ".$_POST['cantidad']." where Id_Proudcto =  ".$_POST['item'];
			$con->query($update);
            echo '<script>'
            . '$(document).ready(function() {
                $("#frmCompra").submit();
              });'
                    . '</script>';
        }
    }
?>


<form method="post" action="compras.php" id="frmCompra">
    <input type="hidden" name="id" class="id" <?php
            if(isset($_POST['id']))
            {
                echo 'value="'.$_POST['id'].'"';
            }
        ?>>
    <input type="hidden" name="name" class="name" <?php
            if(isset($_POST['name']))
            {
                echo 'value="'.$_POST['name'].'"';
            }
        ?>>
</form>