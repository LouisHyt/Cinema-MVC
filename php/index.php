<?php

    use Controller\CinemaController;

    spl_autoload_register(function($class_name){
        include "$class_name.php";
    });

    $ctrlCinema = new CinemaController();

    $id = isset($_GET["id"]) ? $_GET["id"] : null;

    if(isset($_GET["action"])){
        switch($_GET["action"]) {
            case "listMovies" : 
                $ctrlCinema->listMovies();
            break;
            case "detailsMovie" : 
                $ctrlCinema->detailsMovie($id);
            break;
            case "listActors" :
                $ctrlCinema->listActors();
            break;
            case "listDirectors" :
                $ctrlCinema->listDirectors();
            break;
            case "detailsPerson" :
                $ctrlCinema->detailsPerson($id);
            break;
        }
    } else {
        $ctrlCinema->homePage();
    }

?>