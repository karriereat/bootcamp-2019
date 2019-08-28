<?php

// Config
require_once '../bootstrap.php';

// Setup

if(!isLoggedIn()){
    header('location: /login.php');
    exit();
}

$authors = getAllUsers($connection);
$view['authors'] = $authors;
$view['user'] = $_SESSION['user'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $response = [
        'success' => false
    ];

    $status = 200;

    $data = [
        'title' => '',
        'date' => time(),
        'text' => '',
        'author' => '',
    ];

    try {
        $jsonData = parsePostJson();
        $data = array_merge($data, $jsonData);
    } catch(Exception $e){
        $errors['general'] = "Ungültige Daten";
        $status = 400;
    }

    if (empty($errors)) {

        // Sanitize

        $data['title'] = trim(filter_var($data['title'], FILTER_SANITIZE_STRIPPED | FILTER_SANITIZE_STRING));
        $data['date'] = strtotime($data['date']) ?? time();
        $data['text'] = trim(filter_var($data['text'], FILTER_SANITIZE_STRIPPED));
        $data['author'] = intval($data['author'] ?? null);

        // Validate

        if (empty($data['title'])) {
            $errors['title'] = "Bitte Titel angeben";
        }

        if ($data['date'] == 0) {
            $errors['date'] = "Bitte gültiges Datum angeben";
        }

        $author = getUserById($connection, $data['author']);
        if ($author == null) {
            $errors['author'] = "Bitte Author auswählen";
        }

        if (strlen($data['text']) <= 0) {
            $errors['text'] = "Bitte Text angeben";
        }

        if(!empty($errors)){
            $status = 400;
        }
    }


    // Store
    if (empty($errors)) {

        $id = saveArticle($connection,
            $data['title'],
            $data['text'],
            $data['author'],
            $data['date']
        );

        if($id != null) {

            $data['id'] = $id;
            $data['date'] = date(TIME_FORMAT, $data['date']);

            $response = [
                'success' => true,
                'data' => $data
            ];
        } else {
            $errors['general'] = SERVER_ERROR;
            $status = 500;
        }

    }

    if (!empty($errors)) {
        $response = [
            'success' => false,
            'errors' => $errors,
        ];
    }

    // Respond
    renderJson($response, $status);
    return;
} else {
    $view['date'] = time();
    view_render('form', $view);
}
