

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../css/index.css" rel="stylesheet" type="text/css"/>

<div class="col-sm-4 col-sm-offset-4 text-center">
    <h1 class="text-danger">Error: </h1>
    <h2>No puedes entrar aqu&iacute;</h2>
    <?php 
    session_start();
    if(isset($_SESSION['valido']) && $_SESSION['valido'] === true)
    {
        echo '<h2><a href="../home/index.php">Volver al inicio</a></h2>';
    }
    else
    {
        echo '<h2><a href="login.php">Inicia sesi&oacute;n</a></h2>';
    }
    ?>
    <img src="../img/no.jpg" alt=""/>
</div>