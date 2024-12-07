<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/form.css">
    <title><?= $title ?></title>
</head>
<body>
    <main id="content">
        <?php
            if(isset($_SESSION['formstatus'])) {
                $status = $_SESSION['formstatus']["success"] ? "success" : "error";
                $message = $_SESSION['formstatus']["message"];
                echo (
                "<div class='form-status $status'>
                    <p>$message</p>
                </div>"
                );
                unset($_SESSION['formstatus']);
            }
        ?>
        <?= $content ?>
    </main>
</body>
</html>