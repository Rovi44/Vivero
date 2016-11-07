
$val = false;
$(document).ready(function() {
            $('#Proveedor').dialog({
            autoOpen: false,
                        buttons: {
                            "Aceptar": function() {
                                $(this).dialog("close");
                                if(compare())
                                {
                                    $("#frmPro").submit();
                                }
                            },
                            "Cancel": function() {
                                $(this).dialog("close");
                            }
                        }
        });
        });


function nuevo()
{
    $('#frmPro').find('input.phone').attr('value','');
    $('#frmPro').find('input.name').attr('value','');
    $('#frmPro').find('input.email').attr('value','');
    $('#frmPro').find('input.dir').attr('value','');
    $('#frmPro').find('input.en').attr('value','');
    $('#frmPro').find('input.id').attr('value','');
    $('#frmPro').find('input.hphone').attr('value','');
    $('#frmPro').find('input.hname').attr('value','');
    $('#frmPro').find('input.hemail').attr('value','');
    $('#frmPro').find('input.hdir').attr('value','');
    $('#frmPro').find('input.hen').attr('value','');
    $('#frmPro').find('input.id').attr('value','');
    $('#frmPro').find('input.option').attr('value','1');
    $("#frmPro").find('.error').each(function()
    {
        $(this).slideUp();
    });
    $('#Proveedor').dialog('open');
    return false;
}

function mod(id,name,email,dir,en,phone)
{
    $('#frmPro').find('input.phone').attr('value',phone);
    $('#frmPro').find('input.name').attr('value',name);
    $('#frmPro').find('input.email').attr('value',email);
    $('#frmPro').find('input.dir').attr('value',dir);
    $('#frmPro').find('input.en').attr('value',en);
    $('#frmPro').find('input.hphone').attr('value',phone);
    $('#frmPro').find('input.hname').attr('value',name);
    $('#frmPro').find('input.hemail').attr('value',email);
    $('#frmPro').find('input.hdir').attr('value',dir);
    $('#frmPro').find('input.hen').attr('value',en);
    $('#frmPro').find('input.id').attr('value',id);
    $('#frmPro').find('input.option').attr('value','2');
    $("#frmPro").find('.error').each(function()
    {
        $(this).slideUp();
    });
    $('#Proveedor').dialog('open');
    return false;
}

function compare()
{
    if($('#frmPro').find('input.name').val() != $('#frmPro').find('input.hname').val())
    {
        return true;
    }
    if($('#frmPro').find('input.email').val() != $('#frmPro').find('input.hemail').val())
    {
        return true;
    }
    if($('#frmPro').find('input.dir').val() != $('#frmPro').find('input.hdir').val())
    {
        return true;
    }
    if($('#frmPro').find('input.en').val() != $('#frmPro').find('input.hen').val())
    {
        return true;
    }
    if($('#frmPro').find('input.phone').val() != $('#frmPro').find('input.hphone').val())
    {
        return true;
    }
    else
        return false;
}

$(document).ready(function() {
    $(".name").blur(function()
    {
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".nameEmpty").slideDown("slow");
           $var = false;
        }
        else
        {
           $(this).parent().children(".nameEmpty").slideUp("slow");
           $var = true;
        }
    });
 });
 
$(document).ready(function() {
    $(".phone").blur(function()
    {
        $regEx =  /^[0-9]{4}\-[0-9]{4}$/;
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".phoneError").slideUp("slow");
           $(this).parent().children(".phoneEmpty").slideDown("slow");
           $var = false;
        }
        else if(!$regEx.test($val))
        {
            $(this).parent().children(".phoneEmpty").slideUp("slow");
            $(this).parent().children(".phoneError").slideDown("slow");
           $var = false;
        }
        else
        {
            $(this).parent().children(".phoneError").slideUp("slow");
            $(this).parent().children(".phoneEmpty").slideUp("slow");
           $var = true;
        }
    }
    );
});

$(document).ready(function() {
    $(".email").blur(function()
    {
        $regEx =  /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/;
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".emailError").slideUp("slow");
           $(this).parent().children(".emailEmpty").slideDown("slow");
           $var = false;
        }
        else if(!$regEx.test($val))
        {
            $(this).parent().children(".emailEmpty").slideUp("slow");
            $(this).parent().children(".emailError").slideDown("slow");
           $var = false;
        }
        else
        {
            $(this).parent().children(".emailError").slideUp("slow");
            $(this).parent().children(".emailEmpty").slideUp("slow");
           $var = true;
        }
    }
    );
});

$(document).ready(function() {
    $(".dir").blur(function()
    {
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".dirEmpty").slideDown("slow");
           $var = false;
        }
        else
        {
           $(this).parent().children(".dirEmpty").slideUp("slow");
           $var = true;
        }
    });
 });
 
$(document).ready(function() {
    $(".en").blur(function()
    {
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".enEmpty").slideDown("slow");
           $var = false;
        }
        else
        {
           $(this).parent().children(".enEmpty").slideUp("slow");
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
   
   if($var)
   {
       $("this").submit();
   }
   else
   {
       return false;
   }
});
});