<article class="article">
    <div class="article-meta">
        <?php if($articleDetail): ?>
            <span><?php echo date('d.m.Y', strtotime($article['date'])); ?></span>
            <span><?php echo $article['firstname'] . ' ' . $article['surname']; ?></span>
        <?php endif; ?>
    </div>

    <h1 class="article-title">
        <a href="article.php?id=<?php echo $article['id']; ?>">
            <?php echo $article['title']; ?>
        </a>
    </h1>

    <div class="article-text">
        <?php 
            if($articleDetail) {
                echo $article['text'];
            } else {
                echo substr($article['text'], 0, 200);
            } 
        ?>
    </div>
</article>
