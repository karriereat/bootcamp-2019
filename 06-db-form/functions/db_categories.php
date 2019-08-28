<?php

function getAllCategories(PDO $connection)
{
    $categories = [];

    $stmt = $connection->query('SELECT * FROM categories');

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categories[] = $row;
    }

    return $categories;
}

function getCategoriesByArticle(PDO $connection, int $articleId)
{
    $categories = [];

    $stmt = $connection->prepare('
      SELECT c.* FROM categories AS c
      JOIN articles_categories as ac
      ON ac.categoryId = c.id
      WHERE ac.articleId = ?
      ORDER BY name ASC  
    ');

    $stmt->execute([$articleId]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categories[] = $row;
    }

    return $categories;
}

function getCategoryById(PDO $connection, int $id)
{
    $stmt = $connection->prepare('SELECT * FROM categories WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row == null){
        return null;
    }

    return $row;
}
