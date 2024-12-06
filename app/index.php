<?php

    use Controller\HomePageController;
    use Controller\MovieController;
    use Controller\PersonController;
    use Controller\ApiController;
    use Controller\AdminPanelController;

    spl_autoload_register(function($class_name){
        include "$class_name.php";
    });

    $ctrlHomePage = new HomePageController();
    $ctrlMovie = new MovieController();
    $ctrlPerson = new PersonController();
    $ctrlApi = new ApiController();
    $ctrlAdminPanel = new AdminPanelController();

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $filter = isset($_GET["filter"]) ? $_GET["filter"] : null;
    $entity = isset($_GET["entity"]) ? $_GET["entity"] : null;

    if(isset($_GET["action"])){
        switch($_GET["action"]) {
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
        }
    } else if(isset($_GET["api"])){
        switch($_GET["api"]) {
            case "searchMoviesByName":
                $ctrlApi->searchMoviesByName();
            break;
        }
    }
    else {
        $ctrlHomePage->homePage();
    }

?>