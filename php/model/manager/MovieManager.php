<?php

    namespace Model\Manager;
    use Model\Connect;

    class MovieManager {

        public function getMovies() {

            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT mo.title, mo.release_date, mo.duration, mo.synopsis, mo.note, mo.poster_image, CONCAT(pe.first_name, ' ', pe.last_name) as full_name
                FROM movie mo
                INNER JOIN director di ON mo.id_director = di.id_director 
                INNER JOIN person pe ON di.id_person = pe.id_person
            ");
            $movies = $request->fetchAll();
            return $movies;
        }

        public function getMovieById(int $id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("SELECT title, release_date FROM movie WHERE id_movie = :id");
            $request->bindParam(":id", $id, \PDO::PARAM_INT);
            $request->execute();
            $movie = $request->fetch();

            return $movie;
        }
    }