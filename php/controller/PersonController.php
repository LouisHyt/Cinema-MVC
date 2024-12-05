<?php

    namespace Controller;
    use Model\Manager\PersonManager;

    class PersonController {
        
        public function listActors() {
            $personManager = new PersonManager();
            $persons = $personManager->getActors();
            require "view/listPersons.php";
        }

        public function listDirectors() {
            $personManager = new PersonManager();
            $persons = $personManager->getDirectors();
            require "view/listPersons.php";
        }

        public function detailsPerson(int $id) {
            $personManager = new PersonManager();
            $personDetails = $personManager->getPersonById($id);
            require "view/detailsPerson.php";
        }
    }