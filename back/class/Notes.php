<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 15/01/2019
 * Time: 14:38
 */
require_once __DIR__ . '/maBDD.php';

class Notes
{
    private $id;
    private $name;
    private $content;
    private $idEvent;
    private $idUser;

    /**
     * Get event by ID
     * @param int $id
     */
    public function get($id) {
        // Je vais chercher les infos en BDD
        $req = maBDD::getInstance()->prepare("SELECT * FROM notes WHERE Id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        // J'éclate les informations
        $resultat = $req->fetch();
        if ($resultat !== FALSE) {
            $this->setId($resultat->Id);
            $this->setName($resultat->Name);
            $this->setContent($resultat->Content);
            $this->setIdEvent($resultat->Id_event);
            $this->setIdUser($resultat->Id_user);
        }
    }

    /**
     * Create a note link to an Id_User and a Id_Event
     * @param $name
     * @param $content
     * @param $idEvent
     * @param $idUser
     */
    public function addNote($name, $content, $idEvent, $idUser) {
        $req = maBDD::getInstance()->prepare("INSERT INTO notes(Name, Content, Id_event, Id_user) VALUES 
                                              (:Name, :Content, :Id_event, :Id_user)");
        $req->bindValue(':Name', $name, PDO::PARAM_STR);
        $req->bindValue(':Content', $content, PDO::PARAM_STR);
        $req->bindValue(':Id_event', $idEvent, PDO::PARAM_INT);
        $req->bindValue(':Id_user', $idUser, PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Update a Note with new data where Id = $id
     * @param $id
     * @param $name
     * @param $content
     * @param $idEvent
     * @param $idUser
     */
    public function updateNote($id, $name, $content, $idEvent, $idUser) {
        $req = maBDD::getInstance()->prepare("UPDATE notes SET Name = :Name AND Content = :Content
                          AND Id_event = :Id_event AND Id_user = :Id_user WHERE Id = :Id");
        $req->bindValue(':Id', $id, PDO::PARAM_INT);
        $req->bindValue(':Name', $name, PDO::PARAM_STR);
        $req->bindValue(':Content', $content, PDO::PARAM_STR);
        $req->bindValue(':Id_event', $idEvent, PDO::PARAM_INT);
        $req->bindValue(':Id_user', $idUser, PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Delete the note by is Id
     * @param $id
     */
    public function deleteNote($id) {
        $req = maBDD::getInstance()->prepare("DELETE FROM notes WHERE Id = :Id");
        $req->bindValue(':Id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * @param mixed $idEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

}