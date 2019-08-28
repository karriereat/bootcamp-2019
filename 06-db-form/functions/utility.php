<?php

function view_date(int $timestamp){
    return date(TIME_FORMAT, $timestamp);
}

function view_render(string $template, array $view = []){
    include TEMPLATE_PATH . sprintf('/%s.php', basename($template));
}

function renderError404(){
    http_response_code(404);
    view_render('404');
}

function renderError500(){
    http_response_code(500);
    view_render('500');
}

function parsePostJson() : array {
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    if(json_last_error() != JSON_ERROR_NONE){
        throw new Exception(json_last_error_msg());
    }

    return $data;
}

function renderJson($response, int $status = 202) {
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($response);
}

function isXhr(){
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }

    return false;
}

function login(array $user){
    $_SESSION['login'] = true;
    $_SESSION['user'] = $user;
}

function logout(){
    unset($_SESSION['login']);
    unset($_SESSION['user']);
}

function isLoggedIn(){
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        return true;
    }

    return false;
}
