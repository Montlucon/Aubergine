$(document).ready(function() {
	$(".EventToAdd").hide();
	$("#my-calendar").zabuto_calendar({language: "en"});

	$(".zabuto_calendar .calendar-dow td").on("click", function(){
		// alert($(this).attr("id"));
		$(this).addClass("toPlan");
		$(".eventToAdd").show().find("#dateOfEvent").attr("val", $(this).attr("id"));
	})

	$(".eventToAdd").on("submit", function(){
		$(".eventToAdd").hide();
	});


	$(".zabuto_calendar").find(".calendar-dow").eq("2").find("td").eq("2").addClass("scheduled");

	var currentPrint = $( "div[id^='zabuto_calendar_']" ).first().attr("id").split("zabuto_calendar_")[1];
console.log(currentPrint);

	$(".dateSaved").each(function(){
		var dateSaved = $(this).attr("class").split("zabuto_calendar_10k_")[1].split("_day")[0];
console.log(dateSaved);
		
		$("#zabuto_calendar_"+currentPrint+"_"+dateSaved+"_day").parent().addClass("scheduled");
console.log("#zabuto_calendar_"+currentPrint+"_"+dateSaved+"_day");
	})


});