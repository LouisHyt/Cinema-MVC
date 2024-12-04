<?php

    use Controller\CinemaController;
    use Controller\MovieController;
    use Controller\PersonController;

    spl_autoload_register(function($class_name){
        include "$class_name.php";
    });

    $ctrlCinema = new CinemaController();
    $ctrlFilm = new MovieController();
    $ctrlPerson = new PersonController();

    $id = isset($_GET["id"]) ? $_GET["id"] : null;

    if(isset($_GET["action"])){
        switch($_GET["action"]) {
            case "listMovies" : 
                $ctrlFilm->listMovies();
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