<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $metadesc ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/sidebar.css">
    <link rel="stylesheet" href="public/css/navbar.css">
    <title><?= $title ?></title>
</head>
<body>
    <?php 
        require "view/partials/navbar.php";
        require "view/partials/sidebar.php"; 
    ?>
    <main id="content">
        <?= $content ?>
    </main>
</body>
</html>