<?php
require_once __DIR__ . '/class/event.php';
/*
 * Handle POST requests for the events
 */

	// If GET event
    if(isset($_POST['function']) && $_POST['function'] == 'read'){
    	
    }
	// If ADD event
    else if(isset($_POST['function']) && $_POST['function'] == 'create'){
    	if (isset($_POST["date"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["important"])){
	        // do post insert
	        $event = new Event();
	        $event->addEvent($_POST["title"], $_POST["description"], $_POST["date"], $_POST["important"]);
	    }
	}
	// IF UPDATE event
	else if (isset($_POST['function']) && $_POST['function'] == 'update') {
            if (isset($_POST["date"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["important"])){
			// do post update
	        $event = new Event();
			$event->updateEvent($_POST["id"], $_POST["title"], $_POST["description"], $_POST["date"], $_POST["important"]);
	    }
	}
	// IF DELETE event
	else if (isset($_POST['function']) && $_POST['function'] == 'delete') {
		if (isset($_POST["id"])) {
			$event = new Event();
			$event->DeleteEvent($_POST["id"]);
		}
	}
    // IF GET event by id JSON
    else if (isset($_GET["id"])){
        $event = new Event();
        $event->get($_GET["id"]);
        echo json_encode($event);
    }

?>