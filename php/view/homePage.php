<?php ob_start(); ?>

<h1>Saluuuuuuut</h1>

<?php

$title = "Home Page";
$content = ob_get_clean();

require 'view/template.php';