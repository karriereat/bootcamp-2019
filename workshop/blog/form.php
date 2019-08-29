<?php

require 'bootstrap.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$defaultData = [
    'title' => '',
    'text' => '',
    'user_id' => 1,
    'date' => date('Y-m-d'),
];

$errors = [];
$success = false;

if (!empty($_POST)) {

    // Sanitize
    $data = [
        'title' => strip_tags(trim($_POST['title'])),
        'text' => strip_tags(trim($_POST['text'])),
        'created' => time(),
        'date' => strtotime($_POST['date']),
    ];

    $data = array_merge($defaultData, $data);

    // Validate

    if (empty($data['title'])) {
        $errors['title'] = 'Bitte Titel angeben';
    }

    if (empty($data['text'])) {
        $errors['text'] = 'Bitte Text angeben';
    }

    if ($data['date'] == false) {
        $errors['date'] = 'Bitte Datum angeben';
    }

    if (empty($errors)) {
        saveArticle($connection, $data['title'], $data['text'], $data['date'], $data['user_id']);
        header('location: /articles.php');
    }
} else {
    $data = $defaultData;
}

?>

<html>
    <head>
        <title>Neuen Artikel anlegen</title>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main class="page">
            <h1>Neuen Artikel anlegen</h1>

            <form action="" method="post">

                <?php if ($success == true): ?>
                    <div class="success">
                        Artikel erfolgreich erstellt.
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <ul class="errors">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label>
                    Titel
                    <input
                        type="text"
                        name="title"
                        placeholder="Mein Artikel"
                        value="<?php echo $data['title']; ?>">
                </label>

                <label>
                    Datum
                    <input
                        type="date"
                        name="date"
                        value="<?php echo $data['date']; ?>">
                </label>

                <label>
                    Text
                    <textarea
                        name="text"
                        placeholder="Hallo …"><?php echo $data['text']; ?></textarea>
                </label>

                <button>Neuen Artikel erstellen</button>

            </form>
        </main>

        <script src="/js/errors.js"></script>
        <script src="/js/form.js"></script>
    </body>
</html>
