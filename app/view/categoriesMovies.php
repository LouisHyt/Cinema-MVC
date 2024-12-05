<?php ob_start(); 

    var_dump($movies);
    die;

?>

<div class="categrories-movies">
    
</div>

<?php

$title = "";
$content = ob_get_clean();
$metadesc = "";

require 'view/template.php';

?>