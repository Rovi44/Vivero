<?php
	$host = '52.37.202.53';
	$con = new mysqli($host,'vivero','8x99jpZGjBM3bv9A','vivero');
	if($con -> connect_errno)
	{
		echo "Fallo al conectar a mysql: (" . $con->connect_errno.")".$con->connect_error;
	}
