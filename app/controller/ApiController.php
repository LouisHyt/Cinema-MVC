<?php

    namespace Controller;
    use Model\Manager\ApiManager;

    class ApiController {

        
        public function searchMoviesByName() {
            $apiManager = new ApiManager();
            header('Content-Type: application/json');

            if(!isset($_GET["query"]) || empty($_GET["query"])) {
                header( '400 Bad Request' );
                echo(json_encode("Query Invalid"));
                exit();
            }

            $movies = $apiManager->getMoviesByName($_GET["query"]);
            echo(json_encode($movies));
        }

    }


?>