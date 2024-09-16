<?php

require_once(__DIR__ . '/../Classes/VehicleData.php');

$vehicleDataObject = new VehicleData();

$fuelTypes = $vehicleDataObject->getFuelData();
$vehicleTypes = $vehicleDataObject->getVehicleTypeData();
$vehicleModels = $vehicleDataObject->getVehicleModelsData();

$brands = array_unique(array_column($vehicleModels, 'vehicle_models'));

$allVehicleData = $vehicleDataObject->findAllVehicles();

$id = $_GET['id'];
$editVehicle = $vehicleDataObject->editVehicle($id);

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
            <a href="../index.php" class="navbar-brand">Vehicle Registration</a>
            <a href="./adminLogout.php" class="btn btn-outline-success">Logout</a>
        </div>
    </nav>

    <main name="vehicleRegister">
        <div class="container text-center">
            <h2>Edit Vehicle Information</h2>
            <?php

            $errorReg = $_GET['errorReg'] ?? '';
            $empty = $_GET['empty'] ?? '';

            if (!empty($errorReg)) {
                echo '<div class="alert alert-danger">' . $errorReg . '</div>';
            }

            if (!empty($empty)) {
                echo '<div class="alert alert-danger">' . $empty . '</div>';
            }

            ?>
            <form action="adminEditVehicle.php" method="POST" class="d-flex justify-content-center">
                <input type="hidden" hidden name="vehicle_id" value="<?= $editVehicle['id'] ?>">
                <div class="formGroupOne m-4">
                    <div class="form-group">
                        <label for="vehModel">Vehicle Model</label>
                        <select class="form-control" id="vehicle_model" name="vehicle_model">
                            <option value="" disabled selected hidden>Select vehicle model</option>

                            <?php

                            foreach ($brands as $brand) {
                                echo '<option ' . (isset($editVehicle) && $editVehicle['vehicle_model'] === $brand ? 'selected' : '') . '>' . $brand . '</option>';
                            }


                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehType">Vehicle Type</label>
                        <select class="form-control" id="vehicle_type" name="vehicle_type">
                            <option <?= isset($editVehicle) && $editVehicle['vehicle_type'] === 'Sedan' ? 'selected' : ''; ?>> <?= $vehicleTypes[0]['vehicle_types'] ?></option>
                            <option <?= isset($editVehicle) && $editVehicle['vehicle_type'] === 'Coupe' ? 'selected' : ''; ?>> <?= $vehicleTypes[1]['vehicle_types'] ?></option>
                            <option <?= isset($editVehicle) && $editVehicle['vehicle_type'] === 'Hatchback' ? 'selected' : ''; ?>> <?= $vehicleTypes[2]['vehicle_types'] ?></option>
                            <option <?= isset($editVehicle) && $editVehicle['vehicle_type'] === 'SUV' ? 'selected' : ''; ?>> <?= $vehicleTypes[3]['vehicle_types'] ?></option>
                            <option <?= isset($editVehicle) && $editVehicle['vehicle_type'] === 'Minivan' ? 'selected' : ''; ?>> <?= $vehicleTypes[4]['vehicle_types'] ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="chassis">Vehicle Chassis Number</label>
                        <input type="text" class="form-control" id="vehicle_chassis_number" name="vehicle_chassis_number" placeholder="ex: wz2am6" value="<?= isset($editVehicle) ? $editVehicle['vehicle_chassis_number'] : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="vehProductionDate">Vehicle Production Date</label>
                        <input type="date" class="form-control" id="vehicle_production_year" name="vehicle_production_year" value="<?= isset($editVehicle) ? $editVehicle['vehicle_production_year'] : '' ?>">
                    </div>
                </div>

                <div class="formGroupTwo m-4">
                    <div class="form-group">
                        <label for="regNumber">Registration Number</label>
                        <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="ex: SR9009AD" value="<?= isset($editVehicle) ? $editVehicle['registration_number'] : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="fuelType">Fuel Type</label>
                        <select class="form-control" id="fuel_type" name="fuel_type">
                            <option value="" selected hidden disabled>Select fuel type</option>
                            <option <?= isset($editVehicle) && $editVehicle['fuel_type'] === 'Diesel' ? 'selected' : ''; ?>> <?= $fuelTypes[0]['fuel_types'] ?></option>
                            <option <?= isset($editVehicle) && $editVehicle['fuel_type'] === 'Gasoline' ? 'selected' : ''; ?>> <?= $fuelTypes[1]['fuel_types'] ?></option>
                            <option <?= isset($editVehicle) && $editVehicle['fuel_type'] === 'Electric' ? 'selected' : ''; ?>> <?= $fuelTypes[2]['fuel_types'] ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehRegistrationDate">Vehicle Registration To</label>
                        <input type="date" class="form-control" id="registration_to" name="registration_to" value="<?= isset($editVehicle) ? $editVehicle['registration_to'] : '' ?>">
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-warning">Edit vehicle</button>
                    </div>
                </div>

            </form>
        </div>
    </main>
    <hr>

    <main>
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
                    <tr>
                        <th scope="row"><?= $editVehicle['id'] ?></th>
                        <td><?= $editVehicle['vehicle_model'] ?></td>
                        <td><?= $editVehicle['vehicle_type'] ?></td>
                        <td><?= $editVehicle['vehicle_chassis_number'] ?></td>
                        <td><?= $editVehicle['vehicle_production_year'] ?></td>
                        <td><?= $editVehicle['registration_number'] ?></td>
                        <td><?= $editVehicle['fuel_type'] ?></td>
                        <td><?= $editVehicle['registration_to'] ?></td>
                        <td><a href="adminDashboard.php" class="btn btn-primary">Cancel Editing</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>