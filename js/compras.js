$var = false;


$(document).ready(function() {
            $('#Proveedor').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                $(this).dialog("close");
                                $('#items').find('input.id').attr('value',$('#Proveedor').find('.proSelect').val());
                                $('#items').find('input.des').attr('value',$('#Proveedor').find('.des').val());
                                if(confirm('¿Desea agregar la compra del proveedor: ' + $('#Proveedor').find('.proSelect').val()))
                                { 
                                     $('#items').submit();
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });
        
$(document).ready(function() {
            $('#dev').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {;
                                $(this).dialog("close");
                                if($.trim($('#frmDevoluciones').find('input.cantidad').val()) != '')
                                {
                                    if(parseInt($('#frmDevoluciones').find('input.max').val()) < parseInt($('#frmDevoluciones').find('input.cantidad').val()))
                                    {
                                        alert('No se puede completar esta acción');
                                    }
                                    else
                                    {
                                        $('#frmDevoluciones').submit();
                                    }
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });


$(document).ready(function() {
  $("#option").select2();
});

function addItem()
{
    $('#items').find('input.option').attr('value','1');
    $('#items').attr('action','nuevaCompra.php');
    $('#items').submit();
}

function dropItem(index)
{
    $('#items').find('input.id').attr('value',index);
    $('#items').find('input.option').attr('value','2');
    $('#items').attr('action','modCompra.php');
    $('#items').submit();
}


function dropCar()
{
    $('#items').find('input.option').attr('value','3');
    $('#items').attr('action','modCompra.php');
    $('#items').submit();
}

function dev(max,id,price)
{
    $('#frmDevoluciones').find('input.cantidad').attr('value','');   
    $('#frmDevoluciones').find('input.max').attr('value',max);
    $('#frmDevoluciones').find('input.item').attr('value',id);
    $('#frmDevoluciones').find('input.price').attr('value',price);       
    $('#dev').dialog('open');
    return false;
}

function accept()
{
    $('#items').find('input.option').attr('value','4');
    $('#items').attr('action','modCompra.php');
    $('#Proveedor').dialog('open');
    return false;
}

function book(id,nombre)
{
    $('#frmCompra').find('input.id').attr('value',id);
    $('#frmCompra').find('input.name').attr('value',nombre);
    $('#frmCompra').submit();
}

$(document).ready(function() {
    $(".cantidad").blur(function() {
    $val = $(this).val();
    $regEx =  /^[0-9]+$/;
        if($.trim($val) === '')
        {
           $(this).parent().find(".cantidadError").slideUp("slow");
           $(this).parent().find(".cantidadEmpty").slideDown("slow");
           $var = false;
        }
        else if(!$regEx.test($val))
        {
            $(this).parent().find(".cantidadEmpty").slideUp("slow");
            $(this).parent().find(".cantidadError").slideDown("slow");
            $var = false;
        }
        else
        {
            $(this).parent().find(".cantidadError").slideUp("slow");
            $(this).parent().find(".cantidadEmpty").slideUp("slow");
            $var = true;
        }
});
});

$(document).ready(function() {
$(".form").submit(function()
{
   $(this).find('input').each(function()
   {
       $(this).trigger('blur');
   });
   
   if($var || ($('#items').find('input.option').val() === '2') || ($('#items').find('input.option').val() === '4'))
   {
       $("this").submit();
   }
   else
   {
       return false;
   }
});
});