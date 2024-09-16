<?php

require_once('./Classes/VehicleData.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regNumber = $_POST['searchReg'];

    // var_dump($regNumber);

    $vehicleDataObject = new VehicleData();
    $regNumberData = $vehicleDataObject->findRegistrationNumber();

    // var_dump($regNumberData);

    if ($regNumberData['registration_number'] === $regNumber) {
        return header('Location: vehicleSearch.php?regNumber=' . $regNumber);
    } else {
        return header('Location: index.php?errorMsg=Vehicle%20not%20found.');
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
            <a href="index.php" class="navbar-brand">Vehicle Registration</a>
            
            <a href="./Admin/adminLogin.php" class="btn btn-outline-success">Login</a>
        </div>
    </nav>

    <main>
        <div class="container text-center bg-info mt-5 p-5">
            <h2>Vehicle Registration</h2>
            <h6>Enter your registration number to check its validity.</h6>

            <?php

            $errorMsg = $_GET['errorMsg'] ?? '';

            if (!empty($errorMsg)) {
                echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
            }

            ?>

            <form method="POST">
                <input type="text" name="searchReg" id="searchReg" class="form-control my-3" placeholder="Search registration number">
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </main>


</body>

</html>