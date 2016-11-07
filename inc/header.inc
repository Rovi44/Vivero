<header>
		<div class="container clearfix">
		<div class="row">
			  <div class="span12">
				<div class="navbar navbar_">
					  <div class="container">
                                              <a href="../home/index.php"><img style="padding: 0px;" src="../img/logo.png"> </a>
						<a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
						<div class="nav-collapse nav-collapse_  collapse">
							<ul class="nav sf-menu">
							<li class="active"><a href="../home/index.php">Inicio</a></li>
                                                        <?php
                                                        if($_SESSION['permisos']['Usuarios']['Ingresar'] == 1 || $_SESSION['permisos']['Permisos']['Ingresar'])
                                                        {
                                                            echo '<li class="sub-menu"><a href="#">Usuarios</a>
                                                                        <ul>';
                                                            if($_SESSION['permisos']['Usuarios']['Ingresar'] == 1)
                                                            {
                                                                echo' <li><a href="../usuarios/adUsusarios.php">Administrar</a></li><br>';
                                                            }
                                                            if($_SESSION['permisos']['Permisos']['Ingresar'] == 1)
                                                            {
                                                                echo '<li><a href="../seguridad/permisos.php">Permisos</a></li>';
                                                                
                                                            }
                                                                 echo '</ul></li>';
                                                        }
                                                        
                                                        if($_SESSION['permisos']['Productos']['Ingresar'] == 1)
                                                        {
                                                            echo '<li class="sub-menu"><a href="#">Productos</a>
                                                                        <ul>';
                                                               echo'<li><a href="../productos/MostrarProduc.php">Cat&aacute;logo</a></li><br>';
                                                            if($_SESSION['permisos']['Ventas']['Agregar'] == 1)
                                                                {
                                                                    echo '<li><a href="../ventas/VentasDev.php">Mis Compras</a></li><br>';
                                                                }
                                                            if($_SESSION['permisos']['Productos']['Agregar'] == 1)
                                                                {
                                                                    echo '<li><a href="../productos/IngresarP.php">Nuevo</a></li><br>';
                                                                 }
                                                                 
                                                            if($_SESSION['permisos']['Productos']['Modificar'] == 1)
                                                                {
                                                                    echo '<li><a href="../productos/TipoProducto.php">Tipos</a></li>';
                                                                 }
                                                                 echo '</ul>';
                                                        }
                                                        
                                                        if($_SESSION['permisos']['Compras']['Ingresar'] == 1 || $_SESSION['permisos']['Proveedores']['Ingresar'] == 1)
                                                        {
                                                            echo '<li class="sub-menu"><a href="#">Compras</a>
                                                                        <ul>';
                                                                 
                                                            if($_SESSION['permisos']['Productos']['Agregar'] == 1)
                                                                {
                                                                    echo'<li><a href="../compras/nuevaCompra.php">Nueva</a></li><br>';
                                                                 }
                                                            if($_SESSION['permisos']['Compras']['Ingresar'] == 1){
                                                                    echo'<li><a href="../compras/adCompras.php">Administrar</a></li><br>';
                                                            }
                                                            if($_SESSION['permisos']['Proveedores']['Ingresar'] == 1){
                                                                    echo'<li><a href="../compras/proveedores.php">Proveedores</a></li><br>';
                                                            }
                                                            echo '</ul>';
                                                        }
                                                        if($_SESSION['permisos']['Ventas']['Ingresar'] == 1)
                                                        {
                                                            echo '<li class="sub-menu"><a href="#">Ventas</a>
                                                                        <ul>';
                                                                echo '<li><a href="../ventas/VerVenta.php">Administrar</a></li><br>';
                                                                echo '<li><a href="../ventas/VerDevoluciones.php">Devoluciones</a></li>';
                                                            echo '</ul>';
                                                        }
                                                        ?>
														
                                                        <li class="sub-menu"><a href="#">Sesi&oacute;n</a>
                                                        <?php
                                                        if(isset($_SESSION['valido']) && $_SESSION['valido']===true)
                                                        {echo '
                                                            <ul>
                                                                <li><a href="../seguridad/logout.php">Cerrar</a></li>
                                                            </ul>
                                                        ';}
                                                        else{
                                                           echo ' <ul>
                                                                <li><a href="../seguridad/login.php">Iniciar</a></li>
                                                        </ul>';}
                                                        ?>
                                                        </li>
						  </ul>
                                                                
						</div>
				  </div>
				</div>
		  </div>
		</div>
	  </div>
    </header>
