/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var bandera = false;

$(document).ready(function() {
            $('#selectPermiso').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                $('#selectPermiso').children("form.form").children("div.grupo").children("input.name").trigger('blur');
                                if(bandera)
                                {
                                    $("#selectPermiso").children("form.form").submit();
                                    $(this).dialog("close");
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
        
$(document).ready(function() {
    $("input.name").blur(function()
    {
       bandera = true;
       if($.trim($(this).val()) === '') 
       {
           bandera = false;
           $(this).parent().children("div.emptyName").html("<small>*No puede dejar este campo vacío</small>");
           $(this).parent().children("div.emptyName").slideDown("slow");
       }
    });
});
        
$(document).ready(function() {
            $('#modPermiso').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                var bool = false;
                                var ing = $("#modPermiso").children("form.form").children("div.ingresar").children("input.checkbox").is(":checked")?'1':'0';
                                var add = $("#modPermiso").children("form.form").children("div.agregar").children("input.checkbox").is(":checked")?'1':'0';
                                var mod = $("#modPermiso").children("form.form").children("div.modificar").children("input.checkbox").is(":checked")?'1':'0';
                                var erase = $("#modPermiso").children("form.form").children("div.borrar").children("input.checkbox").is(":checked")?'1':'0';
                                if (ing !== $("#modPermiso").children("form.form").children("input.ingresar").val())
                                {
                                    bool = true;
                                }else if (mod !== $("#modPermiso").children("form.form").children("input.modificar").val())
                                {
                                    bool = true;
                                }else if (add !== $("#modPermiso").children("form.form").children("input.agregar").val())
                                {
                                    bool = true;
                                }else if (erase !== $("#modPermiso").children("form.form").children("input.borrar").val())
                                {
                                    bool = true;
                                }
                                if(bool)
                                {
                                    $("#modPermiso").children("form.form").submit();
                                }
                                $(this).dialog("close");
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });

function nuevoPermiso()
{
    $('#selectPermiso').children("form.form").children("input.option").attr('value','1');
    $('#selectPermiso').children("form.form").children("div.grupo").children("div.emptyName").slideUp();
    $('#selectPermiso').children("form.form").children("div.grupo").children("input.name").attr("value","");
    $('#selectPermiso').dialog('open');
    return false;
}

function modPermisos(id,idp,pantalla,ingresar,agregar,modificar,borrar)
{
    $("#pantalla").html("Pantalla: " + pantalla);
    $("#modPermiso").children("form.form").children("input.option").attr("value",'3');
    $("#modPermiso").children("form.form").children("input.id").attr("value",id);
    $("#modPermiso").children("form.form").children("input.idPantalla").attr("value",idp);
    $("#modPermiso").children("form.form").children("input.ingresar").attr("value",ingresar);
    $("#modPermiso").children("form.form").children("input.agregar").attr("value",agregar);
    $("#modPermiso").children("form.form").children("input.modificar").attr("value",modificar);
    $("#modPermiso").children("form.form").children("input.borrar").attr("value",borrar);
    $("#modPermiso").children("form.form").children("div.ingresar").children("input.checkbox").prop("checked",(ingresar==='1'?true:false));
    $("#modPermiso").children("form.form").children("div.modificar").children("input.checkbox").prop("checked",(modificar==='1'?true:false));
    $("#modPermiso").children("form.form").children("div.agregar").children("input.checkbox").prop("checked",(agregar==='1'?true:false));
    $("#modPermiso").children("form.form").children("div.borrar").children("input.checkbox").prop("checked",(borrar==='1'?true:false));
    $("#modPermiso").dialog("open");
    return false;
}

function borrarGrupo()
{
    var datos = $("#selectedGroup").val();
    var id = datos.split('_')[0];
    var grupo = datos.split('_')[1];
    if(id !== '2')
    {
        $('#selectPermiso').children("form.form").children("input.option").attr('value','2'); 
        $("#selectPermiso").children("form.form").children("div.grupo").children("input.name").attr("value",id);
        $("#selectPermiso").children("form.form").children("div.grupo").children("input.name").attr("value",id);
        if(confirm('¿Desea eliminar el grupo: ' + grupo + '?'))
        {$("#selectPermiso").children("form.form").submit();}
    }
    else
    {
        alert("No puede eliminar este grupo");
    }
    return false;
}