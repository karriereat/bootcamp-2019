<?php

// Config
require_once '../bootstrap.php';


if(isLoggedIn()){
    header('location: form.php');
}

$data = [
    'email' => '',
    'password' => '',
];

$errors = [];

if(!empty($_POST)){

    // Sanitize

    $data = [
        'email' => trim($_POST['email']),
        'password' => $_POST['password'],
    ];

    // Validate

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Bitte gültige E-Mail-Adresse angeben";
    }

    if (empty($data['password'])) {
        $errors['password'] = "Bitte Passwort eingeben";
    }

    // Login
    if (empty($errors)) {

        $isValid = isValidLogin($connection, $data['email'], $data['password']);

        if(!$isValid){
            $errors['general'] = "E-Mail oder Passwort ist falsch";
        } else {

            $user = getUserByEmail($connection, $data['email']);
            login($user);
            header('location: /form.php');
            return;
        }
    }


    $data['password'] = '';
}

$view['errors'] = $errors;
$view['data'] = $data;

view_render('login', $view);

