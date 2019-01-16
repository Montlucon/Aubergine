$(document).ready(function() {
    var name = $("#name");
    var note = $("#note");
    var user = $("#user");
    var idevent = $("#idevent");


    // Register button click event handler
    $("#save_btn").click(function() {

        if(VerifyInformations(note, user)){
            // Create user AJAX call
            $.ajax({
                type: "POST",
                url: 'back/note.php',
                data: ({
                name : name.val(),
                note : note.val(),
                user : user.val(),
                idevent : idevent.val()
                }),
                dataType: "html",
                success: function(data) {
                    if(data == 1){
                        // Redirect to login page
                        window.location = "index.php";
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
