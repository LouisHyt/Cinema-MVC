<?php

    use Services\Utils;

    $persons = Utils::getPersons();
    $actors = $persons["actors"];
    $directors = $persons["directors"];

    $activeLink = isset($_GET["filter"]) ? $_GET["filter"] : null;
    
?>


<script src="public/js/sidebar.js" defer></script>
<aside id="sidebar">

    <div class="logo">
        <a href="./"><span class="cine">CINE</span><span class="plus">PLUS</span></a>
    </div>
    <div class="navigation">
        <h3>Navigation</h3>
        <ul class="nav-links">
            <li>
                <a href="./?action=listMovies" class="<?= !$activeLink ? "active" : "" ?>">
                    <i class="fas fa-film"></i>
                    <span>Browse</span>
                </a>
            </li>
            <li>
                <a href="./?action=listMovies&filter=new" class="<?= $activeLink == "new" ? "active" : "" ?>">
                    <i class="fas fa-clock"></i>
                    <span>New</span>
                </a>
            </li>
            <li>
                <a href="./?action=listMovies&filter=popularity" class="<?= $activeLink == "popularity" ? "active" : "" ?>">
                    <i class="fas fa-fire"></i>
                    <span>Popular</span>
                </a>
            </li>
            <li>
                <a href="./?action=listMovies&filter=notation" class="<?= $activeLink == "notation" ? "active" : "" ?>">
                    <i class="fas fa-star"></i>
                    <span>Best notation</span>
                </a>
            </li>
            <li>
                <a href="./?action=categories">
                    <i class="fas fa-list"></i>
                    <span>Categories</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Actors -->
    <div class="actors persons">
        <div class="title_section">
            <h3>Actors</h3>
            <i class="fa-solid fa-repeat switch-persons"></i>
        </div>
        <ul class="actors-list persons-list">

            <?php foreach($actors as $actor) { ?>

                <li>
                    <a href="./?action=detailsPerson&id=<?= $actor["id_person"]?>">
                        <img src="<?= $actor["profile_image"] ?>" alt="<?= "Profile picture of". $actor["full_name"] ?>">
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
                        <img src="<?= $director["profile_image"] ?>" alt="<?= "Profile picture of". $director["full_name"] ?>">
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