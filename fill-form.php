<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .container-fluid {
            background-image: url('./img/bg-2.png');
            background-size: cover;
            height: 100vh;
        }
    </style>

</head>

<body>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-white">You are one step away from your webpage</h3>

        <form action="submitPage.php" method="POST" id="form" class="d-flex flex-row justify-content-center align-items-center">
            <div>
                <div class="row d-flex flex-column text-light bg-dark p-5">
                    <label for="coverImageUrl">Cover Image Url</label>
                    <input type="text" name="coverImageUrl" id="coverImageUrl" class="form-control">

                    <label for="mainTitle">Main Title of Page</label>
                    <input type="text" name="mainTitle" id="mainTitle" class="form-control">

                    <label for="subtitle">Subtitle of Page</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control">

                    <label for="aboutYou">Something about you</label>
                    <input type="text" name="aboutYou" id="aboutYou" class="form-control">

                    <label for="phone">Your telephone number</label>
                    <input type="text" name="phone" id="phone" class="form-control">

                    <label for="locationOne">Location</label>
                    <input type="text" name="locationOne" id="locationOne" class="form-control">
                </div>

                <div class="row d-flex flex-column text-light bg-dark p-5 my-3">
                    <label for="servicesOrProducts">Do you provide services or products?</label>
                    <select name="servicesOrProducts" id="servicesOrProducts">
                        <option value="Services">Services</option>
                        <option value="Products">Products</option>
                    </select>
                </div>
            </div>

            <div class="row d-flex flex-column text-light bg-dark p-5 mx-5">


                <label for="imageUrl">Image Url</label>
                <input type="text" name="imageUrl" id="imageUrl" class="form-control">

                <label for="descriptionOne">Description of service/product</label>
                <textarea name="descriptionOne" id="descriptionOne" class="form-control"></textarea>

                <label for="imageUrlTwo">Image Url</label>
                <input type="text" name="imageUrlTwo" id="imageUrlTwo" class="form-control">

                <label for="description2">Description of service/product</label>
                <textarea name="descriptionTwo" id="descriptionTwo" class="form-control"></textarea>

                <label for="imageUrl3">Image Url</label>
                <input type="text" name="imageUrlThree" id="imageUrlThree" class="form-control">

                <label for="description3">Description of service/product</label>
                <textarea name="descriptionThree" id="descriptionThree" class="form-control"></textarea>



            </div>

            <div class="row d-flex flex-column text-wrap text-light bg-dark p-5 ">


                <label for="companyDescription">Provide a description of your company</label>
                <textarea name="companyDescription" id="companyDescription" class="form-control"></textarea>

                <div class="text-light">
                    <hr>
                </div>

                <label for="linkedin">Linkedin</label>
                <input type="text" name="linkedin" id="linkedin" class="form-control">

                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" id="facebook" class="form-control">

                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" id="twitter" class="form-control">

                <label for="google">Google+</label>
                <input type="text" name="google" id="google" class="form-control">

            </div>
        </form>


        <button type="submit" class="btn btn-light px-5" form="form">Submit</button>
    </div>

</body>

</html>