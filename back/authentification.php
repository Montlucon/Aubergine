<?php

require_once('./class/user.php');

if (sizeof($_POST) != 0) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $monUtilisateur = new user();
        $testConnexion = $monUtilisateur->verifierConnexion($_POST["username"], $_POST["password"]);

        $monRetour = [];

        if ($testConnexion) {
            // Connexion OK
            $monRetour['statut'] = true;
            $monRetour['message'] = "Connexion OK !";
            
            // Lancement de la session
            session_start();
            $_SESSION["connected"] = true;
        } else {
            // Connexion KO
            $monRetour['statut'] = false;
            $monRetour['message'] = "Connexion échouée ! Vérifiez vos identifiants !";
        }
        
        echo json_encode($monRetour);
    }
}