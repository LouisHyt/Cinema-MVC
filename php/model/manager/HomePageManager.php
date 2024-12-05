<?php

    namespace Model\Manager;
    use Model\Connect;

    class HomePageManager {

        public function getRecommandations() {

            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT id_movie, title, synopsis, note, banner_image, poster_image, release_date
                FROM movie
                WHERE note IS NOT NULL AND release_date >= DATE_SUB(CURRENT_DATE, INTERVAL 30 YEAR)
                ORDER BY note DESC
                LIMIT 15
            ");
            $recommendations = $request->fetchAll();
            return $recommendations;
        }
    }