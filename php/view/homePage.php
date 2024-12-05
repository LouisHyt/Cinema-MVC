<?php 
    ob_start();
    $frontMovie = $recommendations[0];
    $movies = array_slice($recommendations, 1); 
?>
<link rel="stylesheet" href="public/css/homePage.css">
<div class="home-page">
    <section class="front-movie">
        <figure>
            <img src="<?= $frontMovie['banner_image'] ?>" alt="banner of the movie <?= $frontMovie['title'] ?>">
        </figure>
        <div class="movie-infos">
            <h2 class="movie-title"><?= $frontMovie['title'] ?></h2>
            <p class="movie-synopsis"><?= $frontMovie['synopsis'] ?></p>
            <div class="buttons-group">
                <button class="watch-button">Watch</button>
                <button class="details-button">
                    <span>Details</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
    <section class="movies-recommendations">
     
    </section>
</div>

<?php
$title = "Home Page";
$content = ob_get_clean();
$metadesc = "Home page of the website CinePlus";

require 'view/template.php';