<?php
session_start();
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {
require 'formValidations.php';
include 'nav.php';
$productNameMessage = errorMessage('productNameMessage');
$descriptionMessage = errorMessage('descriptionMessage');
$priceMessage = errorMessage('priceMessage');
$productImgMessage = errorMessage('productImgMessage');




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="container-fluid">
        <div class="col-md-7 mx-auto my-5 bg-light p-5 border border-3 shadow shadow-lg">
            <form action="addProduct.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div>
                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="productName" class="form-label">Name</label></div>
                            <div class="col-md-6 col-12">
                                <input type="text" name="productName" class="form-control">
                                <span id="errorMessage">*<?php echo $productNameMessage; ?></span>
                            </div>
                            
                        </div>

                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="description" class="form-label">Description</label></div>
                            <div class="col-md-6 col-12">
                                <textarea name="description" class="form-control"></textarea>
                                <span id="errorMessage">*<?php echo $descriptionMessage; ?></span>
                            </div>
                            
                        </div>

                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="price" class="form-label">Price</label></div>
                            <div class="col-md-6 col-12">
                                <input type="text" name="price" class="form-control">
                                <span id="errorMessage">*<?php echo $priceMessage; ?></span>
                            </div>
                        </div>

                        

                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="productImg" class="form-label">Image</label></div>
                            <div class="col-md-6 col-12">
                                <input type="file" name="productImg" class="form-control">
                                <span id="errorMessage">*<?php echo $productImgMessage; ?></span>
                            </div>
                            
                        </div>

                    </div>

                </div>

                <div class="col-2 mx-md-auto text-center">
                    <input type="submit" value="Send" class="btn btn-success">
                </div>

                
            </form>

        </div>


    </main>

    <!----------------------JS links----------------------->
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>
<?php
}
?>