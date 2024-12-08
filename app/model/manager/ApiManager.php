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
                ORDER BY title DESC
            ");
            $request->bindValue(":name", "%$name%", \PDO::PARAM_STR);
            $request->execute();
            $movies = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $movies;
           
        }

        public function getActorsByName(string $name) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                SELECT 
                    CONCAT(pe.first_name, ' ', pe.last_name) as full_name, 
                    ac.id_actor
                FROM person pe
                INNER JOIN actor ac ON pe.id_person = ac.id_person
                WHERE CONCAT(pe.first_name, ' ', pe.last_name) LIKE :name
            ");
            $request->bindValue(":name", "%$name%", \PDO::PARAM_STR);
            $request->execute();
            $actors = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $actors;
           
        }
    }