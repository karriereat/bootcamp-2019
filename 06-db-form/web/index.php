<?php

require_once '../bootstrap.php';

$articles = [];
$title = 'Artikel';
$categoryId =  isset($_GET['category']) ? intval($_GET['category']) : 0;
$authorId =  isset($_GET['author']) ? intval($_GET['author']) : 0;

if($categoryId != null){
    $category = getCategoryById($connection, $categoryId);

    if($category == null){
        view_render('404');
        return;
    }

    $title = sprintf('Artikel aus der Kategorie: %s', $category['name']);
    $articles = getAllArticlesByCategory($connection, $categoryId);


} elseif($authorId != null) {

    $author = getUserById($connection, $authorId);

    if($author == null){
        view_render('404');
        return;
    }

    $title = sprintf('Artikel von: %s', $author['username']);

    $articles = getAllArticlesByUser($connection, $authorId);
} else {
    $articles = getAllArticles($connection);
}

$view['articles'] = $articles;
$view['title'] = $title;

view_render('articles', $view);
