<?php


require 'connection.php';
include 'nav.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        require 'formValidations.php';


        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT products.* 
            ,product_images.image , product_images.ID as img_id 
            FROM products join product_images 
            on products.ID=product_id
            where product_images.ID = '$id'";
        if ($get = mysqli_query($con, $query)) {
            $data = mysqli_fetch_assoc($get);
        }

        // $sql = "select * from product_images where product_id =" . $id;
        // if ($op = mysqli_query($con, $sql)) {
        //     echo $img = mysqli_fetch_assoc($op)['image'];
        // }

        $productNameMessage = errorMessage('productNameMessage');
        $descriptionMessage = errorMessage('descriptionMessage');
        $priceMessage = errorMessage('priceMessage');
        $productImgMessage = "";
    }
}
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
            <form action="updateProduct.php" method="POST" enctype="multipart/form-data">
                <h1>Edit Product</h1>
                <div class="row">
                    <div>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="productName" class="form-label">Name</label></div>
                            <div class="col-md-6 col-12">
                                <input type="text" name="productName" value="<?php echo $data['name'] ?>" class="form-control">
                                <span id="errorMessage">*<?php echo $productNameMessage; ?></span>
                            </div>

                        </div>

                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="description" class="form-label">Description</label></div>
                            <div class="col-md-6 col-12">
                                <textarea name="description" class="form-control"><?php echo $data['description'] ?></textarea>
                                <span id="errorMessage">*<?php echo $descriptionMessage; ?></span>
                            </div>

                        </div>

                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="price" class="form-label">Price</label></div>
                            <div class="col-md-6 col-12">
                                <input type="text" name="price" value="<?php echo $data['price'] ?>" class="form-control">
                                <span id="errorMessage">*<?php echo $priceMessage; ?></span>
                            </div>
                        </div>



                        <div class="row my-3">
                            <div class="col-md-3 col-12"><label for="productImg" class="form-label">Image</label></div>
                            <div class="col-md-6 col-12">
                                <input type="file" name="productImg" class="form-control">
                                <span id="errorMessage">*<?php echo $productImgMessage; ?></span>
                            </div>
                            <div class="col-md-5 col-12">
                                <img class="w-25 border border-2" src="uploads/<?php echo $data['image']; ?>" alt="">
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














