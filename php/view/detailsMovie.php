<?php ob_start(); ?>

<h1>Details Movie</h1>

<?php

$title = "Details : " . $movie["title"];
$content = ob_get_clean();
$metadesc = "Details of the movie " . $movie["title"] . "(" . $movie["release_date"].")";

require 'view/template.php';