<?php

require_once 'config.php';
require_once 'functions.php';

$pdoOptions =  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

$connection = new PDO(sprintf( 'mysql:host=%s;dbname=%s', DB_HOST, DB_NAME), DB_USER, DB_PASS, $pdoOptions);
