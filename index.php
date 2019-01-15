<?php
session_start();
if(!isset($_SESSION["connected"])) {
 	header("location:login.html");
}
?>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!--<script type="text/javascript" src="./scripts/calendar.js"></script>-->
	
	<script src="./assets/js/zabuto_calendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/zabuto_calendar.min.css">

	<script type="text/javascript" src="./assets/js/script.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/style.css">
	<!--<link rel="stylesheet" href="./styles/calendar.css">-->
	<title>Calendar - Aubergines</title>
</head>
<body>
	<section class="mainSection">
		
		<h2>My calendar</h2>
		<p>Hi guys ! This is your dashboard. From this place, you will be able to check your weekly planning, add new events, and add people to your events ! <br>
			<b>Enjoy !</b>
		</p>
		<div id="my-calendar"></div>
		<?php 
			require('back/class/event.php');
			$datas = new event();

			foreach ($datas->getAllEvents() as $unEvent) {
                    echo ' <span id="' . $unEvent->getId() . '" class="dateSaved ' . $unEvent->getdate() . '" style="display: none" title="' . $unEvent->getTitle() . '" isImportant="' . $unEvent->getIsImportante() . '">
						' . $unEvent->getDescription() . '
				   </span>';
                }
                ?>
                <div class="modal" id="eventToAdd" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="dateOfEvent" name="dateOfEvent"><br>
                                <label for="titleOfEvent">Title of the event</label><br>
                                <input type="text" id="titleOfEvent" name="titleOfEvent"><br><br>
                                <label for="descriptionOfEvent">Description</label><br>
                                <input type="text" id="descriptionOfEvent" name="descriptionOfEvent"><br><br>
								<label for="guestsOfEvent">Guests</label><br>
								<select id="guestsOfEvent" name="guestsOfEvent" multiple>
									<?php 
									require('back/class/user.php');
									$datas = new user();

									foreach ($datas->getUsers() as $user){
									echo ' <option id="'. $user->getId().'">
												' .$user->getUsername().'
										</option>';
									}
									?>
								</select><br><br>	
                                <label for="important">Is important</label>
                                <input type="checkbox" id="important" name="important"><br><br>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" id="add_event_btn">Delete</button>
                                <button class="btn btn-success" id="add_event_btn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
	</section>
</body>
</html>