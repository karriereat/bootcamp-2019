<article class="article">
    <div class="article-meta">
        <span><?php echo date('d.m.Y', $article['date']); ?></span>
        <span><?php echo $article['email']; ?></span>
    </div>

    <h1 class="article-title">
        <a href="article.php?id=<?php echo $id; ?>">
            <?php echo $article['title']; ?>
        </a>
    </h1>

    <div class="article-text"><?php echo $article['text']; ?>...</div>
</article>
