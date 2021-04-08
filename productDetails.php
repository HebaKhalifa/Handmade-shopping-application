<?php
require 'connection.php';
include 'nav.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {

  require 'formValidations.php';


  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT products.* 
            ,product_images.image , product_images.ID as img_id 
            FROM products join product_images 
            on products.ID=product_id
            where products.ID = '$id'";
  if ($get = mysqli_query($con, $query)) {
    $data = mysqli_fetch_assoc($get);

    $sql = "SELECT `image` FROM `product_images` WHERE product_id ='$id'";
    $op = mysqli_query($con, $sql);
  }
}

?>


<div class="card" style="width: 18rem;">
  <?php
  while ($allimages = mysqli_fetch_assoc($op)) {
  ?>
    <img src="uploads/<?php echo $allimages['image']; ?>" class="card-img-top" alt="...">
  <?php
  }
  ?>
  <!-- <img src="uploads/<?php echo $data['image']; ?>" class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['name'] ?></h5>
    <p class="card-text">Description: <?php echo $data['description'] ?></p>
    <p class="card-text">Price: <?php echo $data['price'] ?></p>
    
    <a href="reserveForm.php?id=<?php echo $data['ID']; ?>"
       class="<?php if (!isset($_SESSION['user_id'])) {echo "disabled";} ?> btn btn-success float-end">
       Reserve</a>
  </div>
</div>