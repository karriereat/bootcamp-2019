<?php

use Bootcamp\App;

require_once 'vendor/autoload.php';
$config = require_once 'config.php';

if($config['environment'] != 'dev'){
    set_exception_handler ("renderError500");
    set_error_handler("renderError500");
}

if($config['environment'] != 'prod'){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

session_start();

//mysql:host=localhost;dbname=mydb
$dsn = sprintf('mysql:host=%s;dbname=%s', $config['db']['host'], $config['db']['name']);
$pdoOptions =  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

$connection = null;

try {
    $connection = new PDO($dsn, $config['db']['user'], $config['db']['password'], $pdoOptions);

} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$app = new App();
$app->config = $config;
$app->db = $connection;

return $app;
