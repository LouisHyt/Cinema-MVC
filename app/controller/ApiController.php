<?php

    namespace Controller;
    use Model\Manager\ApiManager;
    use Model\Manager\CategoryManager;
    use Model\Manager\MovieManager;
    use Model\Manager\PersonManager;

    class ApiController {

        
        public function searchMoviesByName() {
            $apiManager = new ApiManager();
            header('Content-Type: application/json');

            if(!isset($_GET["query"]) || empty($_GET["query"])) {
                header("HTTP/1.1 400 Bad Request");
                echo(json_encode("Query Invalid"));
                exit();
            }

            $movies = $apiManager->getMoviesByName($_GET["query"]);
            echo(json_encode($movies));
        }

        public function deleteCategory() {
            $categoryManager = new CategoryManager();
            header('Content-Type: application/json');

            if(!isset($_GET["id"]) || empty($_GET["id"])) {
                header("HTTP/1.1 400 Bad Request");
                echo(json_encode("No id provided"));
                exit();
            }

            $categoryManager->deleteCategory($_GET["id"]);
            echo(json_encode(["msg" => "The category has been successfully deleted"]));
        }

        public function deleteMovie() {
            $movieManager = new MovieManager();
            header('Content-Type: application/json');

            if(!isset($_GET["id"]) || empty($_GET["id"])) {
                header("HTTP/1.1 400 Bad Request");
                echo(json_encode("No id provided"));
                exit();
            }

            $movieManager->deleteMovie($_GET["id"]);
            echo(json_encode(["msg" => "The movie has been successfully deleted"]));
        }

        public function deletePerson() {
            $personManager = new PersonManager();
            header('Content-Type: application/json');

            if(!isset($_GET["id"]) || empty($_GET["id"])) {
                header("HTTP/1.1 400 Bad Request");
                echo(json_encode("No id provided"));
                exit();
            }

            $personManager->deletePerson($_GET["id"]);
            echo(json_encode(["msg" => "The person has been successfully deleted"]));
        }

    }


?>