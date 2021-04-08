<?php
require 'connection.php';
include 'nav.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require 'formValidations.php';
        $id = $_POST['id'];
        $productName = $_POST['productName'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        // $productImg = $_POST['productImg'];
        // $imgName="";
        if ( validateProduct($productName,$description,$price) ) {

            saveChanges();
            $updateMessage;


?>

<?php
            // header('Location: home.php');
        } else {
            header('Location: editProductForm.php?id=' . $_POST['id']);
        }
    } else {
        header('Location: editProductForm.php');
    }
}


function saveChanges()
{
    global $id, $productName, $description, $price, $imageName, $con;
    if (isset($_FILES['productImg']) && validateImg('productImg')) {
        removeOldImg();
        echo "fie found";
        $query = "update products join product_images 
        on products.ID=product_id
        set products.name='$productName' , products.description = '$description' ,
        products.price = '$price', product_images.image = '$imageName'
        where product_images.ID = '$id'";

    } else {
        echo "fie not found";
    $query = "update products set 
    name='$productName' , description = '$description' , price = '$price' 
    where ID = " . $id;
    }
    global $updateMessage;
    if (mysqli_query($con, $query)) {
        $updateMessage = "Changes saved successfully";
        header('Location: home.php');
    } else {
        $updateMessage = "*Saving Error!";
        header('Location: editProductForm.php?id=' . $id);
    }
}


function removeOldImg()
{
    global $id,$con;
    $query = "select image from product_images where product_id = " . $id;
    $oldImageName = mysqli_fetch_assoc(mysqli_query($con, $query))['image'];
    if(file_exists('uploads/'.$oldImageName) && is_file('uploads/'.$oldImageName)){
        unlink('uploads/'.$oldImageName);
    }
}
?>
