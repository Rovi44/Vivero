<?php
$host = 'localhost';
	$con = new mysqli($host,'proyectoVivero','bX82e7cpfbYdj3e5','vivero');
	if($con -> connect_errno)
	{
		echo "Fallo al conectar a mysql: (" . $con->connect_errno.")".$con->connect_error;
	}
