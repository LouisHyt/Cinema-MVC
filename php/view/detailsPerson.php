<?php ob_start(); ?>

<h1>Details Person</h1>

<p><?= $person["full_name"] ?></p>

<?php

$title = "Details : " . $person["full_name"];
$content = ob_get_clean();
$metadesc = "Description page for the actor ";

require 'view/template.php';