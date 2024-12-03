<?php ob_start(); ?>

<h1>Saluuuuuuut</h1>

<?php

var_dump($movies);

$title = "Liste des films";
$content = ob_get_clean();

require 'view/template.php';