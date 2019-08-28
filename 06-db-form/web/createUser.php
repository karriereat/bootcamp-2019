<?php

/* WARNING! THIS IS A TEST FILE. DO NOT DEPLOY THIS TO PRODUCTION ENVIRONMENT! */

// Config
require_once '../bootstrap.php';


if(!empty($_POST)){
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);

    if(!empty($username) && !empty($password) && !empty($email)){
         if(!userExists($connection, $email)){
             createUser($connection, $username, $email, $password);
         }
    }
}

view_render('createUser', []);


