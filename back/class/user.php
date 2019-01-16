<?php

/**
 * User management
 *
 * @author Anael
 */
require_once __DIR__ . '/maBDD.php';

class user {

    private $id;
    private $username;
    private $password;

    /**
     * Check user credentials
     * @param string $login
     * @param string $password
     * @return boolean login is success ?
     */
    public function checkCredentials($login, $password) {
        // Check credentials
        $req = maBDD::getInstance()->prepare("SELECT * FROM users WHERE Username = :login AND Password = :password");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();

        // Fetch datas
        $retour = $req->fetch();
        // FALSE or datas => TRUE due to PHP :-)

        return $retour;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getUsername() {
        return $this->username;
    }

    function setUSername($username) {
        $this->username = $username;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function getUsers() {
        $req = maBDD::getInstance()->prepare("SELECT Id, Username FROM users");
        $req->execute();

        $retour = new ArrayObject();
        // Pour chaque résultat retourné
        foreach ($req->fetchAll() as $value) {
            $user = new user();
            $user->setId($value->Id);
            $user->setUSername($value->Username);
           // J'ajoute le nom de l'image
           $retour->append($user);
        }

        return $retour;
    }

    public function getIdByUsername($iduser){
        $req = maBDD::getInstance()->prepare("SELECT Id FROM users WHERE Username = :login");
        $req->bindValue(':login', $iduser, PDO::PARAM_STR);
        $req->execute();
        $retour = $req->fetch();

        return $retour;
    }

}
