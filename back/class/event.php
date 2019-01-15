<?php

/**
 * Event management
 *
 * @author Romain
 */
require_once 'maBDD.php';

class event {

    private $id;
    private $beginDate;
    private $endDate;
    private $title;
    private $description;
    private $isImportante;

    /**
     * Get event by ID
     * @param int $id
     * @return event Event
     */
    public function get($id) {
        
    }

    function getId() {
        return $this->id;
    }

    function getBeginDate() {
        return $this->beginDate;
    }

    function getEndDate() {
        return $this->endDate;
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

    function setBeginDate($beginDate) {
        $this->beginDate = $beginDate;
    }

    function setEndDate($endDate) {
        $this->endDate = $endDate;
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

}
