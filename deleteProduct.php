<?php
require 'connection.php';
include 'nav.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query="delete from product_images where ID =".$id;
    $delete=mysqli_query($con,$query);
    if($delete){
        header('Location: home.php');
    }
}
?>