<?php

/**
 * Gestion de l'inscription des utilisateurs
 */
if (sizeof($_POST) != 0) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Do insert here
        echo true;
    }
}

echo false;

?>
