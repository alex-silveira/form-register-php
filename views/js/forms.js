$(function() {
   
   $("#main").load("http://hero.com.br:82/views/formRegister.html");
   
   $(document).on("click","#forgotPassword",function(){
		$("#main").load("http://hero.com.br:82/views/formforgotPassword.html");
   });
   
   $(document).on("click","#forgotUser",function(){
		$("#main").load("http://hero.com.br:82/views/formforgotPassword.html");
   });
   
   $(document).on("click","#back",function(){
		$("#main").load("http://hero.com.br:82/views/formRegister.html");
   });

  if($(".alert").length){
      $(".alert").fadeOut(5500);
  }


});