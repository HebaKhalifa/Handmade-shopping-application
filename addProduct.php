<?php
require 'connection.php';
require 'formValidations.php';
include 'nav.php';
$insertMessage = errorMessage('insertMessage');
$insertImageMessage = errorMessage('insertImageMessage');

submit();

function submit()
{
    global $insertMessage, $insertImageMessage;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $productName = inputClean($_POST['productName']);
        $description = inputClean($_POST['description']);
        $price = inputClean($_POST['price']);


        if (validateProduct($productName, $description, $price) && validateImg('productImg')) {
            addProduct($productName, $description, $price);


?>




            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Product Info</title>
            </head>

            <body>

                <main class="container-fluid">
                    <div class="col-md-10 mx-auto my-5 bg-light p-5 border border-3 shadow shadow-lg">
                        <h1>
                            <?php echo $insertMessage; ?>
                        </h1>
                        <p><?php echo $insertImageMessage; ?></p>


                        <a href="home.php">Show Products</a>
                    </div>




                </main>
                <?php

        } else {
            header('Location: addProduct.php');
        }
    } else {
        header('Location: addProduct.php');
    }
}


?>

            </body>
            

            </html>


