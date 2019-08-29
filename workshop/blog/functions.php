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

function saveComment($connection, $articleId, $name, $comment){

    $query = "INSERT INTO comment 
        (article_id, name, comment, created) 
        VALUES 
        (?, ?, ?, CURRENT_TIME());
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute([
        $articleId, $name, $comment
    ]);
}

function saveArticle($connection, $title, $text, $date, $user){
    $query = "INSERT INTO article 
        (title, text, date, user_id, created) 
        VALUES 
        (?, ?, ?, ?, CURRENT_TIME());
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute([
        $title, $text, date('Y-m-d H:i:s', $date), $user
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

function getUserByEmailAndPassword($connection, $email, $password){
    $query = "SELECT id, firstname, surname, email FROM user WHERE email = ? AND password = ?";

    $stmt = $connection->prepare($query);
    $stmt->execute([$email, $password]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getUserByEmail($connection, $email){
    $query = "SELECT id, firstname, surname, email, password_hash FROM user WHERE email = ?";

    $stmt = $connection->prepare($query);
    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function checkLogin(){
    if(!$_SESSION['login']){
        header('location: /login.php');
        die();
    }
}