<?php

require_once(__DIR__ . '/../Classes/VehicleData.php');
require_once(__DIR__ . '/../Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$vehicleDataObject = new VehicleData();
$vehicleModels = $vehicleDataObject->getVehicleModelsData();

$models = array_unique(array_column($vehicleModels, 'vehicle_models'));


$addVehicle = $_POST['addVehicle'];
if (!empty($addVehicle)) {
    if (in_array($addVehicle, $models)) {
        return header('Location: adminAddVehicle.php?errorMsg=Vehicle%20model%20already%20exists.');
    } else {
        $query = "INSERT INTO vehicleData (`vehicle_models`) VALUES ('$addVehicle')";
        $statement = $connection->prepare($query);
        $statement->execute();
    
        return header('Location: adminDashboard.php');
    }    
} else {
    return header('Location: adminAddVehicle.php?errorMsg2=Enter%20a%20vehicle%20model.');
}
