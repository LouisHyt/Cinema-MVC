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
                    pe.first_name,
                    pe.last_name, 
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
                SELECT 
                    CONCAT(pe.first_name, ' ', pe.last_name) as full_name, 
                    pe.birth_date, 
                    pe.genre, 
                    pe.profile_image, 
                    pe.bio, 
                    pe.death_date
                    ac.id_actor
                FROM person pe
                INNER JOIN actor ac ON pe.id_person = ac.id_person 
            ");
            $persons = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $persons;
        }

        public function getDirectors(){
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT 
                    CONCAT(pe.first_name, ' ', pe.last_name) as full_name, 
                    pe.birth_date, 
                    pe.genre, 
                    pe.profile_image, 
                    pe.bio, 
                    pe.death_date,
                    di.id_director
                FROM person pe
                INNER JOIN director di ON pe.id_person = di.id_person 
            ");
            $persons = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $persons;
        }

        public function deletePerson($id) {
            $pdo = Connect::seConnecter();

            try {
                $request = $pdo->prepare("
                    DELETE FROM person
                    WHERE id_person = :id
                ");
                $request->bindValue(":id", $id, \PDO::PARAM_INT);
                $request->execute();
            } catch (\PDOException $error) {
                return $error;
            }
        }

        public function addPerson($formdata){
            $pdo = Connect::seConnecter();
            try {
                $request = $pdo->prepare("
                    INSERT INTO person (first_name, last_name, birth_date, genre, profile_image, bio, death_date)
                    VALUES (:first_name, :last_name, :birth_date, :genre, :profile_image, :bio, :death_date)
                ");
                $request->bindValue(":first_name", $formdata["firstName"], \PDO::PARAM_STR);
                $request->bindValue(":last_name", $formdata["lastName"], \PDO::PARAM_STR);                
                $request->bindValue(":birth_date", $formdata["birthDate"], \PDO::PARAM_STR);
                $request->bindValue(":genre", $formdata["genre"], \PDO::PARAM_STR);
                $request->bindValue(":profile_image", $formdata["profileImage"], \PDO::PARAM_STR);
                $request->bindValue(":bio", $formdata["bio"], \PDO::PARAM_STR_CHAR);
                $request->bindValue(":death_date", $formdata["deathDate"], \PDO::PARAM_STR);
                $request->execute();

                $idPerson = $pdo->lastInsertId();

                if($formdata["isDirector"]) {
                    $request = $pdo->prepare("
                        INSERT INTO director (id_person)
                        VALUES (:id_person)
                    ");
                    $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                    $request->execute();
                }

                if($formdata["isActor"]) {
                    $request = $pdo->prepare("
                        INSERT INTO actor (id_person)
                        VALUES (:id_person)
                    ");
                    $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                    $request->execute();
                }
            } catch (\PDOException $error) {
                return $error;
            }
        }

        public function editPerson($formdata, int $idPerson){
            $pdo = Connect::seConnecter();
            try {
                $request = $pdo->prepare("
                    UPDATE person
                    SET first_name = :first_name, last_name = :last_name, birth_date = :birth_date, genre = :genre, profile_image = :profile_image, bio = :bio, death_date = :death_date
                    WHERE id_person = :id_person
                ");
                $request->bindValue(":first_name", $formdata["firstName"], \PDO::PARAM_STR);
                $request->bindValue(":last_name", $formdata["lastName"], \PDO::PARAM_STR);                
                $request->bindValue(":birth_date", $formdata["birthDate"], \PDO::PARAM_STR);
                $request->bindValue(":genre", $formdata["genre"], \PDO::PARAM_STR);
                $request->bindValue(":profile_image", $formdata["profileImage"], \PDO::PARAM_STR);
                $request->bindValue(":bio", $formdata["bio"], \PDO::PARAM_STR_CHAR);
                $request->bindValue(":death_date", $formdata["deathDate"], \PDO::PARAM_STR);
                $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                $request->execute();

                if($formdata["isDirector"]) {
                    $request = $pdo->prepare("
                        INSERT IGNORE INTO director (id_person)
                        VALUES (:id_person)
                    ");
                    $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                    $request->execute();
                } else {
                    $request = $pdo->prepare("
                        DELETE FROM director
                        WHERE id_person = :id_person
                    ");
                    $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                    $request->execute();
                }

                if($formdata["isActor"]) {
                    $request = $pdo->prepare("
                        INSERT IGNORE INTO actor (id_person)
                        VALUES (:id_person)
                    ");
                    $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                    $request->execute();
                } else {
                    $request = $pdo->prepare("
                        DELETE FROM actor
                        WHERE id_person = :id_person
                    ");
                    $request->bindValue(":id_person", $idPerson, \PDO::PARAM_INT);
                    $request->execute();
                }
            } catch (\PDOException $error) {
                return $error;
            }
        }

    }