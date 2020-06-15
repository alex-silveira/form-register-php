$(function() {


    var page = GetParameterValues('page');

    if(page == 2){
        $("#main").load("http://hero.com.br:82/views/formforgotPassword.html");
    }
    else if(page == 3){
        $("#main").load("http://hero.com.br:82/views/formforgotUser.html");
    }
    else{
        $("#main").load("http://hero.com.br:82/views/formRegister.php");
    }

   
   $(document).on("click","#forgotPassword",function(){
		$("#main").load("http://hero.com.br:82/views/formforgotPassword.html");
   });
   
   $(document).on("click","#forgotUser",function(){
		$("#main").load("http://hero.com.br:82/views/formforgotUser.html");
   });
   
   $(document).on("click","#back",function(){
		$("#main").load("http://hero.com.br:82/views/formRegister.html");
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

