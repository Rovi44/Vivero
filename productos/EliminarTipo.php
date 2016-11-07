   

<script src="../js/jquery.js" type="text/javascript"></script>
<?php
session_start();

    if(isset($_POST['tipoP']))
    {

    	$conexion=new mysqli("localhost","root","","vivero");

    	$nuevoTipo=$_POST["tipoP"];

    	$consulta="DELETE FROM `tipo` WHERE Id_Tipo='".$nuevoTipo."'";
    	$resultado=$conexion->query($consulta);

    	echo $resultado;
    	try{
    		echo '<script type="text/javascript">
				alert("INGRESADO EXITOSAMENTE");

                </script>';
            }
            catch (Exception $e)
            {
                $conexion->rollback();
                
            }

                header("Location: TipoProducto.php");
    }

    ?>
