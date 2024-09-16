<?php

require_once(__DIR__ . '/../Classes/VehicleData.php');
require_once(__DIR__ . '/../Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$vehicleDataObject = new VehicleData();
$vehicleDataObject->updateVehicle();

return header('Location: adminDashboard.php?successMsg2=Vehicle%20information%20edited%20successfully.');

