<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        #navbarNav ul li a:hover {
            background-color: beige;
        }
    </style>
</head>

<body>

    <?php

    require_once('Database/Connection.php');

    use Database\Connection as Connection;

    $connectionObj = new Connection();
    $connection = $connectionObj->getConnection();

    $id = $_GET['id'];

    $statement = $connection->prepare('SELECT * FROM `build-web-page` WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    $webPages = $statement->fetch(\PDO::FETCH_ASSOC);

    // var_dump($webPages);

    ?>
    <!-- NAVBAR -->
    <div>
        <nav class="navbar navbar-expand-lg bg-light" id="home">
            <div class="container-fluid ">
                <a class="navbar-brand text-dark" href="#">Webster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#about">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#servicesOrProducts">
                                <?php
                                if ($webPages['servicesOrProducts'] == 'Services') {
                                    echo 'Services';
                                } elseif ($webPages['servicesOrProducts'] == 'Products') {
                                    echo 'Products';
                                }
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <!-- MAIN SECTION -->
    <div class="main text-center d-flex flex-column justify-content-center align-items-center" style="background-image: url('<?= $webPages['coverImageUrl'] ?>'); height: 50vh; background-position: center;">
        <h1 class="text-white py-5" style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black;">
            <?= $webPages['mainTitle'] ?>
        </h1>

        <h4 class="text-white text-wrap my-5" style="-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black;  width: 500px;">
            <?= $webPages['subtitle'] ?>
        </h4>
    </div>

    <!-- ABOUT SECTION -->
    <div class="container-fluid bg-light p-5">
        <div class="row p-4">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center text-center" id="about">
                <h3>About us</h3>

                <p style="width: 1000px" class="text-wrap">
                    <?= $webPages['aboutYou'] ?>
                </p>

                <hr style="width: 30%">

                <h6 style="margin: 0;"><?= $webPages['phone'] ?> </h6>
                <h6>Location: <?= $webPages['location'] ?></h6>
            </div>
        </div>
    </div>

    <!-- CARDS -->
    <div class="container text-left p-5" id="servicesOrProducts">
        <h2>
            <?php if ($webPages['servicesOrProducts'] === 'Services') {
                echo 'Services';
            } elseif ($webPages['servicesOrProducts'] === 'Products') {
                echo 'Products';
            } ?>
        </h2>
        <div class="row">

            <!-- card 1 -->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $webPages['imageUrl'] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-left bg-dark text-white">
                        <h6><?php if ($webPages['servicesOrProducts'] === 'Services') {
                                echo 'Service';
                            } elseif ($webPages['servicesOrProducts'] === 'Products') {
                                echo 'Product';
                            } ?> One Description</h6>
                        <p class="card-text"><?= $webPages['description'] ?></p>
                    </div>
                </div>
            </div>

            <!-- card 2 -->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $webPages['imageUrlTwo'] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-left bg-dark text-white">
                        <h6><?php if ($webPages['servicesOrProducts'] === 'Services') {
                                echo 'Service';
                            } elseif ($webPages['servicesOrProducts'] === 'Products') {
                                echo 'Product';
                            } ?> Two Description</h6>
                        <p class="card-text"><?= $webPages['descriptionTwo'] ?></p>
                    </div>
                </div>
            </div>

            <!-- card 3 -->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $webPages['imageUrlThree'] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-left bg-dark text-white">
                        <h6><?php if ($webPages['servicesOrProducts'] === 'Services') {
                                echo "Service";
                            } elseif ($webPages['servicesOrProducts'] === 'Products') {
                                echo "Product";
                            } ?> Three Description</h6>
                        <p class="card-text"><?= $webPages['descriptionThree'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- contact section -->
    <div class="container-fluid bg-light py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4>Contact</h4>
                    <p style="width: 600px; text-wrap: balance;"><?= $webPages['companyDescription'] ?></p>
                </div>
                <div class="col-6">
                    <form action="#">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="Name" placeholder="Your name" class="form-control">

                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Your email" class="form-control">

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Leave a message" class="form-control"></textarea>
                        <button class="btn btn-primary my-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer bg-dark text-white text-center">
        <p style="margin: 0;">Copyright by Kiko @ Brainster</p>
        <a target="_blank" href="<?= $webPages['linkedin'] ?>">Linkedin</a>
        <a target="_blank" href="<?= $webPages['facebook'] ?>">Facebook</a>
        <a target="_blank" href="<?= $webPages['twitter'] ?>">Twitter</a>
        <a target="_blank" href="<?= $webPages['google'] ?>">Google+</a>


    </div>
</body>

</html>