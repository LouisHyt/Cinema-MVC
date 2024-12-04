<?php

    use Services\Utils;

    $persons = Utils::getPersons();
    $actors = $persons["actors"];
    $directors = $persons["directors"];
    
?>



<link rel="stylesheet" href="public/css/sidebar.css">
<script src="public/js/sidebar.js" defer></script>

<aside id="sidebar">

    <div class="logo">
        <span class="cine">CINE</span><span class="plus">PLUS</span>
    </div>
    <div class="navigation">
        <h3>Navigation</h3>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class="fas fa-film"></i>
                    <span>Parcourir</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-clock"></i>
                    <span>Nouveautés</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-fire"></i>
                    <span>Populaires</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-star"></i>
                    <span>Mieux notés</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-list"></i>
                    <span>Catégories</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Actors -->
    <div class="actors persons">
        <div class="title_section">
            <h3>Acteurs</h3>
            <i class="fa-solid fa-repeat switch-persons"></i>
        </div>
        <ul class="actors-list persons-list">

            <?php foreach($actors as $actor) { ?>

                <li>
                    <a href="./?action=detailsPerson&id=<?= $actor["id_person"]?>">
                        <img src="<?= $actor["profile_url"] ?>" alt="<?= "Profile picture of". $actor["full_name"] ?>">
                        <span> <?= $actor["full_name"] ?> </span>
                    </a>
                </li>
                
            <?php } ?>

        </ul>
        <a href="./?action=listActors" class="discover-more">
            <span>Discover more actors</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <!-- Directors -->
    <div class="directors persons hidden">
        <div class="title_section">
            <h3>Directors </h3>
            <i class="fa-solid fa-repeat switch-persons"></i>
        </div>
        <ul class="directors-list persons-list">
            <?php foreach($directors as $director) { ?>

                <li>
                    <a href="./?action=detailsPerson&id=<?= $director["id_person"]?>">
                        <img src="<?= $director["profile_url"] ?>" alt="<?= "Profile picture of". $director["full_name"] ?>">
                        <span> <?= $director["full_name"] ?> </span>
                    </a>
                </li>

            <?php } ?>
        </ul>
        <a href="./?action=listDirectors" class="discover-more">
            <span>Discover more directors</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</aside>