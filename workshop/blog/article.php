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

$comments = getCommentsByArticleId($connection, $id);
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
            <?php 
                include 'templates/article.php';
                foreach ($comments as $comment) {
                    include 'templates/comment-block.php';
                }
                include 'templates/comment-form.php';
            ?>
        </main>
    </body>
</html>
