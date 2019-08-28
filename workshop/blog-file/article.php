<?php

require 'bootstrap.php';

if (!isset($_GET['id'])) {
    siteNotFound();
}

$id = $_GET['id'];

$filePath = DIRECTORY . '/' . basename($id);

if (is_file($filePath)) {
    $rawData = file_get_contents($filePath);
    $article = json_decode($rawData, true);
} else {
    siteNotFound();
}

function siteNotFound() {
    echo "Seite nicht gefunden";
    die();
}

?>

<html>
    <head>
        <title><?php echo $article['title'] ?></title>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main class="page">
            <?php include 'templates/article.php' ?>
        </main>

        <script src="scripts.js"></script>
    </body>
</html>
