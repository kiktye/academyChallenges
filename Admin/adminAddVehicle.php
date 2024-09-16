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
            <a href="./adminLogout.php" class="btn btn-outline-success">Logout</a>
        </div>
    </nav>

    <main>
        <div class="container text-center bg-info mt-5 p-5">
            <h2>Vehicle Registration</h2>

            <?php

            $errorMsg = $_GET['errorMsg'] ?? '';
            $errorMsg2 = $_GET['errorMsg2'] ?? '';

            if (!empty($errorMsg)) {
                echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
            }

            
            if (!empty($errorMsg2)) {
                echo '<div class="alert alert-danger">' . $errorMsg2 . '</div>';
            }

            ?>

            <h6>Vehicle not available? Add it here!</h6>
            <form action="./addVehScript.php" method="POST">
                <input type="text" name="addVehicle" id="addVehicle" class="form-control my-3" placeholder="Enter desired Vehicle Model">
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </main>
</body>

</html>