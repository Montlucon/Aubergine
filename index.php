<html>
<head>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!--<script type="text/javascript" src="./scripts/calendar.js"></script>-->
	
	<script src="./scripts/zabuto_calendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./styles/zabuto_calendar.min.css">


	<script type="text/javascript" src="./scripts/script.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="./styles/style.css">
	<!--<link rel="stylesheet" href="./styles/calendar.css">-->
	<title>Calendar - Aubergines</title>
</head>
<body>
	<section class="mainSection">
		<?php
			
		?>
		<h2>My calendar</h2>
		<p>Hi guys ! This is your dashboard. From this place, you will be able to check your weekly planning, add new events, and add people to your events ! <br>
			<b>Enjoy !</b>
		</p>
		<div id="my-calendar"><?php echo "<span class='dateSaved zabuto_calendar_10k_"+$result->getDate()+"_day'>Exposition - Grenoble - 16h</span>"?></div>
		<div class="eventToAdd">
			<form action="index.php" method="post">
				<input type="hidden" id="dateOfEvent" name="dateOfEvent"><br>
				<label for="titleOfEvent">Title of the event</label><br>
				<input type="text" id="titleOfEvent" name="titleOfEvent"><br><br>
				<label for="descriptionOfEvent">Description</label><br>
				<input type="text" id="descriptionOfEvent" name="descriptionOfEvent"><br><br>
				<label for="guestsOfEvent">Guests</label><br>
				<select id="guestsOfEvent" name="guestsOfEvent" multiple>
					<option id="Prenom1" value="Prenom1">Prenom1</option>
					<option id="Prenom2" value="Prenom2">Prenom2</option>
					<option id="Prenom3" value="Prenom3">Prenom3</option>
				</select><br>
				<label for="priorityOfEvent">Priority</label><br>
				<input type="number" id="priorityOfEvent" name="priorityOfEvent" min="1" max="3"><br><br>
				<input type="submit">
			</form>
		</div>
	</section>
</body>
</html>