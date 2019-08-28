<?php

require_once 'config.php';
require_once 'functions/utility.php';
require_once 'functions/db_categories.php';
require_once 'functions/db_users.php';
require_once 'functions/db_articles.php';


if(ENVIRONMENT != ENV_DEV){
    set_exception_handler ("renderError500");
    set_error_handler("renderError500");
}

if(ENVIRONMENT != ENV_PROD){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

session_start();


//mysql:host=localhost;dbname=mydb
$dsn = sprintf('mysql:host=%s;dbname=%s', DATABASE['host'], DATABASE['name']);
$pdoOptions =  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

$connection = null;

try {
    $connection = new PDO($dsn, DATABASE['user'], DATABASE['password'], $pdoOptions);

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

