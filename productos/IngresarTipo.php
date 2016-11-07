<script src="../js/jquery.js" type="text/javascript"></script>
<?php
session_start();

if(isset($_POST['groupName']))
    {

        include(dirname(__DIR__).'/bdd/connect.php');

    	$nuevoTipo=$_POST["groupName"];

    	$consulta="INSERT INTO `tipo`(`Id_Tipo`, `Nombre`) VALUES (null,'".$nuevoTipo."')";
    	$resultado=$con->query($consulta);

    	echo $resultado;
    	try{
    		echo '<script type="text/javascript">
				alert("INGRESADO EXITOSAMENTE");

                </script>';
            }
            catch (Exception $e)
            {
                $con->rollback();
                
            }

                header("Location: TipoProducto.php");
    }

?>
