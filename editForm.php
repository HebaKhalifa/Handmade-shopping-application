<?php
require 'connection.php';
include 'nav.php';
if (!isset($_SESSION['user_id'])) {

    header('Location: index.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        require 'formValidations.php';


        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "select * from users where ID =" . $id;
        if ($get = mysqli_query($con, $query)) {
            $data = mysqli_fetch_assoc($get);
        }
        $nameMessage = errorMessage('nameMessage');
        $mailMessage = errorMessage('mailMessage');
        $addressMessage = errorMessage('addressMessage');
        $imgMessage = "";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="col-md-10 mx-auto my-5 bg-light p-5 border border-3 shadow shadow-lg">
        <h1 class="text-center">Edit Profile</h1>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div>
                    <input type="hidden" value="<?php echo $data['ID']; ?>" name="id">
                    <div class="row my-3">
                        <div class="col-md-2 col-12"><label for="name" class="form-label">Name</label></div>
                        <div class="col-md-5 col-12">
                            <input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control">
                            <span id="errorMessage"><?php echo $nameMessage; ?></span>
                        </div>
                        <div class="col-md-5 col-12">
                            <p class="form-text">Must be at least 2 names long.</p>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-2 col-12"><label for="mail" class="form-label">Email</label></div>
                        <div class="col-md-5 col-12">
                            <input type="email" name="mail" value="<?php echo $data['mail'] ?>" class="form-control">
                            <span id="errorMessage"><?php echo $mailMessage; ?></span>
                        </div>
                        <div class="col-md-5 col-12">
                            <p class="form-text">Must be conains "@ and ." symbols .</p>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-2 col-12"><label for="address" class="form-label">Address</label></div>
                        <div class="col-md-5 col-12">
                            <input type="text" name="address" value="<?php echo $data['address'] ?>" class="form-control">
                            <span id="errorMessage"><?php echo $addressMessage; ?></span>
                        </div>

                    </div>



                    <div class="row my-3">
                        <div class="col-md-2 col-12"><label for="gender" class="form-label">Gender</label></div>
                        <div class="col-md-5 col-12">
                            <div class="form-check">
                                <input class="form-check-input" value="Male" type="radio" name="gender" id="flexRadioDefault1" <?php echo ($data['gender'] == "Male") ? "checked" : ""; ?> />
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Female" type="radio" name="gender" id="flexRadioDefault2" <?php echo ($data['gender'] == "Female") ? "checked" : ""; ?> />
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-2 col-12"><label for="img" class="form-label">Image</label></div>
                        <div class="col-md-5 col-12">
                            <input type="file" name="img" value="<?php echo $data['img'] ?>" class="form-control"> 
                            <span id="errorMessage"><?php echo $imgMessage; ?></span>
                        </div>

                        <div class="col-md-5 col-12">
                        <img class="w-25 border border-2" src="uploads/<?php echo $data['img'] ?>" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-2 mx-md-auto">
                <input type="submit" value="Save Changes" class="btn btn-success">
            </div>

        </form>
    </div>
</body>

</html>