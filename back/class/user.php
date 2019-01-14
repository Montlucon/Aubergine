<?php

/**
 * Utilisateur
 *
 * @author Anael
 */
require_once 'maBDD.php';

class user {

    /**
     * Vérifie les identifiants de l'utilisateur
     * @param string $login
     * @param string $password
     * @return boolean connexion réussie ?
     */
    public function verifierConnexion($login, $password) {
        // Vérification des identifiants fournis
        $req = maBDD::getInstance()->prepare("SELECT * FROM users WHERE Email = :login AND Password = :password");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();

        // Récupération des datas
        $retour = $req->fetch();
        // FALSE ou datas => TRUE grâce à PHP :-)

        return $retour;
    }

}
