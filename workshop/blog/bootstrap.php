<?php

require_once 'config.php';
require_once 'functions.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$pdoOptions =  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

$connection = new PDO(sprintf( 'mysql:host=%s;dbname=%s', DB_HOST, DB_NAME), DB_USER, DB_PASS, $pdoOptions);
