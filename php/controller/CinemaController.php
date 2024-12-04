<?php

    namespace Controller;
    use Model\Connect;

    class CinemaController {

        public function homePage() {
            $pdo = Connect::seConnecter();
            require "view/homePage.php";
        }

    }


?>