<?php

require 'bootstrap.php';

$articlePaths = scandir(DIRECTORY, SCANDIR_SORT_DESCENDING);

$articles = [];

foreach ($articlePaths as $fileName) {
    if ($fileName == '.' || $fileName == '..' || $fileName == '.gitkeep') {
        continue;
    }

    $rawData = file_get_contents(DIRECTORY . '/' . $fileName);
    $articleData = json_decode($rawData, true);

    $articleData['email'] = '';
    $articleData['text'] = substr($articleData['text'], 0, 200) . '...';

    $articles[$fileName] = $articleData;
}

$names = ['markus', 'manuel'];

?>

<html>
    <head>
        <title>Meine Artikel</title>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main class="page">
            <?php foreach ($articles as $id => $article): ?>
                <?php include 'templates/article.php' ?>
            <?php endforeach; ?>
        </main>

        <script src="scripts.js"></script>
    </body>
</html>
