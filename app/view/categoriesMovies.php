<?php 
    ob_start();
    // var_dump($data);
    // die; 

?>

<link rel="stylesheet" href="public/css/categoriesMovies.css">
<script src="public/js/utils/movieRedirect.js" defer></script>
<div class="categories-movies">
    <div class="categories-header">
        <h1>Search by Category</h1>
        <div class="categories-filter">
            <i class="fa-solid fa-chevron-down"></i>
            <select name="category" id="category-select" onchange="window.location.href=this.value">
                <option value="index.php?action=categories">All</option>
                <?php foreach($data["categories"] as $category) { 
                    $isSelected = isset($_GET['id']) && $_GET['id'] == $category["id_category"] ? "selected" : "";
                ?>
                    <option value="./?action=categories&id=<?= $category["id_category"] ?>" <?= $isSelected ?>>
                            <?= ucfirst($category["label"]) ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <section class="movies-grid">
        <?php 
        if(!empty($data["movies"])) {
            foreach($data["movies"] as $movie) { ?>
                <article class="movie-card" data-id="<?= $movie["id_movie"] ?>">
                    <figure>
                        <img src="<?= $movie["poster_image"] ?>" alt="poster">
                    </figure>
                    <h3><?= $movie["title"] ?></h3>
                </article>
            <?php }
        } else { ?>
            <p class="no-movies">No movies found in this category.</p>
        <?php } ?>
    </section>
</div>

<?php
$title = "Movies by Category";
$content = ob_get_clean();
$metadesc = "Browse our movie collection by category";
require 'view/template.php';
?>