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
		
	}
	// IF DELETE event
	else if (isset($_POST['function']) && $_POST['function'] == 'delete') {
		
	}

?>