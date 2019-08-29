<?php

function getAllArticles($connection){
    $articles = [];

    $query = "SELECT a.*, firstname, surname FROM article as a JOIN user as u ON a.user_id = u.id";

    $stmt = $connection->query($query);

    while($article = $stmt->fetch(PDO::FETCH_ASSOC)){
        $articles[] = $article;
    }

    return $articles;
}

function getArticleById($connection, $id){
    $query = "SELECT a.*, firstname, surname FROM article as a JOIN user as u ON a.user_id = u.id WHERE a.id = $id";

    $stmt = $connection->query($query);

    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    return $article;
}


function siteNotFound() {
    echo "Seite nicht gefunden";
    die();
}

function saveComment($connection, $id, $name, $comment){
    
    $query = "INSERT INTO comment 
        (article_id, name, comment, created) 
        VALUES 
        (?, ?, ?, CURRENT_TIME());
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute([
        $id, $name, $comment
    ]);
}

function getCommentsByArticleId($connection, $id){
    $comments = [];

    $query = "SELECT * FROM comment WHERE article_id = ?";

    $stmt = $connection->prepare($query);
    $stmt->execute([$id]);

    while($comment = $stmt->fetch(PDO::FETCH_ASSOC)){
        $comments[] = $comment;
    }

    return $comments;
}