<?php
require 'connection.php';
include 'nav.php';


$query = "SELECT products.* 
    ,product_images.image , product_images.ID as img_id 
    FROM products join product_images 
    on products.ID=product_id";
$op = mysqli_query($con, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        img {
            width: 100px;
        }
    </style>
</head>

<body class="container-fluid">

    <?php
    if (isset($_SESSION['user_id'])) {
        ?>
        <h1 class="text-center my-3">Welcome <?php echo $_SESSION['name']; ?></h1>
        <?php
    }
    ?>
    <main class="row">

        <h3 class="text-center my-4">Products</h3>
        <?php
    if (isset($_SESSION['user_id'])) {
        ?>
        <div>
        <a class="ms-5 my-5 btn btn-primary" href="addProductForm.php">Add Product</a>
        </div>
<?php } ?>

        <div class="row justify-content-around">

            <?php
            while ($data = mysqli_fetch_assoc($op)) {
                $path = "uploads/" . $data["image"];
            ?>

                <div class="card col-4 my-3" style="width: 18rem;">

                    <img src="uploads/<?php echo $data['image']; ?>" class="card-img-top img-fluid my-2" style="height: 200px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['name'] ?></h5>
                        <p class="card-text">Description: <?php echo $data['description'] ?></p>
                        <p class="card-text">Price: <?php echo $data['price'] ?></p>
                        <p><a href="productDetails.php?id=<?php echo $data['ID'] ?>">see details</a></p>


                        <!-----------------------------will be appeared for only admins ----------------------------->
                        <a href="editProductForm.php?id=<?php echo $data['img_id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="deleteProduct.php?id=<?php echo $data['img_id']; ?>" class="btn btn-danger">Delete</a>



                        <!-----------------------------will be appeared for only users ----------------------------->
                        <a href="reserveForm.php?id=<?php echo $data['ID']; ?>"
                             class="<?php if (!isset($_SESSION['user_id'])) { echo "disabled"; } ?> btn btn-success float-end">
                            Reserve</a>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>

    </main>
</body>

</html>