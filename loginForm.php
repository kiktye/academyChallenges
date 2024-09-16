<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return header('Location: login.php?errorMsg=Please%20log%20in%20again.');
}

$username = $_POST['username'];
$password = $_POST['password'];

$users = explode(PHP_EOL, file_get_contents('users.txt'));

$error = [];

if (empty($username)) {
    $error['usernameLog_error'] = 'Username is required to log in.';
}

if (empty($password)) {
    $error['passwordLog_error'] = 'Password is required to log in.';
}

if (!empty($error)) {
    return header('Location: login.php?' . http_build_query($error));
}


foreach ($users as $user) {
    $userData = preg_split('/(:|,|\*|=)/', $user, -1, PREG_SPLIT_NO_EMPTY);

    if ($userData[1] === $username && password_verify($password, $userData[2])) {
        return header('Location: welcome.php?activeUser=' . $username);
    }
}
return header('Location: login.php?userNotFound=Wrong%20username/password%20combination.');




?>