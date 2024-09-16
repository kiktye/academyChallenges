<?php


require_once(__DIR__ . '/../Classes/VehicleData.php');
require_once(__DIR__ . '/../Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$vehicleDataObject = new VehicleData();
$vehicles = $vehicleDataObject->findAllVehicles();


if ($_POST['action'] == 'delete') {
    $id = $_POST['vehicle_id'];

    $deleted = $vehicleDataObject->deleteVehicle($id);

    if ($deleted) {
        $statement = $connection->prepare('ALTER TABLE vehicles AUTO_INCREMENT = 1');
        $statement->execute();

        return header('Location: adminDashboard.php?deleteSuccess=Vehicle deleted successfully.');
    }
}