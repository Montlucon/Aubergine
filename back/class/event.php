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

    public function getAllEvents() {
        // Je vais chercher les infos en BDD
        $req = maBDD::getInstance()->prepare("SELECT * FROM `events`");
        $req->execute();
        
        $retour = new ArrayObject();
        // Pour chaque résultat retourné
        foreach ($req->fetchAll() as $value) {
            $monEvent = new event();
            $monEvent->setId($value->Id);
            $monEvent->setDate($value->Date);
            $monEvent->setTitle($value->Title);
            $monEvent->setDescription($value->Description);
            $monEvent->setIsImportante($value->isImportant);

           // J'ajoute le nom de l'image
           $retour->append($monEvent);
        }
        
        return $retour;
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
        
        $req = maBDD::getInstance()->prepare("INSERT INTO events(Date, Title, Description, IsImportant) VALUES 
                                              (:Date, :Title, :Description, :IsImportant)");
        $req->bindValue(':Date', $date, PDO::PARAM_STR);
        $req->bindValue(':Title', $title, PDO::PARAM_STR);
        $req->bindValue(':Description', $description, PDO::PARAM_STR);
        $req->bindValue(':IsImportant', $isImportante, PDO::PARAM_STR);
        $req->execute();
    }

    public function updateEvent($id, $title, $description, $date, $isImportante) {
        
        $req = maBDD::getInstance()->prepare("UPDATE events
                                              SET Date = :Date AND Title = :Title AND Description = :Description AND IsImportant = :IsImportant
                                              WHERE Id = :Id");
        $req->bindValue(':Id', $id, PDO::PARAM_STR);
        $req->bindValue(':Date', $date, PDO::PARAM_STR);
        $req->bindValue(':Title', $title, PDO::PARAM_STR);
        $req->bindValue(':Description', $description, PDO::PARAM_STR);
        $req->bindValue(':IsImportant', $isImportante, PDO::PARAM_STR);
        $req->execute();
    }

    public function DeleteEvent($id) {
        
        $req = maBDD::getInstance()->prepare("DELETE events 
                                              WHERE Id = :id");
        $req->bindValue(':Id', $id, PDO::PARAM_STR);
        $req->execute();
    }
    
}