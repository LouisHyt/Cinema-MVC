<?php

    namespace Model\Manager;
    use Model\Connect;

    class PersonManager {

        public function getPersonById(int $id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("SELECT CONCAT(first_name,' ',last_name) as full_name, birth_date, genre, profile_url, bio, death_date FROM person WHERE id_person = :id");
            $request->execute(["id" => $id]);
            $person = $request->fetch();
            return $person;
        }

        public function getActors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT CONCAT(first_name, ' ', last_name) as full_name, birth_date, genre, profile_url, bio, death_date
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person 
            ");
            $persons = $request->fetchAll();
            return $persons;
        }

        public function getDirectors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT CONCAT(first_name, ' ', last_name) as full_name, birth_date, genre, profile_url, bio, death_date
                FROM person
                INNER JOIN director ON person.id_person = director.id_person 
            ");
            $persons = $request->fetchAll();
            return $persons;
        }

    }