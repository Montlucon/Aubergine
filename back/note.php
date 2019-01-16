<?php

require_once __DIR__ . '/class/maBDD.php';

/**
 * User registration management
 */
if (sizeof($_POST) != 0) {
    if (isset($_POST["name"]) && isset($_POST["note"]) && isset($_POST["user"]) && isset($_POST["idevent"])) {

        // Select id from user in database
        $req = maBDD::getInstance()->prepare("SELECT id FROM users WHERE Username = :login");
        $req->bindValue(':login', $_POST["user"], PDO::PARAM_STR);
        $req->execute();
        $id_user = $req->fetch();

        // Insert user in database
        $req = maBDD::getInstance()->prepare("INSERT INTO notes (Name, Content, Id_event, Id_user) VALUES (:name, :Content, :Id_event, :Id_user)");
        $req->bindValue(':name', $_POST["name"], PDO::PARAM_STR);
        $req->bindValue(':Content', $_POST["note"], PDO::PARAM_STR);
        $req->bindValue(':Id_event', $_POST["idevent"], PDO::PARAM_STR);
        $req->bindValue(':Id_user', $id_user, PDO::PARAM_STR);
        $req->execute();

        echo true;
    }
}

echo false;

?>
