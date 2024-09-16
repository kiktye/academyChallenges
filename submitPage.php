<?php

require_once('Database/Connection.php');

use Database\Connection as Connection;

$connectionObj = new Connection();
$connection = $connectionObj->getConnection();

$data = [
    'coverImageUrl' => $_POST['coverImageUrl'],
    'mainTitle' => $_POST['mainTitle'],
    'subtitle' => $_POST['subtitle'],
    'aboutYou' => $_POST['aboutYou'],
    'phone' => $_POST['phone'],
    'locationOne' => $_POST['locationOne'],
    'servicesOrProducts' => $_POST['servicesOrProducts'],
    'imageUrl' => $_POST['imageUrl'],
    'descriptionOne' => $_POST['descriptionOne'],
    'imageUrlTwo' => $_POST['imageUrlTwo'],
    'descriptionTwo' => $_POST['descriptionTwo'],
    'imageUrlThree' => $_POST['imageUrlThree'],
    'descriptionThree' => $_POST['descriptionThree'],
    'companyDescription' => $_POST['companyDescription'],
    'linkedin' => $_POST['linkedin'],
    'facebook' => $_POST['facebook'],
    'twitter' => $_POST['twitter'],
    'google' => $_POST['google']
];

$statement = $connection->prepare(
    'INSERT INTO `build-web-page` 
    (`coverImageUrl`, `mainTitle`, `subtitle`,
    `aboutYou`, `phone`, `location`,
    `servicesOrProducts`, `imageUrl`, `description`,
    `imageUrlTwo`, `descriptionTwo`, `imageUrlThree`,
    `descriptionThree`, `companyDescription`,
    `linkedin`, `facebook`, `twitter`,
    `google`) 
    VALUES (:coverImageUrl, :mainTitle, :subtitle,
    :aboutYou, :phone, :locationOne, :servicesOrProducts,
    :imageUrl, :descriptionOne, :imageUrlTwo,
    :descriptionTwo, :imageUrlThree, :descriptionThree,
    :companyDescription, :linkedin, :facebook, 
    :twitter, :google)'
);

$statement->execute($data);
$id = $connection->lastInsertId();

return header('Location: company.php?id=' . $id);

