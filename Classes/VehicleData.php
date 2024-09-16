<?php

require_once(__DIR__ . '/../Database/Connection.php');

use Database\Connection as Connection;

class VehicleData
{
    protected string $table = 'vehicleData';
    protected string $tableTwo = 'vehicles';


    public function startConnection()
    {
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        return $connection;
    }

    public function getFuelData()
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT fuel_types FROM vehicleData');

        $statement->execute();

        return $fuelTypes = $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getVehicleTypeData()
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT vehicle_types FROM vehicleData');

        $statement->execute();

        return $fuelTypes = $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getVehicleModelsData()
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT vehicle_models FROM vehicleData');

        $statement->execute();

        return $vehicleModels = $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findRegistrationNumber()
    {
        $connection = $this->startConnection();

        $regNumber = $_POST['searchReg'];

        $statement = $connection->prepare('SELECT registration_number FROM vehicles WHERE registration_number = :regNumber');
        $statement->bindValue(':regNumber', $regNumber);

        $statement->execute();

        return $regNumber = $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function findVehicle()
    {
        $connection = $this->startConnection();

        $regNumber = $_GET['regNumber'];

        $statement = $connection->prepare('SELECT * FROM vehicles WHERE registration_number = :regNumber');
        $statement->bindValue(':regNumber', $regNumber);
        $statement->execute();

        return $vehicle = $statement->fetch(\PDO::FETCH_ASSOC);
    }


    public function findAllVehicles() 
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT * FROM vehicles');
        $statement->execute();

        return $allVehicleData = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChassisNumber() 
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT vehicle_chassis_number FROM vehicles');
        $statement->execute();

        return $vehicleChassisNumber = $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteVehicle(int $id)
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('DELETE FROM vehicles WHERE id = :id');
        return $statement->execute(['id' => $id]);

    }

    public function editVehicle(int $id)
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT * FROM vehicles WHERE id = :id');
        $statement->execute(['id' => $id]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateVehicle() 
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare('UPDATE vehicles SET vehicle_model = :vehicle_model, vehicle_type = :vehicle_type, vehicle_chassis_number = :vehicle_chassis_number, registration_number = :registration_number, fuel_type = :fuel_type, registration_to = :registration_to WHERE id = :id');
        return $statement->execute([
            'id' => $_POST['vehicle_id'],
            'vehicle_model' => $_POST['vehicle_model'],
            'vehicle_type' => $_POST['vehicle_type'],
            'vehicle_chassis_number' => $_POST['vehicle_chassis_number'],
            'registration_number' => $_POST['registration_number'],
            'fuel_type' => $_POST['fuel_type'],
            'registration_to' => $_POST['registration_to']
        ]);
    }

    public function extendRegistration() 
    {
        $connection = $this->startConnection();

        $updatedRegistration = date('Y-m-d', strtotime('+1 year'));
        // +1 Year Because When You Register a Car IRL It Extends the Registration to This Day Next Year!

        $statement = $connection->prepare('UPDATE vehicles SET registration_to = :updatedRegistration WHERE id = :id');
        return $statement->execute([
            'id' => $_GET['id'],
            'updatedRegistration' => $updatedRegistration
        ]);
    }

    public function findVehicleBySearch($searchVehicle)
    {
        $connection = $this->startConnection();

        $statement = $connection->prepare("SELECT * FROM `vehicles` WHERE `vehicle_model` LIKE '%" . $searchVehicle . "%' OR `registration_number` LIKE '%" . $searchVehicle . "%' OR `vehicle_chassis_number` LIKE '%" . $searchVehicle . "%'");

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}

// $searchQuery = $connection->prepare("SELECT * FROM `registrations` WHERE `vehicle_model` LIKE '%" . $this->search . "%' OR `chassis_number` LIKE '%" . $this->search . "%' OR `reg_number` LIKE '%" . $this->search . "%'");