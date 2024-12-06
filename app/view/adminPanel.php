<?php

    //var_dump($data);

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
                <button class="add-button">
                    <i class="fa-solid fa-plus"></i>
                    Add
                </button>
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