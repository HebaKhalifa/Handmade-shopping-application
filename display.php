<?php
require 'connection.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {

$query = "select * from users";
$op = mysqli_query($con, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        img{
            width: 100px;
        }
    </style>
</head>

<body class="">
<?php
include 'nav.php';
?>

<main class="container">
<div class="row">
    <table class="table table-bordered col-10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Password</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        
        while ($data= mysqli_fetch_assoc($op)) {
            $path="uploads/".$data["img"];
            if(!empty($data['mail'])){
            echo "
            <tr>
                <td>".$data["ID"]."</td>
                <td>".$data["name"]."</td>
                <td>".$data["mail"]."</td>
                <td>".$data["password"]."</td>
                <td>".$data["address"]."</td>
                <td>".$data["gender"]."</td>
                <td><img src='$path'></td>
                <td>
                <a href='editForm.php?id=".$data['ID']."'>Edit</a>
                <a href='delete.php?id=".$data['ID']."'>Delete</a>
                </td>
                
                </tr>
                ";
            //    echo "<td><img src='$path'></td>";
            }
        }



        ?>

    </table>
    </div>
    </main>
</body>

</html>
<?php
}
?>