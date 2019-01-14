$(document).ready(function() {

    $("#register_btn").click(function() {
        var username = $("#username");
        var password = $("#password");
        var repassword = $("#password_confirm");

        username.css("background-color", "white");
        password.css("background-color", "white");
        repassword.css("background-color", "white");
    
        if(username.val() == ""){
            username.css("background-color", "red");
        }
        else if(password.val() == ""){
            password.css("background-color", "red");
        }
        else if(repassword.val() == ""){
            repassword.css("background-color", "red");
        }
        else{
            // POST
            
        }
    });






});
