<?php

/**
 * Event management
 *
 * @author Romain
 */
require_once 'back/class/maBDD.php';

class event {

    private $id;
    private $date;
    private $title;
    private $description;
    private $isImportante;

    /**
     * Get event by ID
     * @param int $id
     * @return event Event
     */
    public function get($id) {
        // Je vais chercher les infos en BDD
        $req = maBDD::getInstance()->prepare("SELECT * FROM events WHERE Id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        // J'éclate les informations
        $resultat = $req->fetch();
        if ($resultat !== FALSE) {
            $this->setId($resultat->Id);
            $this->setDate($resultat->Date);
            $this->setTitle($resultat->Title);
            $this->setDescription($resultat->Description);
            $this->setIsImportante($resultat->isImportant);
        }
    }

    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getIsImportante() {
        return $this->isImportante;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setIsImportante($isImportante) {
        $this->isImportante = $isImportante;
    }


    public function addEvent($title, $description, $date, $isImportante) {
        
        $req = maBDD::getInstance()->prepare("INSERT INTO events('Date', 'Title', 'Description', 'IsImportant') VALUES 
                                              (:Date, :Title, :Description, :IsImportant)");
        $req->bindValue(':Date', $date, PDO::PARAM_STR);
        $req->bindValue(':Title', $title, PDO::PARAM_STR);
        $req->bindValue(':Description', $description, PDO::PARAM_STR);
        $req->bindValue(':IsImportant', $isImportante, PDO::PARAM_STR);
        $req->execute();
    }

    
}
function test($title, $description, $date, $isImportante) {
        
    $req = maBDD::getInstance()->prepare("INSERT INTO events('Date', 'Title', 'Description', 'IsImportant') VALUES 
                                          (:Date, :Title, :Description, :IsImportant)");
    $req->bindValue(':Date', $date, PDO::PARAM_STR);
    $req->bindValue(':Title', $title, PDO::PARAM_STR);
    $req->bindValue(':Description', $description, PDO::PARAM_STR);
    $req->bindValue(':IsImportant', $isImportante, PDO::PARAM_STR);
    $req->execute();
}
test("titre au pif", "description aleatoire", "2019-01-15", 1);