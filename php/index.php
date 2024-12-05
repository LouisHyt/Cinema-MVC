<?php

    use Controller\homePageController;
    use Controller\MovieController;
    use Controller\PersonController;
    use Controller\ApiController;

    spl_autoload_register(function($class_name){
        include "$class_name.php";
    });

    $ctrlHomePage = new homePageController();
    $ctrlFilm = new MovieController();
    $ctrlPerson = new PersonController();
    $ctrlApi = new ApiController();

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $filter = isset($_GET["filter"]) ? $_GET["filter"] : null;

    if(isset($_GET["action"])){
        switch($_GET["action"]) {
            case "listMovies" :
                 if($filter != null){
                     $ctrlFilm->listMovies();
                 } else {
                    $ctrlHomePage->homePage();
                 }
            break;
            case "detailsMovie" : 
                $ctrlFilm->detailsMovie($id);
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
        }
    } else if(isset($_GET["api"])){
        switch($_GET["api"]) {
            case "searchMoviesByName":
                $ctrlApi->searchMoviesByName();
            break;
        }
    }
    else {
        $ctrlCinema->homePage();
    }

?>