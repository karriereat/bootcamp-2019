
<?php

require_once '../bootstrap.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$article = getArticleById($connection, $id);

if($article == null){
    http_response_code(404);
    view_render('404');
    return;
}

$view['article'] = $article;

view_render('article', $view);
