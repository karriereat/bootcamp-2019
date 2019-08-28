<?php


function getUserById(PDO $connection, int $userId)
{
    $user = null;

    $stmt = $connection->prepare('SELECT id, username FROM users WHERE id = ?');
    $stmt->execute([$userId]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row != null){
        $user = $row;
    }

    return $user;
}


function getUserByEmail(PDO $connection, string $email)
{
    $user = null;

    $stmt = $connection->prepare('SELECT id, username FROM users WHERE email = ?');
    $stmt->execute([$email]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row != null){
        $user = $row;
    }

    return $user;
}



function getAllUsers(PDO $connection)
{
    $users = [];

    $stmt = $connection->query('SELECT id, username FROM users ORDER BY username DESC');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $users[] = $row;
    }

    return $users;
}

function userExists(PDO $connection, string $email)
{
    $user = null;

    $stmt = $connection->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row != null){
        return true;
    }

    return false;
}

function createUser(PDO $connection, string $username, string $email, string $password){
    $stmt = $connection->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute([$username, $email, $hashedPassword]);
}


function isValidLogin(PDO $connection, string $email, string $password) : bool {
    $user = null;

    $stmt = $connection->prepare('SELECT id, username, password FROM users WHERE email = ?');
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user == null){
        return false;
    }

    $isValid = password_verify($password, $user['password']);

    if($isValid == true){
        return true;
    }

    return false;
}
