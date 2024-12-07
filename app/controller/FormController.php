<?php

    namespace Controller;
    use Model\Manager\FormManager;

    class FormController {

        //Add
        public function showAddMovie() {
            require "view/forms/addMovie.php";
        }

        public function showAddPerson() {
            require "view/forms/addPerson.php";
        }

        public function showAddCategory() {

            $formManager = new FormManager();

            if(isset($_POST['categoryName'])) {
                session_start();
                $category_name = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $error = $formManager->addCategory($category_name);

                if(isset($error)) {
                    $_SESSION["formstatus"] = [
                        "success" => false,
                        "message" => $error->errorInfo[2],
                    ];
                    require "view/forms/addCategory.php";
                } else {
                    $_SESSION["formstatus"] = [
                        "success" => true,
                        "message" => "The category $category_name has been successfully added!",
                    ];
                    header("Location: ./?action=admin&entity=categories");
                    exit();
                }

            } else {    
                require "view/forms/addCategory.php";
            }
        }


        //Edit
        public function showEditMovie() {
            require "view/forms/editMovie.php";
        }

        public function showEditPerson() {
            require "view/forms/editPerson.php";
        }

        public function showEditCategory() {
            require "view/forms/editCategory.php";
        }

    }


?>