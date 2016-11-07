$val = false;

$("#user").blur(function()
{
   $user = $("#user").val();
   if($.trim($user) === '')
   {
       $("#userEmpty").slideDown();
       $val = false;
   }
   else
   {
       $("#userEmpty").slideUp();
       $val = true;
   }
});

$("#pass").blur(function()
{
   $pass = $("#pass").val();
   if($.trim($pass) === '')
   {
       $("#passEmpty").slideDown();
       $val = false;
   }
   else
   {
       $("#passEmpty").slideUp();
       $val = true;
   }
});

$("#form").submit(function()
{
   $("#form").find('input').each(function()
   {
       $(this).trigger('blur');
   });
   
   if($var)
   {
       $("#form").submit();
   }
   else
   {
       return false;
   }
});


