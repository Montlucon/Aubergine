$(document).ready(function(){
	$("#login").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		// Checking for blank fields.
		if( username == '' || password == ''){
			$('input[type="text"],input[type="password"]').css("border","2px solid red");
			$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
			alert("Please fill all fields...!!!!!!");
		} else {
			$.post("back/authentification.php", { username: username, password: password }, function(data) {
				if(data == true){
					$("form")[0].reset();
					$('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
					alert(data);
				} else {
					$('input[type="text"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
					$('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
					alert(data);
				}
			});
		}
	});
});