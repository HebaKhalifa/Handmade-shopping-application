<?php
session_start();
include 'nav.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: login.php');
} else {

    $path = "uploads/" . $_SESSION['img'];

?>
<main class="container">
    <p> Welcome <?php echo $_SESSION['name']; ?> </p>
    <p> Your id : <?php echo $_SESSION['user_id']; ?> </p>
    <p> Your Mail : <?php echo $_SESSION['mail']; ?> </p>
    <p> Your address : <?php echo $_SESSION['address']; ?> </p>
    <p> Your gender : <?php echo $_SESSION['gender']; ?> </p>

    <img src="<?php echo $path ?>" alt="" width="500px">


    <p><a href="<?php echo "editForm.php?id=".$_SESSION['user_id']; ?>">Edit your Profile</a></p>
    <p><a href="<?php echo "delete.php?id=".$_SESSION['user_id']; ?>">Delete your Profile</a></p>
    <p><a href="display.php">Show All users</a></p>
    <p><a href="logout.php">LogOut</a> </p>

    </main>


<?php
}


?>