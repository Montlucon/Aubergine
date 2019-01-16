$(document).ready(function() {
    var username = $("#username");
    var password = $("#password");
    var repassword = $("#password_confirm");

    // Register button click event handler
    $("#register_btn").click(function() {

        if(VerifyInformations(username, password, repassword)){
            // Create user AJAX call
            $.ajax({
                type: "POST",
                url: 'back/register.php',
                data: ({
                username : username.val(),
                password : password.val()
                }),
                dataType: "html",
                success: function(data) {
                    if(data == 1){
                        // Redirect to login page
                        window.location = "login.php";
                    }
                    else{
                        // Error, display red errors
                        VerifyInformations();
                    }
                },
                error: function() {
                    console.log("error !!!!!");
                }
            });
        }
    });

    function VerifyInformations(){

        var result = true;
        username.css("background-color", "white");
        password.css("background-color", "white");
        repassword.css("background-color", "white");
    
        if(username.val() == ""){
            username.css("background-color", "red");
            result = false;
        }
    
        if(password.val() == "" || password.val() != repassword.val()){
            password.css("background-color", "red");
            repassword.css("background-color", "red");
            result = false;
        }
    
        return result;
    }
});
