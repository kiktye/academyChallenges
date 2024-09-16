<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return header('Location: signUp.php?errorMsg=Please%20submit%20the%20form%20again.');
}


$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

include_once('validation.php');

$errors = [];



if (!validateUsername($username)) {
    $errors['username_error'] = 'Username cannot contain empty spaces or special signs.';
}

if (!uniqueUsername($username)) {
    $errors['uniqueUsername_error'] = 'Username already exists.';
}


if (!validatePassword($password)) {
    $errors['password_error'] = 'Password must have at least one number, one special sign and one uppercase letter.';
}

if (!validateEmail($email)) {
    $errors['email_error'] = 'Enter a valid email (Email must have at least 5 characters before @)';
}

if (!uniqueEmail($email)) {
    $errors['uniqueEmail_error'] = 'A user with this email already exists.';
}


if (!empty($errors)) {
    return header('Location: signUp.php?' . http_build_query($errors));
}


$registeredUser = "$email,$username=" . password_hash($password, PASSWORD_DEFAULT);

// file_put_contents();

if (file_put_contents('users.txt', $registeredUser . PHP_EOL, FILE_APPEND)) {
    header('Location: welcome.php?newUser=' . $username);
}


?>