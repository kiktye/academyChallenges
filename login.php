<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <meta name="Forms" author="Kiko Stojanov">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-image d-flex align-content-end flex-wrap"
        style="background-image: linear-gradient(rgba(255, 255, 255, 0.55), rgba(255, 255, 255, 0.55)), url('./img/betmen.jpg'); background-position: center; height: 50vh; padding: 0; opacity: 90%;">
        <div class="row" style=" width: inherit; margin: 0;">
            <div class="col-6">

            </div>

            <div class="col-6 text-right">
                <form action="loginForm.php" method="POST">
                    <h1 class="mb-3 text-right">Login form</h1>

                    <?php

                    $errorMsg = $_GET['errorMsg'] ?? "";

                    if (!empty($errorMsg)) {
                        echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
                    }

                    $userNotFound = $_GET['userNotFound'] ?? '';

                    if (!empty($userNotFound)) {
                        echo '<div class="alert alert-danger">' . $userNotFound . '</div>';
                    }

                    $usernameLogError = $_GET['usernameLog_error'] ?? '';
                    $passwordLogError = $_GET['passwordLog_error'] ?? '';

                    ?>

                    <div class="mb-3">
                        <input type="text" id="username" name="username" placeholder="Your username"
                        class="<?= $usernameLogError ? "form-control border border-danger" : "form-control" ?> ">
                        <p class="text-danger">
                            <?= $usernameLogError ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <input type="password" id="password" name="password" placeholder="Your password"
                        class="<?= $passwordLogError ? "form-control border border-danger" : "form-control" ?> ">
                        <p class="text-danger">
                            <?= $passwordLogError ?>
                        </p>
                    </div>

                    <button class="btn btn-outline-dark">Login</button>

                </form>
            </div>
            <div class="border-top mt-3 text-right"
                style="background: rgba(255, 255, 255, 0.8); width: 100%; margin: 0; padding: 5px 15px">
                <h4>Not a user? Sign up now!</h4>
                <a href="signUp.php" class="btn btn-outline-dark">Sign up</a>
            </div>
        </div>
    </div>
</body>

</html>