<?php

require_once(__DIR__ . '/../Classes/VehicleData.php');
require_once(__DIR__ . '/../Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$vehicleDataObject = new VehicleData();
$vehicleDataObject->extendRegistration();

return header('Location: adminDashboard.php?successMsg=Vehicle%20registration%20extended%20successfully.');

?>