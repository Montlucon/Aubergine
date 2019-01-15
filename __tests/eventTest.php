<?php

/*
 * Copyright 2008-2018 Anael Mobilia
 *
 * This file is part of image-heberg.fr.
 *
 * image-heberg.fr is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * image-heberg.fr is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with image-heberg.fr. If not, see <http://www.gnu.org/licenses/>
 */

use PHPUnit\Framework\TestCase;

class eventTest extends TestCase {

    /**
     * Fonction requise par l'extension Database
     * @return type
     */
    public function getConnection() {
        $pdo = new PDO('sqlite::memory:');
        return $this->createDefaultDBConnection($pdo, ':memory:');
    }

    /**
     * Fonction requise par l'extension Database
     * @return \PHPUnit_Extensions_Database_DataSet_DefaultDataSet
     */
    public function getDataSet() {
        return new PHPUnit_Extensions_Database_DataSet_DefaultDataSet();
    }

    /**
     * Vérification de la récupération des données d'un événement
     */
    public function testGetEvent() {
        require 'back/class/event.php';

        /** @var event $monEvent */
        $monEvent = event();
        $monEvent->get(1);

        /**
         * Vérification des valeurs
         */
        $this->assertEquals(1, $monEvent->getId(), "event->get() : Id");
        $this->assertEquals("0000-00-00", $monEvent->getDate(), "event->get() : Date");
        $this->assertEquals("DateBase", $monEvent->getTitle(), "event->get() : Title");
        $this->assertEquals("Import database", $monEvent->getDescription(), "event->get() : Description");
    }

}
