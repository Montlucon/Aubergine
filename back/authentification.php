<?php

/**
 * BACK - Manage user authentication
 */

require_once('class/user.php');

if (sizeof($_POST) != 0) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $myUser = new user();
        $testConnexion = $myUser->checkCredentials($_POST["username"], $_POST["password"]);

        $myReturn = [];

        if ($testConnexion) {
            // Connexion OK
            $myReturn['status'] = true;
            $myReturn['message'] = "Connexion OK !";
            
            // Session launch
            session_start();
            $_SESSION["connected"] = true;
        } else {
            // Connexion KO
            $myReturn['status'] = false;
            $myReturn['message'] = "Connexion failed ! Check your credentials !";
        }
        
        echo json_encode($myReturn);
    }
}