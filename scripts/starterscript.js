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
            url: "functioning/actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" +$("#password").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result){
               if(result == "1"){
                   window.location.assign("http://outlookboard.atwebpages.com/");
               } else {
                   
                   $("#loginAlert").html(result).show();
               }
            }
            
        });
        
       
    });
       $("#imagesad").on('change',function(){
          var filename = $(this).val();
          $(".custom-file-label").html(filename);
          
      });
            //option A
    

        $(".imagea").click(function(){
        var thisar = $(this);
    
        $.ajax({
            type: "POST",
            url: "../functioning/actions.php?action=voting",
            data: "imagename=" + $(this).attr("name") + "&userid=" + $(this).attr("userid"),
            success: function(result){
            if(result=="1"){
                            thisar.append("<i class='fa fa-heart ' aria-hidden='true'></i>");
            }else {
             alert(result);
            }
            
            }
            
        });
        
       
    });
     