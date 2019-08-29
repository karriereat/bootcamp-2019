<?php

require_once '../bootstrap.php';

$errors = [];
$postdata = file_get_contents('php://input');
$data = json_decode($postdata, true);

if(json_last_error()){
    $errors[] = 'Es ist ein fehler aufgetreten';
}

if(empty($errors)){
    $defaultData = [
        'article_id' => 0,
        'name' => '',
        'comment' => '',
    ];
    
    $data = array_merge($defaultData, $data);
    
    $data = [
        'article_id' => intval($data['article_id']),
        'name' => strip_tags(trim($data['name'])),
        'comment' => strip_tags(trim($data['comment'])),
    ];
    
    if($data['article_id'] == 0){
        $errors[] = 'Es ist ein fehler aufgetreten';
    }
    
    if(empty($data['name'])){
        $errors['name'] = 'Bitte Namen eingeben';
    }
    
    if(empty($data['comment'])){
        $errors['comment'] = 'Bitte Kommentar eingeben';
    }
    
    if(empty($errors)){
        saveComment($connection, $data['article_id'], $data['name'], $data['comment']);
    }
}

header('content-type: application/json');

$response = [
    'errors' => $errors,
];

echo json_encode($response);