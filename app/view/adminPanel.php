<?php

    session_start();

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/adminPanel.css">
    <script src="public/js/adminPanel.js" defer></script>
    <title>Admin Panel</title>
</head>
<body>
    <?php
        if(isset($_SESSION['formstatus'])) {
            $status = $_SESSION['formstatus']["success"] ? "success" : "error";
            $message = $_SESSION['formstatus']["message"];
            echo (
            "<div class='form-status $status'>
                <p>$message</p>
            </div>"
            );
            unset($_SESSION['formstatus']);
        }
    ?>
    <main class="admin-panel">
        <section class="admin-header">
            <div class="select-entity">
                <i class="fa-solid fa-chevron-down"></i>
                <select name="entity" id="entity-select" onchange="window.location.href='./?action=admin&entity='+this.value">
                    <option <?= $_GET['entity'] == "movies" ? "selected" : "" ?> value="movies">Movies</option>
                    <option <?= $_GET['entity'] == "persons" ? "selected" : "" ?> value="persons">Persons</option>
                    <option <?= $_GET['entity'] == "categories" ? "selected" : "" ?> value="categories">Categories</option>
                </select>
            </div>
            <div class="actions">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                </div>
                <a class="add-button" href="./?action=form&entity=<?= $data["entity"] ?>&operation=add">
                    <i class="fa-solid fa-plus"></i>
                    Add
                </a>
            </div>
        </section>
        <section class="admin-content">
            <?php
            switch($data["entity"]) {
                case "movies":
                    require_once "partials/adminPanel/movies.php";
                    break;
                case "persons":
                    require_once "partials/adminPanel/persons.php";
                    break;
                case "categories":
                    require_once "partials/adminPanel/categories.php";
                    break;
            }
            ?>
        </section>
    </main>
</body>
</html>