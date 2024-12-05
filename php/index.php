<?php

    use Controller\homePageController;
    use Controller\MovieController;
    use Controller\PersonController;
    use Model\Manager\HomePageManager;

    spl_autoload_register(function($class_name){
        include "$class_name.php";
    });

    $ctrlHomePage = new homePageController();
    $ctrlFilm = new MovieController();
    $ctrlPerson = new PersonController();

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
    } else {
        $ctrlCinema->homePage();
    }

?>