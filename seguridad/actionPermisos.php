<script src="../js/jquery.js" type="text/javascript"></script>

<?php
    if(isset($_POST['groupName']) || isset($_POST['id']))
    {
        include(dirname(__DIR__).'/bdd/connect.php');
        if($_POST['option'] == '1')
        {
            $insert = 'INSERT INTO `grupo`(`Grupo`) VALUES(\''.$_POST['groupName'].'\')';
            $con->query($insert);
            try{
                $con->begin_transaction();
                $permiso =  'INSERT INTO `permisos`(`Id_Pantalla`, `Id_Grupo`, `Ingresar`, `Agregar`, `Modificar`, `Borrar`) VALUES(';
                
                $select = 'select Id_Grupo from grupo where Grupo = "'.$_POST['groupName'].'"'; 
                $resultado = $con->query($select);
                $fila = $resultado->fetch_assoc();
                $id = $fila['Id_Grupo'];
                $usuarios = $permiso.'1,'.$id.',0,0,0,0)';
                $productos = $permiso.'2,'.$id.',1,0,0,0)';
                $compras = $permiso.'3,'.$id.',0,0,0,0)';
                $ventas = $permiso.'4,'.$id.',0,0,0,0)';
                $per = $permiso.'5,'.$id.',0,0,0,0)';
                $pro = $permiso.'6,'.$id.',0,0,0,0)';
                
                $con->query($usuarios);
                $con->query($productos);
                $con->query($compras);
                $con->query($ventas);
                $con->query($per);
                $con->query($pro);
                $con->commit();
                
                echo '<script>
                    $(document).ready(function(){
                        $("#form").attr("action","permisos.php?success=1");
                        $("#form").submit();
                    });
                </script>';
            }
            catch (Exception $e)
            {
                $con->rollback();
                
            }
        }
        if($_POST['option'] == '2')
        {
            $id = $_POST['groupName'];
            $existing = "select * from usuarios where Id_Grupo = ".$id;
            $resultado = $con->query($existing);
            echo $con->affected_rows.'<br>';
            if($con->affected_rows != 0)
            {
                header('location: permisos.php?error=1');
            }
            else
            {
                try {
                    $con->begin_transaction();
                    $delete = "delete from permisos where Id_Grupo = ".$id;
                    echo $delete.'<br>';
                    $con->query($delete);
                    $delete ="delete from grupo where Id_Grupo = ".$id;
                    $con->query($delete);
                    $con->commit();
                    header('location: permisos.php?success=2');
                } catch (Exception $ex) {
                    $con->rollback();
                }
            }
        }
        if($_POST['option'] == '3')
        {
            $id = $_POST['id'];
            $update = "update permisos set ";
            if(isset($_POST['ingresar']) && $_POST['ingresar'] == '1')
            {
                $update = $update."Ingresar = 1, ";
            }
            else
            {
                $update = $update."Ingresar = 0, ";                
            }
            if(isset($_POST['agregar']) && $_POST['agregar'] == '1')
            {
                $update = $update."Agregar = 1, ";
            }
            else
            {
                $update = $update."Agregar = 0, ";                
            }
            if(isset($_POST['modificar']) && $_POST['modificar'] == '1')
            {
                $update = $update."Modificar = 1, ";
            }
            else
            {
                $update = $update."Modificar = 0, ";                
            }
            if(isset($_POST['borrar']) && $_POST['borrar'] == '1')
            {
                $update = $update."Borrar = 1 ";
            }
            else
            {
                $update = $update."Borrar = 0 ";                
            }
            $update = $update." where Id_Grupo = ".$id." and Id_Pantalla = ".$_POST['idp'];
            if($con->query($update))
            {
                echo '<script>
                    $(document).ready(function(){
                        $("#form").attr("action","permisos.php?success=3");
                        $("#form").submit();
                    });
                </script>';
            }
        }
    }
?>
<form method="post" action="permisos.php?success=1" id="form">
           <?php
           if(isset($id))
           {
               echo '<input type="hidden" name="id" value="'.$id.'_'.$_POST['groupName'].'">';
           }           ?>
</form>
