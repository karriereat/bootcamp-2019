<?php

require_once 'config.php';

$articleDir = scandir(ARTICLE_DIRECTORY);

$articles = [];

foreach ($articleDir as $article) {
    if ($article != '..' AND $article != '.' AND substr($article, -5) == '.json') {
        $data = json_decode(file_get_contents(ARTICLE_DIRECTORY . $article), true);
        if ($data != null) {
            $data['id'] = substr($article, 0, -5);
            $articles[] = $data;
        }
    }
}

$view['articles'] = $articles;


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <h1><span class="fancy-heading">Artikel</span></h1>
        <ul class="articles">
            <?php foreach ($view['articles'] as $article): ?>
                <li class="article">
                    <div class="article-content">
                        <h2>
                            <a href="/article.php?id=<?php echo $article['id']; ?>">
                                <?php echo $article['title'] ?>
                            </a>
                        </h2>
                        <p>
                            <?php echo substr($article['text'], 0, 200) . '...'?>
                        </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>
