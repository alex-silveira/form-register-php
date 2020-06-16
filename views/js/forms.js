$(function() {


    var page = GetParameterValues('page');

    if(page == 2){
        $("#main").load("http://hero.com.br:82/views/formforgotPassword.php");
    }
    else if(page == 3){
        $("#main").load("http://hero.com.br:82/views/formforgotUser.php");
    }
    else if(page == 4){
        //$("#main").load("http://hero.com.br:82/views/formResetPassword.php");
    }
    else{
        $("#main").load("http://hero.com.br:82/views/formRegister.php");
    }

   
   $(document).on("click","#forgotPassword",function(){
		$("#main").load("http://hero.com.br:82/views/formforgotPassword.php");
   });
   
   $(document).on("click","#forgotUser",function(){
		$("#main").load("http://hero.com.br:82/views/formforgotUser.php");
   });
   
   $(document).on("click","#back",function(){
		$("#main").load("http://hero.com.br:82/views/formRegister.php");
   });

  if($(".alert").length){
     // $(".alert").fadeOut(5500);
  }

    function GetParameterValues(param) {
        var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < url.length; i++) {
            var urlparam = url[i].split('=');
            if (urlparam[0] == param) {
                return urlparam[1];
            }
        }
    }

});

