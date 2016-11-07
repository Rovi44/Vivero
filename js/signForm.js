
$var = false;

$(document).ready(function() {
    $(".passc").blur(function() {
    $val = $(this).val();
    $val2 = $(this).parent().parent().children("div.pass").children("input.pass").val();
    if($val == '')
    {
       $(this).parent().children(".passcError").slideUp("slow");
       $(this).parent().children(".passcEmpty").slideDown("slow");
       $var = false;
    }
    else if ($val2 != $val)
    {
        $(this).parent().children(".passcEmpty").slideUp("slow");
        $(this).parent().children(".passcError").slideDown("slow");
       $var = false;
    } 
    else{
        $(this).parent().children(".passcEmpty").slideUp("slow");
        $(this).parent().children(".passcError").slideUp("slow");
       $var = true;
    } 
});
});

$(document).ready(function() {
    $(".pass").blur(function()
    {
        $regEx =  /^(?=.*[\W])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9\W]{8}/;
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".passError").slideUp("slow");
           $(this).parent().children(".passEmpty").slideDown("slow");
           $var = false;
        }
        else if(!$regEx.test($val))
        {
            $(this).parent().children(".passEmpty").slideUp("slow");
            $(this).parent().children(".passError").slideDown("slow");
            $var = false;
        }
        else
        {
            $(this).parent().children(".passEmpty").slideUp("slow");
            $(this).parent().children(".passError").slideUp("slow");
            $var = true;
        }
    });
});


$(document).ready(function() {
    $(".name").blur(function()
    {
        $regEx =  /^[a-zA-Z'][a-zA-Z-' ]+[a-zA-Z']?$/;
        $val = $(this).val();
        if($.trim($val) === '')
        {
           $(this).parent().children(".nameError").slideUp("slow");
           $(this).parent().children(".nameEmpty").slideDown("slow");
           $var = false;
        }
        else if(!$regEx.test($val))
        {
            $(this).parent().children(".nameEmpty").slideUp("slow");
            $(this).parent().children(".nameError").slideDown("slow");
           $var = false;
        }
        else
        {
            $(this).parent().children(".nameEmpty").slideUp("slow");
            $(this).parent().children(".nameError").slideUp("slow");
           $var = true;
        }
    });
 });
   
$(document).ready(function() {
$(".lname").blur(function()
{
    $regEx =  /^[a-zA-Z'][a-zA-Z-' ]+[a-zA-Z']?$/;
    $val = $(this).val();
    if($.trim($val) === '')
    {
       $(this).parent().children(".lnameError").slideUp("slow");
       $(this).parent().children(".lnameEmpty").slideDown("slow");
       $var = false;
    }
    else if(!$regEx.test($val))
    {
        $(this).parent().children(".lnameEmpty").slideUp("slow");
        $(this).parent().children(".lnameError").slideDown("slow");
       $var = false;
    }
    else
    {
        $(this).parent().children(".lnameEmpty").slideUp("slow");
        $(this).parent().children(".lnameError").slideUp("slow");
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
$(".datepicker").blur(function()
{
    $regEx = /^(\d{4})\D?(0[1-9]|1[0-2])\D?([12]\d|0[1-9]|3[01])$/;
    $val = $(this).val();
    if($.trim($val) === '')
    {
       $(this).parent().parent().children(".dateError").slideUp("slow");
       $(this).parent().parent().children(".dateEmpty").slideDown("slow");
       $var = false;
    }
    else if(!$regEx.test($val))
    {
        $(this).parent().parent().children(".dateEmpty").slideUp("slow");
        $(this).parent().parent().children(".dateError").slideDown("slow");
       $var = false;
    }
    else
    {
        $(this).parent().parent().children(".dateError").slideUp("slow");
        $(this).parent().parent().children(".dateEmpty").slideUp("slow");
       $var = true;
    }
}
);
});

$(document).ready(function() {
$( ".datepicker" ).datepicker({
              showOn: 'button',
              buttonImage: '../img/icon_2.png',
              buttonImageOnly: true,
              dateFormat: 'yy-mm-dd'
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


                            