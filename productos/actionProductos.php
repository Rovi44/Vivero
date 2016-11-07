<?php
	session_start();
        if(isset($_POST["id"]))
        {
                include('/../bdd/connect.php');

		$id=$_POST["id"];
		echo $id;
		$nombre = $_POST["nombre"];
		$precio = $_POST["precio"];
		$cantidad = $_POST["cantidad"];
		$descripcion = $_POST["descripcion"];
		$tipo =$_POST["tipo"];
	   
		$sql="UPDATE `producto` SET `Nombre` = '".$nombre."',`Precio` = ".$precio.",`Cantidad` = ".$cantidad.",`Descripcion` = '".$descripcion."',`Id_Tipo` = ".$tipo;
		
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		if (isset($_FILES['SubirImagen']) && in_array($_FILES['SubirImagen']['type'], $permitidos) )
		{
		$ruta = "ImgBDD/";
		$rut = $ruta.basename($_FILES['SubirImagen']['name']);
		$error = $_FILES['SubirImagen']['error'];
		$subido =false;
		if($error==UPLOAD_ERR_OK) 
		{ 
		   $subido = copy($_FILES['SubirImagen']['tmp_name'], '../'.$rut); 
		   $sql = $sql.", `Imagen`='".$rut."'";
			//$id=$conexion->insert_id;
			//echo $id;
			echo "<br>";
			echo $rut;
			echo '<img src="'.$rut.'"/>';
			echo "<br>";
			echo $nombre;
			echo "<br>";
			echo $precio;
			echo "<br>";
			echo $cantidad;
			echo "<br>";
			echo $descripcion;
					echo "<br>";
			echo $tipo;

			   /* # Mostramos la imagen agregada
				echo "<div class='mensaje'>Imagen agregada con el id ".$id."</div>";
			}*/
			echo "<script language=javascript>
				 alert('Producto Ingresado Exitosamente');
				</script>";
			}
			else{
				echo "<script language=javascript>
				 alert('ERROR:El formato de archivo tiene que ser JPG, GIF, BMP o PNG');
				</script>";
			}
        }
        $sql = $sql." WHERE Id_Proudcto= ".$id;
		echo '<br><br>'.$sql;
		$con->query($sql);
		header("Location: MostrarProduc2.php"); 
    }
?>
