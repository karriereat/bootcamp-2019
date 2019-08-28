<?php

require 'bootstrap.php';

if (!isset($_GET['id'])) {
    siteNotFound();
}

$id = intval($_GET['id']);

$article = getArticleById($connection, $id);

if($article == false){
    siteNotFound();
}

$articleDetail = true;

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
            <?php include 'templates/comment.php' ?>
        </main>
    </body>
</html>
