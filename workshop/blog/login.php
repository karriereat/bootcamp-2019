<?php 

require 'bootstrap.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_POST)) {
    // Login ...
}

?>

<html>
    <head>
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main class="page">
            <h1>Login</h1>
            <form method="post">
                <label>
                    E-Mail
                    <input type="email" name="email">
                </label>
                <label>
                    Passwort
                    <input type="password" name="password">
                </label>
                <input type="submit" value="Anmelden">
            </form>
        </main>
    </body>
</html>
