<?php

    namespace Services;
    use Model\Connect;

    abstract class Utils {

        public static function getPersons()
        {
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT pe.id_person, CONCAT(pe.first_name, ' ', pe.last_name) AS full_name, pe.profile_image
                FROM person pe
                INNER JOIN actor ac ON pe.id_person = ac.id_person
                LIMIT 5
            ;
                SELECT pe.id_person, CONCAT(pe.first_name, ' ', pe.last_name) AS full_name, pe.profile_image
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

        public static function getPersonJobs($person) {
            $jobs = [];

            $person["id_director"] !== null 
                ? array_push($jobs, "Director") 
                : null;
            
            $person["id_actor"] !== null 
                ? array_push($jobs, $person["genre"] == "Homme" ? "Actor" : " Actress") 
                : null;

            return $jobs;

        }

        public static function formatDuration(int $duration)
        {
            return intdiv($duration, 60).'h'. ($duration % 60);
        }
    }

?>