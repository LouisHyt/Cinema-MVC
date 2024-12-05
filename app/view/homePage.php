<?php 
    ob_start();
    $frontMovie = $recommendations[0];
    $movies = array_slice($recommendations, 1); 
?>
<link rel="stylesheet" href="public/css/homePage.css">
<script src="public/js/homePage.js" defer></script>
<div class="home-page">
    <section class="front-movie" style="background-image: url('<?= $frontMovie['banner_image'] ?>')">
        <div class="movie-infos">
            <h2 class="movie-title"><?= $frontMovie['title'] ?></h2>
            <p class="movie-synopsis"><?= $frontMovie['synopsis'] ?></p>
            <div class="buttons-group">
                <a class="watch-button">Watch</a>
                <a class="details-button" href="./?action=detailsMovie&id=<?= $frontMovie['id_movie']?>">
                    <span>Details</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </section>
    <section class="movies-recommendations">
     <h3>Our Recommendations : </h3>
     <div class="slider">
        <?php foreach ($movies as $movie) : ?>
            <article class="movie-card" data-id="<?= $movie['id_movie'] ?>">
                <figure>
                    <img src="<?= $movie['poster_image'] ?>" alt="poster of the movie <?= $movie['title'] ?>">
                </figure>
                <h4 class="movie-title"><?= $movie['title'] ?></h4>
        </article>
        <?php endforeach; ?>
     </div>
     <i class="fa-solid fa-chevron-right slide-next"></i>
    </section>
</div>

<?php
$title = "Home Page";
$content = ob_get_clean();
$metadesc = "Home page of the website CinePlus";

require 'view/template.php';