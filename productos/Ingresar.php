<?php
	session_start();
        if(isset($_POST['commit']))
        {
        include(dirname(__DIR__).'/bdd/connect.php');


		if ($_POST['commit']) {
	
		$nombre = $_POST["nombre"];
		$precio = $_POST["precio"];
		$cantidad = $_POST["cantidad"];
		$descripcion = $_POST["descripcion"];
		$tipo =$_POST["tipo"];
		}
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		if (in_array($_FILES['SubirImagen']['type'], $permitidos) )
		{
			$ruta = "ImgBDD/";
			$rut = $ruta.basename($_FILES['SubirImagen']['name']);
			$error = $_FILES['SubirImagen']['error'];
			$subido =false;
			if(isset($_POST['commit']) && $error==UPLOAD_ERR_OK) 
			{ 
			   $subido = copy($_FILES['SubirImagen']['tmp_name'],'../'.$rut); 
				$sql="INSERT INTO `producto`(`Id_Proudcto`, `Nombre`, `Precio`, `Cantidad`, `Descripcion`, `Id_Tipo`, `Imagen`) VALUES (null,'".$nombre."','".$precio."','".$cantidad."','".$descripcion."','".$tipo."','".$rut."')";
				$con->query($sql);
				$id=$con->insert_id;
				echo $rut;
				echo '<img src="'.$rut.'"/>';
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
        
    header("Location: MostrarProduc.php");
    }
    	//redirect("/vivero/Ingresar","refresh");
    ?>
