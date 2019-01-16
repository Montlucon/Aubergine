<?php

require_once __DIR__ . '/class/maBDD.php';

/**
 * User registration management
 */
    // If GET event
    if(isset($_POST['function']) && $_POST['function'] == 'read'){
    	
    }
 	// If ADD event
    if(isset($_POST['function']) && $_POST['function'] == 'create'){
            if (isset($_POST["name"]) && isset($_POST["note"]) && isset($_POST["user"]) && isset($_POST["idevent"])) {
        
                $user = new user();
                $user->GetIdByUsername($_POST["user"]);

                $note = new Notes();
                $note->addNote($_POST["name"], $_POST["content"], $_POST["idevent"], $user);

            }
    }
    
	// IF UPDATE event
	else if (isset($_POST['function']) && $_POST['function'] == 'update') {
		
	}
	// IF DELETE event
	else if (isset($_POST['function']) && $_POST['function'] == 'delete') {
		
    }
?>
