var pass;

$(document).ready(function() {
            $('#nuevoUsuario').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                $(this).dialog("close");
                                $("#frmNew").children("input.option").attr("value","1");
                                $("#frmNew").submit();
                                if($var == false)
                                {
                                    alert("Error al agregar usuario");
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
        
$(document).ready(function() {
            $('#modifier').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                $(this).dialog("close");
                                $var = false
                                
                                if($("#frmModify").children("div.user").children("input.email").val() !== $("#frmModify").children("input.hiddenUser").val())
                                {$var = true;}
                                else if($("#frmModify").children("div.name").children("input.name").val() != $("#frmModify").children("input.hiddenName").val())
                                {$var = true;}
                                else if($("#frmModify").children("div.lname").children("input.lname").val() != $("#frmModify").children("input.hiddenLName").val())
                                {$var = true;}
                                else if($("#frmModify").children("div.phone").children("input.phone").val() != $("#frmModify").children("input.hiddenPhone").val())
                                {$var = true;
                                    alert('4');}
                                else if($("#frmModify").children("div.date").children("div.date").children("input.datepicker").val() != $("#frmModify").children("input.hiddenDate").val())
                                {$var = true;}
                                else if($("#frmModify").children("div.group").children("select.group").val() != $("#frmModify").children("input.hiddenGroup").val())
                                {$var = true;}
                                
                                if($var == true)
                                {
                                    $("#frmModify").submit();
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });

$(document).ready(function() {
            $('#passm').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                $(this).dialog("close");
                                if($var == true)
                                {
                                    if(confirm('¿Desea cambiar la contraseña del usuario: ' + pass))
                                    {
                                        $('#frmPass').submit();
                                    }
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
        
function newUser()
{
    $("#frmNew").find('input').each(function()
    {
        if($(this).attr('name') != 'max')
        {$(this).attr('value','');}
    });
    $("#frmNew").find('.error').each(function()
    {
        $(this).slideUp();
    });
    $("#nuevoUsuario").dialog("open");
    return false;
};

function modUser(id,user,name,lname,phone,date,group)
{
    $("#frmModify").find("input.id").attr('value',id);
    $("#frmModify").find("input.email").attr('value',user);
    $("#frmModify").find("input.name").attr('value',name);
    $("#frmModify").find("input.lname").attr('value',lname);
    $("#frmModify").find("input.phone").attr('value',phone);
    $("#frmModify").find("div.date").children("input.datepicker").attr('value',date);
    $("#frmModify").find("select.group").attr("value",group);
    $("#frmModify").find("input.hiddenUser").attr('value',user);
    $("#frmModify").find("input.hiddenName").attr('value',name);
    $("#frmModify").find("input.hiddenLName").attr('value',lname);
    $("#frmModify").find("input.hiddenPhone").attr('value',phone);
    $("#frmModify").find("input.hiddenDate").attr('value',date);
    $("#frmModify").find("input.hiddenGroup").attr("value",group);
    $("#frmModify").find('.error').each(function()
    {
        $(this).slideUp();
    });
    $("#modifier").dialog("open");
    return false;
};

function modPass(id,user)
{
    pass = user;
    $('#frmPass').children('small.user').html('Usuario: '+user);
    $("#frmPass").find('input').each(function()
    {
        if($(this).attr('name') != 'actual')
        {$(this).attr('value','');}
    });
    $("#frmPass").find('.error').each(function()
    {
        $(this).slideUp();
    });
    $('#frmPass').children('input.id').attr('value',id);
    $('#frmPass').children('input.option').attr('value','2');
    $("#passm").dialog("open");
    return false;
}

function dropUser(user)
{
    $('#frmState').children('input.id').attr('value',user);
    $('#frmState').attr('action','desactivarUsuario.php');
    $('#frmState').submit();
};

function activateUser(user)
{
    $('#frmState').children('input.id').attr('value',user);
    $('#frmState').attr('action','activarUsuario.php');
    $('#frmState').submit();
};



