<?php 
    ob_start();
?>

<link rel="stylesheet" href="public/css/listPersons.css">
<div class="persons-grid">
    <?php foreach($persons as $person) : ?>
        <a href="./?action=detailsPerson&id=<?= $person["id_person"] ?>" class="person-card">
            <div class="person-image">
                <img src="<?= $person["profile_image"] ?>" alt="Profile picture of <?= $person["full_name"] ?>">
            </div>
            <div class="person-info">
                <h3 class="person-name"><?= $person["full_name"] ?></h3>
                <div class="person-birth">
                    <?= \DateTime::createFromFormat('Y-m-d', $person["birth_date"])->format('Y/m/d') ?>
                    <?php if($person["death_date"]) : ?>
                        - <?= $person["death_date"] ?>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php
$title = "List of Persons";
$content = ob_get_clean();
$metadesc = "Browse through our collection of actors & directors";

require 'view/template.php';