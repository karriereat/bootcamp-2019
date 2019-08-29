<?php

require_once '../bootstrap.php';

unset($_SESSION['login']);
unset($_SESSION['user']);

header('location: /login.php');