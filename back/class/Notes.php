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
     * @return event Event
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