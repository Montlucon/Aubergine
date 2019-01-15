<?php

require_once __DIR__ . '/class/maBDD.php';

/**
 * User registration management
 */
if (sizeof($_POST) != 0) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Insert user in database
        $req = maBDD::getInstance()->prepare("INSERT INTO users (Username, Password) VALUES (:username, :password)");
        $req->bindValue(':username', $_POST["username"], PDO::PARAM_STR);
        $req->bindValue(':password', $_POST["password"], PDO::PARAM_STR);
        $req->execute();

        echo true;
    }
}

echo false;

?>
