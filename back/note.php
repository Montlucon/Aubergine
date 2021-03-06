<?php
session_start();
require_once __DIR__ . '/class/Notes.php';
require_once __DIR__ . '/class/user.php';


/*
 * Handle POST requests for the notes
 */

    // If GET note
    if(isset($_POST['function']) && $_POST['function'] == 'read'){
    	
    }

 	// If ADD note
    if(isset($_POST['function']) && $_POST['function'] == 'create'){
            if (isset($_POST["name"]) && isset($_POST["content"]) && isset($_POST["idEvent"])) {

                $user = new user();
                $user->setId($user->GetIdByUsername($_SESSION["username"]));

                $note = new Notes();
                $note->addNote($_POST["name"], $_POST["content"], $_POST["idEvent"], $user);
            }
    }
    
	// IF UPDATE note
	else if (isset($_POST['function']) && $_POST['function'] == 'update') {
        if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["note"]) && isset($_POST["idEvent"])) {
        
            $user = new user();
            $user->setId($user->GetIdByUsername($_SESSION["username"]));

            $note = new Notes();
            $note->updateNote($_POST["id"], $_POST["name"], $_POST["content"], $_POST["idEvent"], $user);
        }
		
	}
	// IF DELETE note
	else if (isset($_POST['function']) && $_POST['function'] == 'delete') {
        if (isset($_POST["id"])){
            $note = new Notes();
            $note->deleteNote($_POST["id"]);
        }
	}
?>
