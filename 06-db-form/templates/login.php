<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel anlegen</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <main>
        <h1><span class="fancy-heading">Login</span></h1>

        <form method="post">
            <ul class="errors">
                <?php foreach ($view['errors'] as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
            <label>
                <span class="form-label">E-Mail-Adresse</span>
                <input class="form-element"
                       type="text" name="email" placeholder="test@example.com"
                       value="<?php echo $view['data']['email']; ?>"/>
            </label>

            <label>
                <span class="form-label">Passwort</span>
                <input class="form-element"
                       type="password" name="password" placeholder="Passwort"
                       value=""/>
            </label>

            <button class="form-element" type="submit">Login</button>
        </form>
    </main>
</body>
</html>
