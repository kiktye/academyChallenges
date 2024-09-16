<?php

require_once('./Classes/VehicleData.php');

$vehicleDataObject = new VehicleData();
$vehicleData = $vehicleDataObject->findVehicle();

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
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">vehicle model</th>
                        <th scope="col">vehicle type</th>
                        <th scope="col">vehicle chassis number</th>
                        <th scope="col">vehicle production year</th>
                        <th scope="col">registration number</th>
                        <th scope="col">fuel type</th>
                        <th scope="col">registration to</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $vehicleData['vehicle_model'] ?></td>
                        <td><?= $vehicleData['vehicle_type'] ?></td>
                        <td><?= $vehicleData['vehicle_chassis_number'] ?></td>
                        <td><?= $vehicleData['vehicle_production_year'] ?></td>
                        <td><?= $vehicleData['registration_number'] ?></td>
                        <td><?= $vehicleData['fuel_type'] ?></td>
                        <td><?= $vehicleData['registration_to'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>


</body>

</html>