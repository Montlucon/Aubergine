<?php

/**
 * Utilisateur
 *
 * @author Anael
 */
class user {

    /**
     * Vérifie les identifiants de l'utilisateur
     * @param string $login
     * @param string $password
     * @return boolean connexion réussie ?
     */
    public function verifierConnexion($login, $password) {
        $retour = false;

        // Vérification des identifiants fournis
        if ($login === "test" && $password == "test") {
            // Connexion OK
            $retour = true;
        }

        return $retour;
    }

}
