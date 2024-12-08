<?php

    use Controller\HomePageController;
    use Controller\MovieController;
    use Controller\PersonController;
    use Controller\ApiController;
    use Controller\AdminPanelController;
    use Controller\FormController;

    spl_autoload_register(function($class_name){
        include "$class_name.php";
    });

    $ctrlHomePage = new HomePageController();
    $ctrlMovie = new MovieController();
    $ctrlPerson = new PersonController();
    $ctrlApi = new ApiController();
    $ctrlAdminPanel = new AdminPanelController();
    $ctrlForm = new FormController();

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $filter = isset($_GET["filter"]) ? $_GET["filter"] : null;
    $entity = isset($_GET["entity"]) ? $_GET["entity"] : null;
    $operation = isset($_GET["operation"]) ? $_GET["operation"] : null;

    if(isset($_GET["action"])){
        switch($_GET["action"]) {

            //Views
            case "listMovies" :
                 if($filter != null){
                     $ctrlMovie->listMovies();
                 } else {
                    $ctrlHomePage->homePage();
                 }
            break;
            case "detailsMovie" : 
                $ctrlMovie->detailsMovie($id);
            break;
            case "listActors" :
                $ctrlPerson->listActors();
            break;
            case "listDirectors" :
                $ctrlPerson->listDirectors();
            break;
            case "detailsPerson" :
                $ctrlPerson->detailsPerson($id);
            break;
            case "categories" : 
                $ctrlMovie->listMoviesBycategory($id);
            break;
            case "admin" :
               if($entity != null && ($entity === "movies" || $entity === "persons" || $entity === "categories")) {
                   $ctrlAdminPanel->showAdminPanel($entity);
               } else {
                    $ctrlHomePage->homePage();
               }
            break;
            case "form" :
                if ($entity && $operation) {
                    switch ($entity) {
                        case "movies":
                            if ($operation === "add") {
                                $ctrlForm->showAddMovie();
                            } else if ($operation === "edit") {
                                $ctrlForm->showEditMovie($id);
                            } else if ($operation === "delete") {
                                $ctrlForm->deleteMovie($id);
                            }
                            break;
                        case "persons":
                            if ($operation === "add") {
                                $ctrlForm->showAddPerson();
                            } else if ($operation === "edit") {
                                $ctrlForm->showEditPerson($id);
                            } else if ($operation === "delete") {
                                $ctrlForm->deletePerson($id);
                            }
                            break;
                        case "categories":
                            if ($operation === "add") {
                                $ctrlForm->showAddCategory();
                            } else if ($operation === "edit") {
                                $ctrlForm->showEditCategory($id);
                            } else if ($operation === "delete") {
                                $ctrlForm->deleteCategory($id);
                            }
                            break;
                        default:
                            $ctrlHomePage->homePage();
                    }
                } else {
                    $ctrlHomePage->homePage();
                }   
            break;
        }
    } else if(isset($_GET["api"])){
        switch($_GET["api"]) {
            case "searchMoviesByName":
                $ctrlApi->searchMoviesByName();
            break;
            case "searchActorsByName":
                $ctrlApi->searchActorsByName();
            break;
        }
    }
    else {
        $ctrlHomePage->homePage();
    }

?>