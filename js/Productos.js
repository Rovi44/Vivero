var bandera = false;

$(document).ready(function() {
            $('#form').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                    $("#Form").submit();
                                    
                                

                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
$(document).ready(function() {
            $('#formGrupo').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                            if ($('#groupName').val() == '') {
                                    alert('El campo esta vacio');
                                } 

                                    else {                               
                                    $("#nuevoP").submit();
                                    alert('Campo correcto');
                                }

                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });

$(document).ready(function() {
            $('#formTipo').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                            $("#TipoP").submit();
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
$(document).ready(function() {
            $('#ModificarP').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                            $("#ModificarP").submit();
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });

$(document).ready(function() {
            $('#formVenta').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                             if ($('#cantidad').val() == '') {
                                    alert('El campo esta vacio');
                                } 
                                    else if(parseInt($("#formVenta").find("input.hiddenCant").val()) >= parseInt($("#formVenta").find("input.cantidad").val())) {                               
                                    $("#newVenta").submit();
                                    alert('Su compra se ha realizado correctamente');
                                    
                                }else
                                    {
                                    alert('No hay suficiente producto para realizar su compra, lo sentimos.');
                                    }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
$(document).ready(function() {
            $('#formDev').dialog({
            autoOpen: false,
            buttons: {
                         "Aceptar": function() {;
                             if ($('#cantidad').val() == '') {
                                    alert('El campo esta vacio');
                                } 

                                    else {                               
                                    $("#Devolucion").submit();
                                    alert('Su Devolucion se ha realizado correctamente');
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
$(document).ready(function() {
            $('#BorrarP').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                            $("#borrar").submit();
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });


function abrirDialogo()
{
    $('#form').dialog('open');
    return false;
}
function abrirGrupo()
{
    $('#formGrupo').dialog('open');
    return false;
}

function abrirTipo()
{
    $('#formTipo').dialog('open');
    return false;
}
function abrirModificarP(id,nombre,precio,cantidad,descripcion,tipo,ruta)
{
    $("#form").find("input.id").attr('value',id);
    $("#form").find("input.nombre").attr('value',nombre);
    $("#form").find("input.precio").attr('value',precio);
    $("#form").find("input.cantidad").attr('value',cantidad);
    $("#form").find("textarea.descripcion").attr('value',descripcion);
   // $("#ModificarP").find("input.tipo").attr('value',tipo);
   // $("#ModificarP").find("input.file").attr('value',ruta);
    $('#form').dialog('open');
    return false;
};
function abrirVenta(id,nombre,precio,cantidad,descripcion,tipo,ruta)
{
    $("#formVenta").find("input.id").attr('value',id);
    $("#formVenta").find("input.descripcion").attr('value',descripcion);
    $("#formVenta").find("input.cantidad").attr('value','');
    $("#formVenta").find("input.hiddenCant").attr('value',cantidad);
    $('#formVenta').dialog('open');
    return false;
};
function abrirDevolucion(idP,Nombre,Precio,Cantidad,Total,Fecha,idU,idV,Descripcion)
{
    $("#formDev").find("input.idP").attr('value',idP);
    $("#formDev").find("input.Nombre").attr('value',Nombre);
    $("#formDev").find("input.Precio").attr('value',Precio);
    $("#formDev").find("input.Cantidad").attr('value',Cantidad);
    $("#formDev").find("input.Total").attr('value',Total);
    $("#formDev").find("input.Fecha").attr('value',Fecha);
    $("#formDev").find("input.idU").attr('value',idU);
    $("#formDev").find("input.idV").attr('value',idV);
     $("#formDev").find("input.Descripcion").attr('value',Descripcion);
    $('#formDev').dialog('open');
    return false;
};
function abrirBorrarP(id,nombre,precio,cantidad,descripcion,tipo,ruta)
{
    $("#BorrarP").find("input.id").attr('value',id);
    $('#BorrarP').dialog('open');
    return false;
};