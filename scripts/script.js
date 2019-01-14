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



});