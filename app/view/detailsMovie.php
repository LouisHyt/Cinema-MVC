<?php ob_start(); 

    use Services\Utils;
    $formattedDuration = Utils::formatDuration($movieDetails['movie']['duration']);

?>

<link rel="stylesheet" href="public/css/detailsMovie.css">
<div class="movie-details">
    <section class="movie-infos">
        <figure class="movie-poster">
            <img src="<?= $movieDetails['movie']["poster_image"] ?>" alt="Poster of the movie <?= $movieDetails['movie']["title"] ?>">
        </figure>
        <div class="movie-content">
            <h2><?= $movieDetails['movie']["title"] ?></h2>
            <div class="categories">
                <?php
                if($movieDetails["movie"]["categories"]){
                    foreach (explode(",", $movieDetails['movie']["categories"]) as $category){
                        echo "<span class='category'>$category</span>";
                    }
                }
                ?>
            </div>
            <div class="stats">
                <div class="stat-note">
                    <i class="fa-solid fa-star"></i>
                    <span><?= $movieDetails['movie']["note"] ?> / 5</span>
                </div>
                <div class="stat-duration">
                    <i class="fa-solid fa-stopwatch"></i>
                    <span><?= $formattedDuration ?></span>
                </div>
                <div class="stat-realisator">
                    <i class="fa-solid fa-user-tie"></i>
                    <a href="./?action=detailsPerson&id=<?= $movieDetails['movie']["id_person"] ?>"><?= $movieDetails['movie']["director_name"] ?></a>
                </div>
            </div>
            <div class="movie-synopsis">
                <pre><?= $movieDetails['movie']["synopsis"] ?></pre>
            </div>
        </div>
    </section>
    <section class="casting-infos">
        <h3>Casting</h3>
        <div class="actor-wrapper">
            <?php foreach ($movieDetails['casting'] as $actor) : ?>
                <div class="actor-card">
                    <figure class="actor-image">
                        <img src="<?= $actor["profile_image"] ?>" alt="Profile picture of the actor <?= $actor["actor_name"] ?>">
                    </figure>
                    <div class="actor-name">
                        <a href="./?action=detailsPerson&id=<?= $actor["id_person"] ?>"><?= $actor["actor_name"] ?></a>
                    </div>
                    <p class="actor-role"><?= $actor["role_name"] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php

$title = "Details : " . $movieDetails['movie']["title"];
$content = ob_get_clean();
$metadesc = "Details of the movie " . $movieDetails['movie']["title"] . " by " . $movieDetails['movie']["director_name"];

require 'view/template.php';

?>