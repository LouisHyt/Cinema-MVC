<?php ob_start(); ?>

<h1>List Persons </h1>
<ul>
    <?php foreach($persons as $person){ ?>
        <li>
            <a><?= $person["full_name"] ?></a>
        </li>
    <?php } ?>
</ul>

<?php

$title = "List persons";
$content = ob_get_clean();

require 'view/template.php';