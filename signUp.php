<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <meta name="Forms" author="Kiko Stojanov">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-image d-flex align-content-end flex-wrap"
        style="background-image: linear-gradient(rgba(255, 255, 255, 0.55), rgba(255, 255, 255, 0.55)), url('./img/betmen.jpg'); background-position: center; height: 50vh; padding: 0; opacity: 90%;">
        <div class="row" style=" width: inherit; margin: 0;">
            <div class="col-6">
                <form action="signUpForm.php" method="POST">
                    <h1 class="mb-3">Sign up form</h1>

                    <?php

                    $errorMsg = $_GET['errorMsg'] ?? "";

                    if (!empty($errorMsg)) {
                        echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
                    }

                    $usernameError = $_GET['username_error'] ?? '';
                    $uniqueUsername = $_GET['uniqueUsername_error'] ?? '';
                    $passwordError = $_GET['password_error'] ?? '';
                    $emailError = $_GET['email_error'] ?? '';
                    $uniqueEmail = $_GET['uniqueEmail_error'] ?? '';

                    $usernameEmpty = $_GET['usernameEmpty_error'] ??''; 
                    $passwordEmpty = $_GET['passwordEmpty_error'] ??'';
                    $emailEmpty = $_GET['emailEmpty_error'] ??'';

                    ?>

                    <div class="mb-3">
                        <input type="text" id="username" name="username" placeholder="Your username"
                            class=" <?= $usernameError ? "form-control border border-danger" : "form-control" ?> <?= $uniqueUsername ? "form-control border border-danger" : "form-control" ?>">

                        <span class="text-danger">
                            <?= $usernameError ?>
                        </span>
                        <span class="text-danger">
                            <?= $uniqueUsername ?>
                        </span>

                    </div>

                    <div class="mb-3">
                        <input type="password" id="password" name="password" placeholder="Your password"
                            class="<?= $passwordError ? "form-control border border-danger" : "form-control" ?> ">
                        <span class="text-danger">
                            <?= $passwordError ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <input type="email" id="email" name="email" placeholder="Email"
                            class="<?= $emailError ? "form-control border border-danger" : "form-control" ?>  <?= $uniqueEmail ? "form-control border border-warning" : "form-control" ?>">
                        <span class="text-danger">
                            <?= $emailError ?>
                        </span>
                        <span class="text-warning">
                            <?= $uniqueEmail ?>
                        </span>
                    </div>

                    <button class="btn btn-outline-dark">Sign up</button>
                </form>

            </div>
            <div class="border-top mt-3"
                style="background: rgba(255, 255, 255, 0.8); width: 100%; margin: 0; padding: 5px 15px">
                <h4>Already a user? Login now!</h4>
                <a href="login.php" class="btn btn-outline-dark">Login</a>
            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
</body>

</html>