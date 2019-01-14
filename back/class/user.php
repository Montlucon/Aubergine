<?php

/**
 * User management
 *
 * @author Anael
 */
require_once 'maBDD.php';

class user {

    /**
     * Check user credentials
     * @param string $login
     * @param string $password
     * @return boolean login is success ?
     */
    public function checkCredentials($login, $password) {
        // Check credentials
        $req = maBDD::getInstance()->prepare("SELECT * FROM users WHERE Email = :login AND Password = :password");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();

        // Fetch datas
        $retour = $req->fetch();
        // FALSE or datas => TRUE due to PHP :-)

        return $retour;
    }

}
