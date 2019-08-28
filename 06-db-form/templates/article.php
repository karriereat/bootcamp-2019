<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $view['article']['title']; ?></title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <main>
        <h1><span class="fancy-heading"><?php echo $view['article']['title']; ?></span></h1>
        <div>
            <span>am <?php echo view_date($view['article']['date']); ?></span>
            <span>
                Kategorie:
                <?php foreach ($view['article']['categories'] as $category): ?>
                    <a href="index.php?category=<?php echo $category['id']; ?>">
                        <?php echo $category['name']; ?>
                    </a>
                <?php endforeach; ?>
            </span>
        </div>

        <p><?php echo $view['article']['text']; ?></p>

        <span>
            Von:
            <a href="index.php?author=<?php echo $view['article']['author']['id']; ?>">
                <?php echo $view['article']['author']['username']; ?>
            </a>
        </span>
    </main>
</body>
</html>
