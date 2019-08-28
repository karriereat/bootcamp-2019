<?php

require_once 'config.php';

$articleDir = scandir(ARTICLE_DIRECTORY);

$id = $_GET['id'] ?? null;

$filename = sprintf('%s.json', $id);

$article = null;
if (in_array($filename, $articleDir)) {
    $data = json_decode(file_get_contents(ARTICLE_DIRECTORY . $filename), true);
    if ($data != null) {
        $article = $data;
    }
}


$view['article'] = $article;
if($article != null){
    $view['author'] = AUTHORS[$article['author']];
} else {
    http_response_code(404);
}


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $view['article'] ? $view['article']['title'] : 'Artikel nicht gefunden'; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <?php if ($view['article']): ?>
            <h1>
                <span class="fancy-heading">
                    <?php echo $view['article']['title']; ?>
                </span>
            </h1>
            <p>
                <strong><?php echo $view['author']; ?></strong>
                am
                <em><?php echo Date('d.m.Y', $view['article']['date']); ?></em>
            </p>
            <p>
                <?php echo $view['article']['text']; ?>
            </p>
        <?php else: ?>
            <h1><span class="fancy-heading">Artikel nicht gefunden</span></h1>
        <?php endif; ?>
    </main>
</body>
</html>
