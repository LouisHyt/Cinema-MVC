<?php

    namespace Controller;
    use Model\Manager\HomePageManager;

    class homePageController {

        public function homePage() {
            $homePageManager = new HomePageManager();
            $recommendations = $homePageManager->getRecommandations();
            require "view/homePage.php";
        }

    }


?>