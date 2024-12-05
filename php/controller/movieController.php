<?php

    namespace Controller;
    use Model\Manager\MovieManager;

    class MovieController {
        
        public function listMovies() {
           
            $movieManager = new MovieManager();
            $movies = $movieManager->getMovies();
            require "view/listMovies.php";
        }

        public function detailsMovie(int $id) {
            $movieManager = new MovieManager();
            $movie = $movieManager->getMovieById($id);
            require "view/detailsMovie.php";
        }
    }