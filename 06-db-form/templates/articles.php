<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <main>
        <h1><span class="fancy-heading"><?php echo $view['title']; ?></span></h1>

        <?php if (!empty($view['articles'])): ?>
            <ul class="articles">
                <?php foreach ($view['articles'] as $article): ?>
                    <li class="article">
                        <div class="article-content">
                            <h2>
                                <a href="/article.php?id=<?php echo $article['id']; ?>">
                                    <?php echo $article['title'] ?>
                                </a>
                            </h2>
                            <div>
                                <span>am <?php echo view_date($article['date']); ?></span>
                                <span>
                                    Kategorie:
                                    <?php foreach ($article['categories'] as $category): ?>
                                        <a href="?category=<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </span>
                            </div>
                            <p>
                                <?php echo substr($article['text'], 0, 200) . '...' ?>
                            </p>
                            <span>
                                Von:
                                <a href="?author=<?php echo $article['author']['id']; ?>">
                                    <?php echo $article['author']['username']; ?>
                                </a>
                            </span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div>
                Keine Artikel gefunden.
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
