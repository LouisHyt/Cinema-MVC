<?php

    namespace Controller;
    use Model\Manager\CategoryManager;
    use Model\Manager\PersonManager;
    use Model\Manager\MovieManager;
    use Model\Manager\RoleManager;
    use Services\Utils;

    class FormController {

        //Add
        public function showAddMovie() {
            $personManager = new PersonManager();
            $roleManager = new RoleManager();
            $categoryManager = new CategoryManager();
            $categories = $categoryManager->getCategories();
            $roles = $roleManager->getRoles();
            $directors = $personManager->getDirectors();
            if(!empty($_POST)) {
                session_start();
                $postData = Utils::validateMovieForm();
                if(!$postData["movieTitle"] || !$postData["releaseDate"] || !$postData["duration"]) {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The movie must have a valid title, release date, and duration!",
                    ];
                } else {
                    $movieManager = new MovieManager();
                    $error = $movieManager->addMovie($postData);
                    if(isset($error)) {
                        $_SESSION["formstatus"] = [
                            "success" => false,
                            "message" => $error->errorInfo[2],
                        ];
                    } else {
                        $_SESSION["formstatus"] = [
                            "success" => true,
                            "message" => "The movie " . $postData["title"] . " has been successfully added!",
                        ];
                        header("Location: ./?action=admin&entity=movies");
                        exit();
                    }
                }
            } else {
                require "view/forms/formMovie.php";
            }
        }

        public function showAddPerson() {
            if(!empty($_POST)) {
                session_start();
                $personManager = new PersonManager();
                $postData = Utils::validatePersonForm();

                if(!$postData["isActor"] && !$postData["isDirector"]) {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The person must be either an actor, a director or both!",
                    ];
                } else if($postData["firstName"] && $postData["lastName"]) {
                    $error = $personManager->addPerson($postData);
                    if(isset($error)) {	
                        $_SESSION["formstatus"] = [
                            "success" => false,
                            "message" => $error->errorInfo[2],
                        ];
                    } else {
                        $_SESSION["formstatus"] = [
                            "success" => true,
                            "message" => "The person " . $postData["firstName"] ." ". $postData["lastName"] . " has been successfully added!",
                        ];
                        header("Location: ./?action=admin&entity=persons");
                        exit();
                    }
                } else {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The person must have a valid first name and last name!",
                    ];
                }
            }
            require "view/forms/formPerson.php";
        }

        public function showAddCategory() {

            $categoryManager = new CategoryManager();

            if(!empty($_POST)) {
                session_start();
                $category_name = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE);
                
                if(!$category_name) {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The category must have a valid name!",
                    ];
                } else {
                    $error = $categoryManager->addCategory($category_name);
                    if(isset($error)) {
                        $_SESSION["formstatus"] = [
                            "success" => false,
                            "message" => $error->errorInfo[2],
                        ];
                    } else {
                        $_SESSION["formstatus"] = [
                            "success" => true,
                            "message" => "The category $category_name has been successfully added!",
                        ];
                        header("Location: ./?action=admin&entity=categories");
                        exit();
                    }
                }
            }    
            require "view/forms/formCategory.php";
        }


        //Edit
        public function showEditMovie($id) {
            require "view/forms/formMovie.php";
        }

        public function showEditPerson($id) {
            $personManager = new PersonManager();
            $personData = $personManager->getPersonById($id);

            if(!empty($_POST)) {
                session_start();
                $postData = Utils::validatePersonForm();
                if(!$postData["isActor"] && !$postData["isDirector"]) {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The person must be either an actor, a director or both!",
                    ];
                } else if($postData["firstName"] && $postData["lastName"]) {
                    $error = $personManager->editPerson($postData, $id);
                    if(isset($error)) {	
                        $_SESSION["formstatus"] = [
                            "success" => false,
                            "message" => $error->errorInfo[2],
                        ];
                    } else {
                        $_SESSION["formstatus"] = [
                            "success" => true,
                            "message" => "The person " . $postData["firstName"] ." ". $postData["lastName"] . " has been successfully updated!",
                        ];
                        header("Location: ./?action=admin&entity=persons");
                        exit();
                    }
                } else {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The person must have a valid first name and last name!",
                    ];
                }
            }
            require "view/forms/formPerson.php";
        }

        public function showEditCategory($id) {
            $categoryManager = new CategoryManager();
            $categoryData = $categoryManager->getCategoryById($id);

            if(!empty($_POST)) {
                session_start();
                $category_name = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE);

                if(!$category_name) {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => "The category must have a valid name!",
                    ];
                } else {
                    $error = $categoryManager->editCategory($category_name, $id);
                    if(isset($error)) {
                        $_SESSION["formstatus"] = [
                            "success" => false,
                            "message" => $error->errorInfo[2]
                        ];
                    } else {
                        $_SESSION["formstatus"] = [
                            "success" => true,
                            "message" => "The category has been successfully updated!"
                        ];
                        header("Location: ./?action=admin&entity=categories");
                        exit();
                    }
                }
            }
            require "view/forms/formCategory.php";
        }

        //Delete
        public function deleteMovie($id) {
            session_start(); 
            $movieManager = new MovieManager();
            $error = $movieManager->deleteMovie($id);
            if(isset($error)) {
                $_SESSION["formstatus"] = [
                    "success" => false,
                    "message" => $error->errorInfo[2],
                ];
            } else {
                $_SESSION["formstatus"] = [
                    "success" => true,
                    "message" => "The movie has been successfully deleted!",
                ];
            }
            header("Location: ./?action=admin&entity=movies");
            exit();
        }

        public function deletePerson($id) {
            session_start(); 
            $personManager = new PersonManager();
            $error = $personManager->deletePerson($id);
            if(isset($error)) {
                $_SESSION["formstatus"] = [
                    "success" => false,
                    "message" => $error->errorInfo[2],
                ];
            } else {
                $_SESSION["formstatus"] = [
                    "success" => true,
                    "message" => "The person has been successfully deleted!",
                ];
            }
            header("Location: ./?action=admin&entity=persons");
            exit();
        }

        public function deleteCategory($id) {
            session_start();     
            $categoryManager = new CategoryManager();
            $error = $categoryManager->deleteCategory($id);
            if(isset($error)) {
                $_SESSION["formstatus"] = [
                    "success" => false,
                    "message" => $error->errorInfo[2],
                ];
            } else {
                $_SESSION["formstatus"] = [
                    "success" => true,
                    "message" => "The category has been successfully deleted!",
                ];
            }
            header("Location: ./?action=admin&entity=categories");
            exit();
        }

    }


?>