  $("#Signup").click(function(){
       
       if($("#loginActive").val() == 1) {
            $("#loginActive").val("0");
            $(this).html("Login");
            $("#loginbutton").html("Sign Up");
            $("#donthave").html("Already Have an Account?");
       } else {
            $("#loginActive").val("1");
            $(this).html("Sign Up");
            $("#loginbutton").html("Login");
            $("#donthave").html("Don't Have an Account?");
       }
       
        
        });

  $("#loginbutton").click(function(){
    
        $.ajax({
            type: "POST",
            url: "../functioning/actions.php?action=loginSignup2",
            data: "email=" + $("#email").val() + "&password=" +$("#password").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result){
               if(result == "1"){
                   window.location.assign("http://outlookboard.atwebpages.com/admin");
               } else {
                   
                   $("#loginAlert").html(result).show();
               }
            }
            
        });
        
       
    });
   
      