<?php

require 'bootstrap.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$defaultData = [
    'title' => '',
    'text' => '',
    'email' => '',
    'author' => '',
    'date' => date('Y-m-d'),
];

$errors = [];
$success = false;

if (!empty($_POST)) {

    // Sanitize
    $data = [
        'title' => strip_tags(trim($_POST['title'])),
        'text' => strip_tags(trim($_POST['text'])),
        'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        'created' => time(),
        'date' => strtotime($_POST['date']),
    ];

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

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Ungültige E-Mail';
    }

    if (empty($errors)) {
        $jsonData = json_encode($data);

        if (!is_dir(DIRECTORY) && !is_writable(DIRECTORY)) {
            $errors['file'] = "Ups, ein fehler ist passiert";
        }

        if (empty($errors)) {

            $filename = sprintf("%s/%s-article.json", DIRECTORY, microtime(true));

            $fh = fopen($filename, 'wb');
            fwrite($fh, $jsonData);
            fclose($fh);

            $success = true;
            $data = $defaultData;
        }
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
                    E-Mail
                    <input
                        type="email"
                        name="email"
                        placeholder="test@example.com"
                        value="<?php echo $data['email']; ?>">
                </label>

                <label>
                    Autor
                    <select name="author">
                        <option value="0">Markus Raudaschl</option>
                        <option value="1">Manuel Wieser</option>
                    </select>
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

        <script src="scripts.js"></script>
    </body>
</html>
