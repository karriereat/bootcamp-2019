<?php

function getAllArticles($connection){
    $articles = [];

    $query = "SELECT * FROM article";

    $stmt = $connection->query($query);

    while($article = $stmt->fetch(PDO::FETCH_ASSOC)){
        $articles[] = $article;
    }

    return $articles;
}