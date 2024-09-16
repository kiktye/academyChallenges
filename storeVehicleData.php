<?php

require_once(__DIR__ . '/Database/Connection.php');
require_once('./Classes/VehicleData.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$vehicleDataObject = new VehicleData();
$vehicleChassis = $vehicleDataObject->getChassisNumber();

$chassis = array_unique(array_column($vehicleChassis, 'vehicle_chassis_number'));



if (in_array($_POST['vehicle_chassis_number'], $chassis)) {
    return header('Location: ./Admin/adminDashboard.php?errorChassis=Vehicle%20with%20that%20chassis%20number%20is%20already%20registered');
} elseif (strlen($_POST['registration_number']) > 8) {
    return header('Location: ./Admin/adminDashboard.php?errorReg=Enter%20a%20valid%20Registration%20Number');
} elseif (empty($_POST['vehicle_model']) && empty($_POST['vehicle_type'])) {
    return header('Location: ./Admin/adminDashboard.php?empty=You%20must%20fill%20up%20all%20inputs.');
} else {
    $vehicleData = [
        'vehicle_model' => $_POST['vehicle_model'],
        'vehicle_type' => $_POST['vehicle_type'],
        'vehicle_chassis_number' => $_POST['vehicle_chassis_number'],
        'vehicle_production_year' => $_POST['vehicle_production_year'],
        'registration_number' => $_POST['registration_number'],
        'fuel_type' => $_POST['fuel_type'],
        'registration_to' => $_POST['registration_to']
    ];


    $statement = $connection->prepare(
        'INSERT INTO `vehicles`
        (`vehicle_model`, `vehicle_type`, `vehicle_chassis_number`, `vehicle_production_year`, `registration_number`, `fuel_type`, `registration_to`)
        VALUES (:vehicle_model, :vehicle_type, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type, :registration_to)'
    );

    $statement->execute($vehicleData);
    return header('Location: ./Admin/adminDashboard.php');
}
