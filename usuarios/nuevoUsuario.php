<?php
            foreach ($_POST as $key => $value) {
            echo $key.' = '.$value.'<br>';
}
           if(isset($_POST['submit']) || (isset($_POST['option']) && $_POST['option']=='1'))
            {
                session_start();
                include(dirname(__DIR__).'/bdd/connect.php');
                $correo = $con->real_escape_string(strtolower($_POST['email']));
                $pass = $con->real_escape_string($_POST['pass']);
                $name = $con->real_escape_string($_POST['name']);
                $lname = $con->real_escape_string($_POST['lname']);
                $phone = $con->real_escape_string($_POST['phone']);
                $date = $con->real_escape_string($_POST['date']);
                if($_POST['option'] == '1'){$group = $con->real_escape_string(explode("_",$_POST['grupo'])[0]);}
                else {$group=3;}
                $sqlqr = 'INSERT INTO `usuarios`(`Usuario`, `Password`, `Nombre`, `Apellido`, `Telefono`, `Nacimiento`, `Id_Grupo`)';
                $sqlqr = $sqlqr." values ('".$correo."','".md5($pass)."','";
                $sqlqr = $sqlqr.$name."','".$lname."','".$phone."','".$date."',".$group.")";


                echo $sqlqr;

                if($con->query($sqlqr) === TRUE)
                {
                    if(!isset($_SESSION['valido']) || $_SESSION['valido'] != true)
                    {
                        header("location: ../seguridad/login.php?succes=true");
                    }
                    elseif ($_POST['option']=='1')
                    {
                        header("location: adUsusarios.php?success=1&page=".$_POST['max']);
                    }
                    else
                    {
                        header("location: ../index.php?success=true");
                    }
                }
                else
                {
                    if ($_POST['option']=='1')
                    {
                        header("location: adUsusarios.php?error=1&page=1");
                    }
                    else
                    {
                        header("location: ../seguridad/signup.php?error=true");
                    }
                }
            }