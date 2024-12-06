<?php

    namespace Controller;
    use Model\Manager\MovieManager;

    class MovieController {
        
        public function listMovies() {
           
            $movieManager = new MovieManager();
            $movies = $movieManager->getMovies();
            require "view/listMovies.php";
        }

        public function detailsMovie($id) {
            $movieManager = new MovieManager();
            $movieDetails = $movieManager->getMovieById($id);
            require "view/detailsMovie.php";
        }

        public function listMoviesBycategory($id){
            $movieManager = new MovieManager();
            $data = $movieManager->getMoviesByCategory($id);
            require "view/categoriesMovies.php";
        }
    }