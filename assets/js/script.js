$(document).ready(function() {
    // Hide modal on click on close button - add event
    $("#closeModal").on("click", function () {
        // Fermeture de la pop-up
        $("#eventToAdd").hide();
        // Suppression de l'état orange sur les zones cliquées
        $( ".toPlan" ).removeClass("toPlan");
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
                },
                error: function() {
                    console.log("error !!!!!");
                }
            });
		}
	});
        
    // Gestion de l'update
    $(".scheduled > div").click(function () {
        // Récupération de la date courante
        var regExp = /[\d]*-[\d]*-[\d]*/g;
        var matches = regExp.exec(this.id);

        // Récupération de l'élément avec la classe à notre date
        var monRdv = $("." + matches[0]);
        console.log(monRdv);

        // Insertion des valeurs dans la modal
        $("#dateOfEvent").val("matches[0]");
        $("#descriptionOfEvent").val(monRdv[0].textContent.trim());
        $("#titleOfEvent").val(monRdv[0].title);
        // TODO
        $("#important").val("");
        // TODO
        $("#guest").val("");
        
    });
});
