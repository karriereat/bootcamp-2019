<?php

require_once '../bootstrap.php';

$articles = getAllArticles($connection);

$articleDetail = false;

?>

<html>
    <head>
        <title>Meine Artikel</title>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main class="page">
            <?php foreach ($articles as $article): ?>
                <?php include '../templates/article.php' ?>
            <?php endforeach; ?>
        </main>
    </body>
</html>
