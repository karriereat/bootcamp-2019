<?php 

require_once '../bootstrap.php';

$errors = []; 
$defaultData = [
    'email' => '',
    'password' => '',
];

if(isset($_SESSION['login']) && $_SESSION['login'] == true){
    header('location: /form.php');
    die();
}

if (!empty($_POST)) {

    // Sanitize
    $data = [
        'email' => trim($_POST['email']),
        'password' => $_POST['password'],
    ];

    $data = array_merge($defaultData, $data);

    // Validate

    if (empty($data['email'])) {
        $errors['email'] = 'Bitte Email angeben';
    }

    if (empty($data['password'])) {
        $errors['password'] = 'Bitte Password angeben';
    }

    if(empty($errors)){

        $user = getUserByEmail($connection, $data['email']);

        if($user){

            $passwordHash = $user['password_hash'];
            $validLogin = password_verify($data['password'], $passwordHash);

            if($validLogin){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
    
                header('location: /form.php');
                die();
            } else {
                $errors['login'] = "Email oder Passwort ist falsch";
            }
            
        } else {
            $errors['login'] = "Email oder Passwort ist falsch";
        }
    }
}

?>

<html>
    <head>
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include '../templates/header.php'; ?>
        <main class="page">
            <h1>Login</h1>
        
              <form method="post">

                <?php if (!empty($errors)): ?>
                    <ul class="errors">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

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
