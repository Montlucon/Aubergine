$(document).ready(function() {
    // Hide modal on click on close button - add event
    $("#closeModal").on("click", function () {
        // Fermeture de la pop-up
        $("#eventToAdd").hide();
        // Suppression de l'état orange sur les zones cliquées
        $(".toPlan").removeClass("toPlan");
        // Vidage modal
        $("#dateOfEvent").val("");
        $("#titleOfEvent").val("");
        $("#descriptionOfEvent").val("");
        $("#important").prop('checked', false);
    });

    // Hide modal on click on close button - add note
    $("#closeNoteodal").on("click", function () {
        // Fermeture de la pop-up
        $("#addNoteToEvent").hide();
        // Vidage modal
        $("#idEvent").val("");
        $("#idUser").val("");
        $("#name").val("");
        $("#content").val("");
    });
    
	$("#eventToAdd").hide();
	$("#my-calendar").zabuto_calendar({language: "en"});

	$(".zabuto_calendar .calendar-dow td").on("click", function(){
		// alert($(this).attr("id"));
		$(this).addClass("toPlan");
		$("#eventToAdd").show().find("#dateOfEvent").attr("val", $(this).attr("id"));
	});

	$("#eventToAdd").on("submit", function(){
		$("#eventToAdd").hide();
                // Affichage du bouton sauver & masquage du bouton update
                
	});

	var currentPrint = $( "div[id^='zabuto_calendar_']" ).first().attr("id").split("zabuto_calendar_")[1];

	$(".dateSaved").each(function(){
		var dateSaved = $(this).attr("class").split(" ")[1].split("_day")[0];
		
		$("#zabuto_calendar_"+currentPrint+"_"+dateSaved).addClass("scheduled");
	});

	// Button click to add an event
	$("#add_event_btn").click(function() {
		var date = $("#dateOfEvent");
		var title = $("#titleOfEvent");
		var description = $("#descriptionOfEvent");

		if(date.attr("val") != "" && title.val() != "" && description.val() != ""){
			// Format date
			var dateValue = date.attr("val");
			dateValue = dateValue.substr(dateValue.lastIndexOf("_") + 1);

			$.ajax({
                type: "POST",
                url: 'back/eventAPI.php',
                data: ({
                	function: 'create',
					date : dateValue,
					title : title.val(),
					description : description.val(),
					important : $("#important").is(":checked") ? 1 : 0
                }),
                dataType: "html",
                success: function(data) {
                    // Dismiss modal
                    $("#eventToAdd").hide();
                    // reload page
                    location.reload();
                    // Vidage modal
                    $("#dateOfEvent").val("");
                    $("#titleOfEvent").val("");
                    $("#descriptionOfEvent").val("");
                },
                error: function() {
                    console.log("error !!!!!");
                }
            });
		}
	});

	$("td > div").click(function() {
	    $("#addNote").hide();
	    $("#removeNote").hide();
    });
        
    // Gestion du réaffichage d'un événement
    $(".scheduled > div").click(function () {
        $("#addNote").show();
        $("#removeNote").show();
        // Récupération de la date courante
        var regExp = /[\d]*-[\d]*-[\d]*/g;
        var matches = regExp.exec(this.id);

        // Récupération de l'élément avec la classe à notre date
        var monRdv = $("." + matches[0]);

        // Insertion des valeurs dans la modal
        $("#dateOfEvent").val("matches[0]");
        $("#descriptionOfEvent").val(monRdv[0].textContent.trim());
        $("#titleOfEvent").val(monRdv[0].title);
        $("#important").prop('checked', $(monRdv[0]).attr("isImportant") == 1);
        $("#idOfEvent").val(monRdv[0].id);
        // TODO
        $("#guest").val("");
        
    });


    $("#addNote").on("click", function() {
        $("#addNoteToEvent").show();
    });

	// Button click to delete an event
	$("#delete_event_btn").click(function() {
			$.ajax({
                type: "POST",
                url: 'back/eventAPI.php',
                data: ({
					function: 'delete',
					id: $("#idOfEvent").val(),
                }),
                dataType: "html",
                success: function(data) {
					// display data
					console.log(data);
                },
                error: function() {
                    console.log("error !!!!!");
                }
            });
	});

    // Button click to add a note
    $("#add_note_btn").click(function() {
        $.ajax({
            type: "POST",
            url: 'back/note.php',
            data: ({
                function: 'create',
                title: $("#title").val(),
                content: $("#content").val(),
                idEvent: $("#idOfEvent").val()
            }),
            dataType: "html",
            success: function(data) {
                // display data
                console.log(data);
            },
            error: function() {
                console.log("error !!!!!");
            }
        });
    });

    // Button click to update a note
    $("#save_note_btn").click(function() {
        $.ajax({
            type: "POST",
            url: 'back/note.php',
            data: ({
                function: 'update',
                id: $("#idOfNote").val(),
                title: $("#title").val(),
                content: $("#content").val(),
                idEvent: $("#idOfEvent").val()
            }),
            dataType: "html",
            success: function(data) {
                // display data
                console.log(data);
            },
            error: function() {
                console.log("error !!!!!");
            }
        });
    });

    // Button click to delete a note
    $("#removeNote").click(function() {
        $.ajax({
            type: "POST",
            url: 'back/note.php',
            data: ({
                function: 'delete',
                id: $("#idOfNote").val()
            }),
            dataType: "html",
            success: function(data) {
                // display data
                console.log(data);
            },
            error: function() {
                console.log("error !!!!!");
            }
        });
    });
});
