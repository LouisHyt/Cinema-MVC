<?php ob_start(); ?>

<link rel="stylesheet" href="public/css/detailsPerson.css">
<div class="person-details">
    <section class="person-infos">
        <figure class="person-poster">
            <img src="<?= $personDetails["profile_image"] ?>" alt="Photo of <?= $personDetails["full_name"] ?>">
        </figure>
        <div class="person-content">
            <h2><?= $personDetails["full_name"] ?></h2>
            <div class="stats">
                <?php if($personDetails["birth_date"]) : ?>
                <div class="stat-birth">
                    <i class="fa-solid fa-calendar"></i>
                    <span>Born: <?= $personDetails["birth_date"] ?></span>
                </div>
                <?php endif; ?>
                <?php if($personDetails["death_date"]) : ?>
                <div class="stat-death">
                    <i class="fa-solid fa-cross"></i>
                    <span>Died: <?= $personDetails["death_date"] ?></span>
                </div>
                <?php endif; ?>
                <div class="stat-jobs">
                    <i class="fa-solid fa-user-tie"></i>
                    <span><?= implode(", ", $personDetails["jobs"]) ?></span>
                </div>
            </div>
            <div class="person-bio">
                <pre><?= $personDetails["bio"] !== null ? $personDetails["bio"] : "No biography available" ?></pre>
            </div>
        </div>
    </section>
    <?php if(isset($personDetails["played_movies"])) : ?>
        <section class="filmography-infos">
            <h3>Filmography as Actor</h3>
            <div class="movie-wrapper">
                <?php foreach ($personDetails["played_movies"] as $movie) : ?>
                    <a class="movie-card" href="./?action=detailsMovie&id=<?= $movie["id_movie"] ?>">
                        <figure class="movie-image">
                            <img src="<?= $movie["poster_image"] ?>" alt="Poster of the movie <?= $movie["title"] ?>">
                        </figure>
                        <div class="movie-title">
                            <span><?= $movie["title"] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if(isset($personDetails["directed_movies"])) : ?>
        <section class="filmography-infos">
            <h3>Filmography as Director</h3>
            <div class="movie-wrapper">
                <?php foreach ($personDetails["directed_movies"] as $movie) : ?>
                    <a class="movie-card" href="./?action=detailsMovie&id=<?= $movie["id_movie"] ?>">
                        <figure class="movie-image">
                            <img src="<?= $movie["poster_image"] ?>" alt="Poster of the movie <?= $movie["title"] ?>">
                        </figure>
                        <div class="movie-title">
                            <span><?= $movie["title"] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php
$title = "Details : " . $personDetails["full_name"];
$metadesc = "Details of the person " . $personDetails["full_name"];
$content = ob_get_clean();
require 'view/template.php';
?>