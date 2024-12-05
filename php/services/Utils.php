<?php

    namespace Services;
    use Model\Connect;

    abstract class Utils {

        public static function getPersons()
        {
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT pe.id_person, CONCAT(pe.first_name, ' ', pe.last_name) AS full_name, pe.profile_url
                FROM person pe
                INNER JOIN actor ac ON pe.id_person = ac.id_person
                LIMIT 5
            ;
                SELECT pe.id_person, CONCAT(pe.first_name, ' ', pe.last_name) AS full_name, pe.profile_url
                FROM person pe
                INNER JOIN director di ON pe.id_person = di.id_person
                 LIMIT 5
            ");
            $actors = $request->fetchAll(\PDO::FETCH_ASSOC);
            $request->nextRowset();
            $directors = $request->fetchAll(\PDO::FETCH_ASSOC);
            return [
                "actors" => $actors, 
                "directors" => $directors
            ];
        }

        public static function getMoviesByName(string $name)
        {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                SELECT title, id_movie 
                FROM movie
                WHERE title LIKE %:name%
            ");
            $request->bindParam("name", $name, \PDO::PARAM_STR);
            $request->execute();
            return $request->fetchAll(\PDO::FETCH_ASSOC);

        }
    }

?>