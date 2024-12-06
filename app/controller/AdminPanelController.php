<?php

    namespace Controller;
    use Model\Manager\AdminPanelManager;

    class AdminPanelController {
        
        public function showAdminPanel() {
            
            require "view/adminPanel.php";
        }
    }