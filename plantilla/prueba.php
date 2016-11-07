<?php
	session_start();
	$conexion=new mysqli("localhost","root","","vivero");

	$sql = "SELECT * FROM producto";
	$resultado=$conexion->query($sql);
	$rut=$resultado['Imagen'];

	while ($row = mysqli_fetch_assoc($resultado)) 
	{

		 	echo "<img src=".$rut."/>";
		 	echo '<br><br>';
	}
?>