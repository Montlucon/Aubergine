<?php

require_once('./class/user.php');

if (sizeof($_POST) != 0) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $monUtilisateur = new user();
        $testConnexion = $monUtilisateur->verifierConnexion($_POST["username"], $_POST["password"]);

        if ($testConnexion) {
            echo "connexion ok";
        } else {
            echo "connexion ko";
        }
    }
}