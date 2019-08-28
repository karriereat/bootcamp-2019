<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Artikel anlegen</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <main>
        <h1><span class="fancy-heading">Create User</span></h1>

        <form method="post">
            <label>
                <span class="form-label">Username</span>
                <input class="form-element"
                       type="text" name="username" placeholder="Max Musterman"
                       value=""/>
            </label>

            <label>
                <span class="form-label">E-Mail-Adresse</span>
                <input class="form-element"
                       type="text" name="email" placeholder="test@example.com"
                       value=""/>
            </label>

            <label>
                <span class="form-label">Passwort</span>
                <input class="form-element"
                       type="password" name="password" placeholder="Passwort"
                       value=""/>
            </label>

            <button class="form-element" type="submit">Speichern</button>
        </form>
    </main>
</body>
</html>
