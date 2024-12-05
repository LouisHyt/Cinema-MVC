<?php ob_start(); 

    var_dump($personDetails);
    die;

?>

<link rel="stylesheet" href="public/css/detailsPerson.css">
<div class="person-details">
    
</div>

<?php

$title = "";
$content = ob_get_clean();
$metadesc = "";

require 'view/template.php';

?>