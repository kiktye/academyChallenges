<?php

session_start();

require_once (__DIR__ . '/../Database/Connection.php');
require_once (__DIR__ . '/../Classes/Admin.php');
use Database\Connection as Connection;
use Admin\Admin as Admin;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $adminConnection = new Admin();
    $admin = $adminConnection->findAdmin($username);

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            $_SESSION['loggedIn'] = true;
            return header('Location: adminDashboard.php');
        } elseif ($username !== $admin['username'] OR $password !== $admin['password']) {
            return header ('Location: adminLogin.php?errorMsg2=Username%20and%20password%20do%20not%20match.');
        } else {
            return header('Location: adminLogin.php?errorMsg=Unknown%20credentials.');
        }
    }  
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar bg-light">
        <div class="container-fluid">
        <a href="../index.php" class="navbar-brand">Vehicle Registration</a>
        </div>
    </nav>

    <main>

        <div class="container text-center bg-info mt-5 p-5">

            <?php

            $errorMsg = $_GET['errorMsg'] ?? '';
            $errorMsg2 = $_GET['errorMsg2'] ?? '';
            $errorLog = $_GET['errorLog'] ?? '';
            
            if (!empty($errorLog)) {
                echo '<div class="alert alert-danger">' . $errorLog . '</div>';
            }

            if (!empty($errorMsg)) {
                echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
            }

            if (!empty($errorMsg2)) {
                echo '<div class="alert alert-danger">' . $errorMsg2 . '</div>';
            }

            ?>

            <h2>Enter your Admin Credentials</h2>
            <form method="POST">
                <input type="text" name="username" id="username" class="form-control my-3" placeholder="Your Username">
                <input type="password" name="password" id="password" class="form-control my-3" placeholder="Your Password">

                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>
    </main>


</body>

</html>