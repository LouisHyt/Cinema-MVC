<?php ob_start(); ?>

<h1>Home page</h1>

<?php

$title = "Home Page";
$content = ob_get_clean();
$metadesc = "Home page of the website CinePlus";

require 'view/template.php';