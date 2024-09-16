<?php

session_start();

require_once(__DIR__ . '/../Classes/VehicleData.php');
require_once(__DIR__ . '/../Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$vehicleDataObject = new VehicleData();

$searchVehicle = $_POST['searchVehicle'];


$_SESSION['searchVehicle'] = $vehicleDataObject->findVehicleBySearch($searchVehicle);

return header('Location: adminDashboard.php?searchVehicle=true');

