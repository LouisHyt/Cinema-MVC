<?php

    namespace Controller;
    use Model\Manager\MovieManager;
    use Model\Manager\PersonManager;
    use Model\Manager\CategoryManager;

    class AdminPanelController {
        
        public function showAdminPanel(string $entity) {
            $data = [
                "entity" => $entity,
            ];

            switch($entity) {
                case "movies":
                    $movieManager = new MovieManager();
                    $movies = $movieManager->getMovies();
                    $data["entity_data"] = $movies;
                    break;
                case "persons":
                    $personManager = new PersonManager();
                    $persons = $personManager->getPersons();
                    $data["entity_data"] = $persons;
                    break;
                case "categories":
                    $categoryManager = new CategoryManager();
                    $categories = $categoryManager->getCategories();
                    $data["entity_data"] = $categories;
                    break;
            }

            require "view/adminPanel.php";
        }

        public function showOperationPanel(string $operation, string $field) {

            if($operation == "add") {
                
            }
            
            require "view/adminPanel.php";
        }
    }