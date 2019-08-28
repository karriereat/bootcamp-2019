<?php

// Config
require_once 'config.php';

// Setup


$data = [
    'title' => '',
    'date' => time(),
    'text' => '',
    'author' => array_keys(AUTHORS)[0],
    'email' => '',
    'create-date' => time()
];

$errors = [];
$success = false;

// Check for request
if (!empty($_POST)) {

    // Sanitize

    $data['title'] = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRIPPED | FILTER_SANITIZE_STRING));
    $data['date'] = strtotime($_POST['date']) ?? time();
    $data['text'] = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRIPPED));
    $data['author'] = intval($_POST['author'] ?? null);
    $data['email'] = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    // Validate

    if (empty($data['title'])) {
        $errors['title'] = "Bitte Titel angeben";
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Bitte gültige E-Mail-Adresse angeben";
    }

    if ($data['date'] == 0) {
        $errors['date'] = "Bitte gültiges Datum angeben";
    }

    if (!array_key_exists($data['author'], AUTHORS)) {
        $errors['author'] = "Bitte Author auswählen";
    }

    if (strlen($data['text']) <= 0) {
        $errors['text'] = "Bitte Text angeben";
    }

    // Store
    if (empty($errors)) {

        if(!is_dir(ARTICLE_DIRECTORY) || !is_writable(ARTICLE_DIRECTORY)){
            $errors['general'] = SERVER_ERROR;
        } else {

            $file = ARTICLE_DIRECTORY . sprintf('%s-%s.json', date('Y-m-d'), sha1(microtime(true)));

            $fp = fopen($file,"wb");
            if($fp) {
                fwrite($fp, json_encode($data));
                fclose($fp);
                $success = true;
            } else {
                $errors['general'] = SERVER_ERROR;
            }
        }

    }
}

$view['data'] = $data;
$view['authors'] = AUTHORS;
$view['success'] = $success;
$view['errors'] = $errors;

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel anlegen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <?php if (!$view['success']): ?>
            <h1><span class="fancy-heading">Artikel anlegen</span></h1>

            <form method="post">
                <?php if (!empty($view['errors'])): ?>
                    <ul class="errors">
                        <?php foreach($view['errors'] as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label>
                    <span class="form-label">Titel</span>
                    <input class="form-element"
                           type="text" name="title" placeholder="Titel"
                           value="<?php echo $view['data']['title']; ?>"/>
                </label>

                <label>
                    <span class="form-label">Datum</span>
                    <input class="form-element"
                           type="date" name="date" placeholder="Datum"
                           value="<?php echo !empty($view['data']['date']) ? date('Y-m-d', $view['data']['date']) : ''; ?>"/>
                </label>

                <label >
                    <span class="form-label">Autor</span>
                    <select class="form-element" name="author">
                        <?php foreach ($view['authors'] as $id => $author): ?>
                            <option value="<?php echo $id; ?>"
                                    <?php if ($id == $view['data']['author']): ?>selected<?php endif ?>>
                                <?php echo $author; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <label>
                    <span class="form-label">E-Mail-Adresse</span>
                    <input class="form-element"
                           type="text" name="email" placeholder="test@example.com"
                           value="<?php echo $view['data']['email']; ?>"/>
                </label>

                <label>
                    <span class="form-label">Text</span>
                    <textarea
                        class="form-element"
                        name="text"
                        placeholder="Es war einmal …"
                    ><?php echo $view['data']['text']; ?></textarea>
                </label>

                <button class="form-element" type="submit">Speichern</button>
            </form>
        <?php else: ?>
            <h1><span class="fancy-heading">Artikel gespeichert</span></h1>
            <a href="">Neuen Artikel anlegen?</a>
        <?php endif; ?>
    </main>

    <script>
        const form = document.querySelector('form');

        function clearErrors() {
            const errors = document.querySelector('.errors');
            if (errors) {
                errors.parentNode.removeChild(errors);
            }
        }

        function showErrors(errors) {
            const list = document.createElement('ul');
            list.classList.add('errors');
            form.insertAdjacentElement('afterbegin', list);

            errors.forEach((error) => {
                const item = document.createElement('li');
                item.innerHTML = error;
                list.insertAdjacentElement('beforeend', item);
            })
        }

        function validateForm(event) {
            event.preventDefault();

            clearErrors();

            const title = document.querySelector('[name="title"]');
            const email = document.querySelector('[name="email"]');
            const text = document.querySelector('[name="text"]');

            const errors = [];

            if (!title.value.length) {
                errors.push('Bitte Titel angeben');
            }

            if (!email.value.includes('@')) {
                errors.push('Bitte gültige E-Mail-Adresse angeben');
            }

            if (!text.value.length) {
                errors.push('Bitte Text angeben');
            }

            if (errors.length) {
                showErrors(errors);
            }
        }

        form.addEventListener('submit', validateForm);
    </script>
</body>
</html>
