<?php
require 'connection.php';
include 'nav.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require 'formValidations.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        // $imgName="";
        if (
            validateName($name) && validateMail($mail)
            && validateAddress($address)
        ) {

            saveChanges();
            echo $updateMessage;


?>

<?php
            header('Location: display.php');
        } else {
            header('Location: editForm.php?id=' . $_POST['id']);
        }
    } else {
        header('Location: editForm.php');
    }
}


function saveChanges()
{
    global $id, $name, $mail, $address, $gender, $imageName, $con;
    if (isset($_FILES['img']) && validateImg('img')) {
        removeOldImg();
        $query = "update users set 
    name='$name' , mail = '$mail' , address = '$address' ,
    gender= '$gender' , img ='$imageName' where ID = " . $id;
    } else {
        $query = "update users set 
    name='$name' , mail = '$mail' , address = '$address' ,
    gender= '$gender' where ID = " . $id;
    }
    global $updateMessage;
    if (mysqli_query($con, $query)) {
        $updateMessage = "Changes saved successfully";
    } else {
        $updateMessage = "*Saving Error!";
    }
}


function removeOldImg()
{
    global $id,$con;
    $query = "select img from users where ID = " . $id;
    $oldImageName = mysqli_fetch_assoc(mysqli_query($con, $query))['img'];
    if(file_exists('uploads/'.$oldImageName)){
        unlink('uploads/'.$oldImageName);
    }
}
?>
