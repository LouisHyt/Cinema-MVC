<?php ob_start(); ?>

<h1>Saluuuuuuut</h1>

<?php

var_dump($person);

$title = "Details person";
$content = ob_get_clean();

require 'view/template.php';