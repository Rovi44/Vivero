   

<script src="../js/jquery.js" type="text/javascript"></script>
<?php
session_start();

    if(isset($_POST['tipoP']))
    {

        include(dirname(__DIR__).'/bdd/connect.php');

    	$nuevoTipo=$_POST["tipoP"];

    	$consulta="DELETE FROM `tipo` WHERE Id_Tipo='".$nuevoTipo."'";
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
