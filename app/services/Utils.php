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
                ? array_push($jobs, $person["genre"] == "Male" ? "Actor" : " Actress") 
                : null;

            return $jobs;

        }

        public static function formatDuration(int $duration)
        {
            return intdiv($duration, 60).'h'. ($duration % 60);
        }

        public static function validatePersonForm() {
            return [
                "firstName" => filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE),
                "lastName" => filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE),
                "genre" => filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE),
                "profileImage" => filter_input(INPUT_POST, 'profileImage', FILTER_VALIDATE_URL, FILTER_NULL_ON_FAILURE),
                "birthDate" => filter_input(INPUT_POST, 'birthDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE) ?: null,
                "deathDate" => filter_input(INPUT_POST, 'deathDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE) ?: null,
                "isDirector" => filter_input(INPUT_POST, 'isDirector', FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE),
                "isActor" => filter_input(INPUT_POST, 'isActor', FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE),
                "bio" => filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE),
            ];
        }
    }

?>