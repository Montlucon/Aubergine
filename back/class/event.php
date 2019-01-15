<?php

/**
 * Event management
 *
 * @author Romain
 */
require_once __DIR__ . '/maBDD.php';

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

    public function getEventsMonth() {
        // Je vais chercher les infos en BDD
        $req = maBDD::getInstance()->prepare("SELECT * FROM `events` WHERE Date < "2019-02-15" ");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch();
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
                                              ('Date', 'Title', 'Description', 'IsImportant') WHERE ");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
    }
}
