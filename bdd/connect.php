<?php
	$host = 'localhost';
	$con = new mysqli($host,'root','','vivero');
	if($con -> connect_errno)
	{
		echo "Fallo al conectar a mysql: (" . $con->connect_errno.")".$con->connect_error;
	}
