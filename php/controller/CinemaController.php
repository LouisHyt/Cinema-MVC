<?php

    namespace Controller;
    use Model\Connect;

    class CinemaController {

        public function listMovies() {
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT mo.title, mo.release_date, mo.duration, mo.synopsis, mo.note, mo.poster_image, CONCAT(pe.first_name, ' ', pe.last_name) as full_name
                FROM movie mo
                INNER JOIN director di ON mo.id_director = di.id_director 
                INNER JOIN person pe ON di.id_person = pe.id_person
            ");
            $movies = $request->fetchAll();
            require "view/listMovies.php";
        }

        public function detailsMovie(int $id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->query("SELECT title, release_date FROM movie");
            $movies = $request->fetchAll();
            require "view/detailsMovie.php";
        }

        public function detailsPerson(int $id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("SELECT CONCAT(first_name,' ',last_name), birth_date, genre, profile_url, bio, death_date FROM person WHERE id_person = :id");
            $request->execute(["id" => $id]);
            $person = $request->fetch();
            require "view/detailsPerson.php";
        }

        public function listActors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT CONCAT(first_name, ' ', last_name) as full_name, birth_date, genre, profile_url, bio, death_date
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person 
            ");
            $persons = $request->fetchAll();
            require("view/listPersons.php");
        }

        public function listDirectors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT CONCAT(first_name, ' ', last_name) as full_name, birth_date, genre, profile_url, bio, death_date
                FROM person
                INNER JOIN director ON person.id_person = director.id_person 
            ");
            $persons = $request->fetchAll();
            require("view/listPersons.php");
        }

        public function homePage() {
            $pdo = Connect::seConnecter();
            require "view/homePage.php";
        }

    }


?>