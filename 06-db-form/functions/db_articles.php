<?php


function getAllArticles(PDO $connection)
{

    $articles = [];

    $stmt = $connection->query('SELECT * FROM articles ORDER BY date DESC');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $articles[] = enrichArticle($connection, $row);
    }

    return $articles;
}

function getArticleById(PDO $connection, int $id)
{
    $stmt = $connection->prepare('SELECT * FROM articles WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row == null){
        return null;
    }

    $article = enrichArticle($connection, $row);

    return $article;
}

function getAllArticlesByCategory(PDO $connection, int $categoryId)
{
    $articles = [];

    $stmt = $connection->prepare('
      SELECT * FROM articles a 
      JOIN articles_categories as ac
      ON ac.articleId = a.id
      WHERE ac.categoryId = ?
      ORDER BY a.date DESC
    ');

    $stmt->execute([$categoryId]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $articles[] = enrichArticle($connection, $row);
    }

    return $articles;
}


function getAllArticlesByUser(PDO $connection, int $userId)
{
    $articles = [];

    $stmt = $connection->prepare('
      SELECT * FROM articles a 
      JOIN users as u
      ON u.id = a.userId
      WHERE u.id = ?
      ORDER BY a.date DESC
    ');

    $stmt->execute([$userId]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $articles[] = enrichArticle($connection, $row);
    }

    return $articles;
}

function saveArticle($connection, string $title, string $text, int $userId, int $date) {
    $stmt = $connection->prepare("INSERT INTO articles (title, text, userId, date, createDate, changeDate) VALUES (?, ?, ?, ?, ?, ?)");

    $createDate = time();

    $success = $stmt->execute([
        $title,
        $text,
        $userId,
        $date,
        $createDate,
        $createDate
    ]);

    if($success) {
        $stmt = $connection->query("SELECT LAST_INSERT_ID()");
        return intval($stmt->fetchColumn());
    } else {
        return null;
    }
}

function enrichArticle(PDO $connection, array $article){
    $article['categories'] = getCategoriesByArticle($connection, $article['id']);
    $article['author'] = getUserById($connection, $article['userId']);
    return $article;
}
