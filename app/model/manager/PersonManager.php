<?php

    namespace Model\Manager;
    use Model\Connect;
    use Services\Utils;

    class PersonManager {

        public function getPersons() {    
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT 
                    pe.id_person,
                    CONCAT(pe.first_name, ' ', pe.last_name) as full_name,
                    pe.birth_date,
                    pe.genre,
                    pe.death_date,
                    pe.bio, 
                    pe.profile_image,
                    ac.id_actor,
                    di.id_director
                FROM person pe
                LEFT JOIN actor ac ON pe.id_person = ac.id_person
                LEFT JOIN director di ON pe.id_person = di.id_person
            ");
            $persons = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $persons;
        }

        public function getPersonById(int $id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                SELECT 
                    CONCAT(pe.first_name,'',pe.last_name) as full_name, 
                    pe.profile_image, 
                    DATE_FORMAT(pe.birth_date, '%d/%m/%Y') as birth_date, 
                    DATE_FORMAT(pe.death_date, '%d/%m/%Y') AS death_date,  
                    pe.bio, 
                    pe.genre,
                    ac.id_actor,
                    di.id_director
                FROM person pe
                LEFT JOIN actor ac ON pe.id_person = ac.id_person
                LEFT JOIN director di ON pe.id_person = di.id_person
                WHERE pe.id_person = :id
            ");
            $request->bindValue(":id", $id, \PDO::PARAM_INT);
            $request->execute();
            $personDetails = $request->fetch(\PDO::FETCH_ASSOC);

            if($personDetails["id_actor"] != null) {
                $request = $pdo->prepare("
                    SELECT mo.title, mo.poster_image
                    FROM movie mo
                    INNER JOIN play pl ON mo.id_movie = pl.id_movie
                    INNER JOIN actor ac ON pl.id_actor = ac.id_actor
                    WHERE ac.id_actor = :id
                ");
                $request->bindValue(":id", $personDetails["id_actor"], \PDO::PARAM_INT);
                $request->execute();
                $personDetails["played_movies"] = $request->fetchAll(\PDO::FETCH_ASSOC);
                
            } else if($personDetails["id_director"] != null) {
                $request = $pdo->prepare("
                    SELECT mo.title, mo.poster_image
                    FROM movie mo
                    WHERE mo.id_director = :id
                ");
                $request->bindValue(":id", $personDetails["id_director"], \PDO::PARAM_INT);
                $request->execute();
                $personDetails["directed_movies"] = $request->fetchAll(\PDO::FETCH_ASSOC);
            }

            $jobs = Utils::getPersonJobs($personDetails);
            $personDetails["jobs"] = $jobs;

            return $personDetails;

        }

        public function getActors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT CONCAT(first_name, ' ', last_name) as full_name, birth_date, genre, profile_image, bio, death_date
                FROM person
                INNER JOIN actor ON person.id_person = actor.id_person 
            ");
            $persons = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $persons;
        }

        public function getDirectors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT CONCAT(first_name, ' ', last_name) as full_name, birth_date, genre, profile_image, bio, death_date
                FROM person
                INNER JOIN director ON person.id_person = director.id_person 
            ");
            $persons = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $persons;
        }

        public function deletePerson($id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                DELETE FROM person
                WHERE id_person = :id
            ");
            $request->bindValue(":id", $id, \PDO::PARAM_INT);
            $request->execute();
        }

    }