<?php

session_start();

if ($_SESSION['loggedIn'] !== true) {
    return header('Location: adminLogin.php?errorLog=You%20have%20no%20access.');
} 

require_once(__DIR__ . '/../Classes/VehicleData.php');

$vehicleDataObject = new VehicleData();

$fuelTypes = $vehicleDataObject->getFuelData();
$vehicleTypes = $vehicleDataObject->getVehicleTypeData();
$vehicleModels = $vehicleDataObject->getVehicleModelsData();

$brands = array_unique(array_column($vehicleModels, 'vehicle_models'));

$allVehicleData = $vehicleDataObject->findAllVehicles();

$searchVehicleData = $_SESSION['searchVehicle'] ?? '';
$searchVehicleBool = $_GET['searchVehicle'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .form-control-two {
            display: block;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">Vehicle Registration</a>
            <a href="./adminLogout.php" class="btn btn-outline-success">Logout</a>
        </div>
    </nav>

    <main name="vehicleRegister">
        <div class="container text-center">
            <h2>Vehicle Registration</h2>
            <?php

            $errorChassis = $_GET['errorChassis'] ?? '';
            $errorReg = $_GET['errorReg'] ?? '';
            $empty = $_GET['empty'] ?? '';
            $successMsg = $_GET['successMsg'] ?? '';
            $successMsg2 = $_GET['successMsg2'] ?? '';

            if (!empty($successMsg2)) {
                echo '<div class="alert alert-success">' . $successMsg2 . '</div>';
            }

            if (!empty($successMsg)) {
                echo '<div class="alert alert-success">' . $successMsg . '</div>';
            }

            if (!empty($errorChassis)) {
                echo '<div class="alert alert-danger">' . $errorChassis . '</div>';
            }

            if (!empty($errorReg)) {
                echo '<div class="alert alert-danger">' . $errorReg . '</div>';
            }

            if (!empty($empty)) {
                echo '<div class="alert alert-danger">' . $empty . '</div>';
            }

            ?>
            <form action="../storeVehicleData.php" method="POST" class="d-flex justify-content-center">

                <div class="formGroupOne m-4">
                    <div class="form-group">
                        <label for="vehModel">Vehicle Model</label>
                        <select class="form-control" id="vehicle_model" name="vehicle_model">
                            <option value="" disabled selected hidden>Select vehicle model</option>

                            <?php

                            foreach ($brands as $brand) {
                                echo '<option>' . $brand . '</option>';
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehType">Vehicle Type</label>
                        <select class="form-control" id="vehicle_type" name="vehicle_type">
                            <option value="" selected hidden disabled>Select vehicle type</option>
                            <option><?= $vehicleTypes[0]['vehicle_types'] ?></option>
                            <option><?= $vehicleTypes[1]['vehicle_types'] ?></option>
                            <option><?= $vehicleTypes[2]['vehicle_types'] ?></option>
                            <option><?= $vehicleTypes[3]['vehicle_types'] ?></option>
                            <option><?= $vehicleTypes[4]['vehicle_types'] ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="chassis">Vehicle Chassis Number</label>
                        <input type="text" class="form-control" id="vehicle_chassis_number" name="vehicle_chassis_number" placeholder="ex: wz2am6">
                    </div>

                    <div class="form-group">
                        <label for="vehProductionDate">Vehicle Production Date</label>
                        <input type="date" class="form-control" id="vehicle_production_year" name="vehicle_production_year">
                    </div>
                </div>

                <div class="formGroupTwo m-4">
                    <div class="form-group">
                        <label for="regNumber">Registration Number</label>
                        <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="ex: SR9009AD">
                    </div>

                    <div class="form-group">
                        <label for="fuelType">Fuel Type</label>
                        <select class="form-control" id="fuel_type" name="fuel_type">
                            <option value="" selected hidden disabled>Select fuel type</option>
                            <option><?= $fuelTypes[0]['fuel_types'] ?></option>
                            <option><?= $fuelTypes[1]['fuel_types'] ?></option>
                            <option><?= $fuelTypes[2]['fuel_types'] ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehRegistrationDate">Vehicle Registration To</label>
                        <input type="date" class="form-control" id="registration_to" name="registration_to">
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <a class="mx-3" href="adminAddVehicle.php">Add new vehicle model</a>

    <hr>

    <form action="adminSearchVehicle.php" method="POST" class="d-flex">
        <input type="text" name="searchVehicle" id="searchVehicle" class="form-control-two mx-3" placeholder="Search vehicle">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <main name="table">
        <div class="container-fluid mt-5">
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($searchVehicleBool && !empty($searchVehicleData)) {
                        foreach ($searchVehicleData as $search) {

                            $currentDate = date('Y-m-d');
                            $regDate = $search['registration_to'];

                            $difference = strtotime($regDate) - strtotime($currentDate);
                            $daysToExpire = floor($difference / (60 * 60 * 24));

                            if ($daysToExpire < 0) {
                                echo '<tr >
                                    <th scope="row" >' . $search['id'] . '</th>
                                    <td class="text-danger">' . $search['vehicle_model'] . '</td>
                                    <td class="text-danger">' . $search['vehicle_type'] . '</td>
                                    <td class="text-danger">' . $search['vehicle_chassis_number'] . '</td>
                                    <td class="text-danger">' . $search['vehicle_production_year'] . '</td>
                                    <td class="text-danger">' . $search['registration_number'] . '</td>
                                    <td class="text-danger">' . $search['fuel_type'] . '</td>
                                    <td class="text-danger">' . $search['registration_to'] . '</td>
                                    <td class="d-flex">
        
                                    <form action="adminDeleteVehicle.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="vehicle_id" value="' . $search['id'] . '">
                                    <button class="btn btn-danger mx-1" type="submit">Delete</button></form>
        
                                    <a href="adminEdit.php?id=' . $search['id'] . '" class="btn btn-warning mx-1">Edit</a>
                                    <a href="adminExtendRegistration.php?id=' . $search['id'] . '" class="btn btn-success mx-1">Extend</a>';
                            } elseif ($daysToExpire <= 30) {
                                echo '<tr>
                                    <th scope="row">' . $search['id'] . '</th>
                                    <td class="text-warning">' . $search['vehicle_model'] . '</td>
                                    <td class="text-warning">' . $search['vehicle_type'] . '</td>
                                    <td class="text-warning">' . $search['vehicle_chassis_number'] . '</td>
                                    <td class="text-warning">' . $search['vehicle_production_year'] . '</td>
                                    <td class="text-warning">' . $search['registration_number'] . '</td>
                                    <td class="text-warning">' . $search['fuel_type'] . '</td>
                                    <td class="text-warning">' . $search['registration_to'] . '</td>
                                    <td class="d-flex"> 
        
                                    <form action="adminDeleteVehicle.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="vehicle_id" value="' . $search['id'] . '">
                                    <button class="btn btn-danger mx-1" type="submit">Delete</button></form>
        
                                    
                                    <a href="adminEdit.php?id=' . $search['id'] . '" class="btn btn-warning mx-1">Edit</a>
        
                                    <a href="adminExtendRegistration.php?id=' . $search['id'] . '" class="btn btn-success mx-1">Extend</a>';
                            } else {
                                echo '<tr>
                                    <th scope="row">' . $search['id'] . '</th>
                                    <td >' . $search['vehicle_model'] . '</td>
                                    <td>' . $search['vehicle_type'] . '</td>
                                    <td>' . $search['vehicle_chassis_number'] . '</td>
                                    <td>' . $search['vehicle_production_year'] . '</td>
                                    <td>' . $search['registration_number'] . '</td>
                                    <td>' . $search['fuel_type'] . '</td>
                                    <td>' . $search['registration_to'] . '</td>
                                    <td class="d-flex"> 
        
                                    <form action="adminDeleteVehicle.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="vehicle_id" value="' . $search['id'] . '">
                                    <button class="btn btn-danger mx-1" type="submit">Delete</button></form>
        
                                    <a href="adminEdit.php?id=' . $search['id'] . '" class="btn btn-warning mx-1">Edit</a>';
                            }
                        }
                    } else {
                        foreach ($allVehicleData as $vehicleData) {

                            $currentDate = date('Y-m-d');
                            $regDate = $vehicleData['registration_to'];

                            $difference = strtotime($regDate) - strtotime($currentDate);
                            $daysToExpire = floor($difference / (60 * 60 * 24));

                            if ($daysToExpire < 0) {
                                echo '<tr >
                                    <th scope="row" >' . $vehicleData['id'] . '</th>
                                    <td class="text-danger">' . $vehicleData['vehicle_model'] . '</td>
                                    <td class="text-danger">' . $vehicleData['vehicle_type'] . '</td>
                                    <td class="text-danger">' . $vehicleData['vehicle_chassis_number'] . '</td>
                                    <td class="text-danger">' . $vehicleData['vehicle_production_year'] . '</td>
                                    <td class="text-danger">' . $vehicleData['registration_number'] . '</td>
                                    <td class="text-danger">' . $vehicleData['fuel_type'] . '</td>
                                    <td class="text-danger">' . $vehicleData['registration_to'] . '</td>
                                    <td class="d-flex">
        
                                    <form action="adminDeleteVehicle.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="vehicle_id" value="' . $vehicleData['id'] . '">
                                    <button class="btn btn-danger mx-1" type="submit">Delete</button></form>
        
                                    <a href="adminEdit.php?id=' . $vehicleData['id'] . '" class="btn btn-warning mx-1">Edit</a>
                                    <a href="adminExtendRegistration.php?id=' . $vehicleData['id'] . '" class="btn btn-success mx-1">Extend</a>';
                            } elseif ($daysToExpire <= 30) {
                                echo '<tr>
                                    <th scope="row">' . $vehicleData['id'] . '</th>
                                    <td class="text-warning">' . $vehicleData['vehicle_model'] . '</td>
                                    <td class="text-warning">' . $vehicleData['vehicle_type'] . '</td>
                                    <td class="text-warning">' . $vehicleData['vehicle_chassis_number'] . '</td>
                                    <td class="text-warning">' . $vehicleData['vehicle_production_year'] . '</td>
                                    <td class="text-warning">' . $vehicleData['registration_number'] . '</td>
                                    <td class="text-warning">' . $vehicleData['fuel_type'] . '</td>
                                    <td class="text-warning">' . $vehicleData['registration_to'] . '</td>
                                    <td class="d-flex"> 
        
                                    <form action="adminDeleteVehicle.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="vehicle_id" value="' . $vehicleData['id'] . '">
                                    <button class="btn btn-danger mx-1" type="submit">Delete</button></form>
        
                                    
                                    <a href="adminEdit.php?id=' . $vehicleData['id'] . '" class="btn btn-warning mx-1">Edit</a>
        
                                    <a href="adminExtendRegistration.php?id=' . $vehicleData['id'] . '" class="btn btn-success mx-1">Extend</a>';
                            } else {
                                echo '<tr>
                                    <th scope="row">' . $vehicleData['id'] . '</th>
                                    <td >' . $vehicleData['vehicle_model'] . '</td>
                                    <td>' . $vehicleData['vehicle_type'] . '</td>
                                    <td>' . $vehicleData['vehicle_chassis_number'] . '</td>
                                    <td>' . $vehicleData['vehicle_production_year'] . '</td>
                                    <td>' . $vehicleData['registration_number'] . '</td>
                                    <td>' . $vehicleData['fuel_type'] . '</td>
                                    <td>' . $vehicleData['registration_to'] . '</td>
                                    <td class="d-flex"> 
        
                                    <form action="adminDeleteVehicle.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="vehicle_id" value="' . $vehicleData['id'] . '">
                                    <button class="btn btn-danger mx-1" type="submit">Delete</button></form>
        
                                    <a href="adminEdit.php?id=' . $vehicleData['id'] . '" class="btn btn-warning mx-1">Edit</a>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>


</body>

</html>