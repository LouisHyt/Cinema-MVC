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
            $movies = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $movies;
        }

        public function getMovieById(int $id) {
            $pdo = Connect::seConnecter();
            $requestMovie = $pdo->prepare("
                SELECT 
                    mo.title, 
                    mo.release_date, 
                    mo.release_date, 
                    mo.duration, 
                    mo.synopsis, 
                    mo.note, 
                    mo.poster_image, 
                    CONCAT(pe.first_name, ' ', pe.last_name) as director_name,
                    pe.id_person as director_id,
                    GROUP_CONCAT(ca.label) as categories

                FROM movie mo
                INNER JOIN director di ON mo.id_director = di.id_director 
                INNER JOIN person pe ON di.id_person = pe.id_person 
                INNER JOIN belongs be ON mo.id_movie = be.id_movie
                INNER JOIN category ca ON be.id_category = ca.id_category
                WHERE mo.id_movie = :id
            ");
            $requestMovie->bindValue(":id", $id, \PDO::PARAM_INT);
            $requestMovie->execute();
            $movie = $requestMovie->fetch(\PDO::FETCH_ASSOC);

            $requestCast = $pdo->prepare("
                SELECT 
                    CONCAT(pe.first_name, ' ', pe.last_name) as actor_name,
                    pe.profile_image,
                    pe.id_person,
                    cr.role_name
                FROM movie mo
                INNER JOIN play pl ON mo.id_movie = pl.id_movie
                INNER JOIN actor ac ON pl.id_actor = ac.id_actor
                INNER JOIN person pe ON ac.id_person = pe.id_person
                INNER JOIN casting_role cr ON pl.id_role = cr.id_role
                WHERE mo.id_movie = :id
                 
            ");
            $requestCast->bindValue(":id", $id, \PDO::PARAM_INT);
            $requestCast->execute();
            $casting = $requestCast->fetchAll(\PDO::FETCH_ASSOC);

            $data = [
                "movie" => $movie,
                "casting" => $casting
            ];

            return $data;
        }
    }