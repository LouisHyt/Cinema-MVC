<?php

    namespace Model\Manager;
    use Model\Connect;

    class ApiManager {

        public function getMoviesByName(string $name) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                SELECT id_movie, title
                FROM movie
                WHERE title LIKE :name
            ");
            $request->bindValue(":name", "%$name%", \PDO::PARAM_STR);
            $request->execute();
            $movies = $request->fetchAll();
            return $movies;
           
        }
    }