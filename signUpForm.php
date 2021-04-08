<?php
session_start();
require 'formValidations.php';

$nameMessage = errorMessage('nameMessage');
$mailMessage = errorMessage('mailMessage');
$passMessage = errorMessage('passMessage');
$addressMessage = errorMessage('addressMessage');
$imgMessage = errorMessage('imgMessage');
$mailfound=errorMessage('mailfound');


session_unset();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="container-fluid">
        <div class="col-md-10 mx-auto my-5 bg-light p-5 border border-3 shadow shadow-lg">
            <form action="signUp.php" method="POST" enctype="multipart/form-data">
            <h1 class="text-center">Create an account</h1>
                <div class="row">
                <span class="text-center" id="errorMessage"><?php echo $mailfound; ?></span>
                    <div>
                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="name" class="form-label">Name</label></div>
                            <div class="col-md-5 col-12">
                                <input type="text" name="name" class="form-control">
                                <span id="errorMessage">*<?php echo $nameMessage; ?></span>
                            </div>
                            <div class="col-md-5 col-12">
                                <p class="form-text">Must be at least 2 names long.</p>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="mail" class="form-label">Email</label></div>
                            <div class="col-md-5 col-12">
                                <input type="text" name="mail" class="form-control">
                                <span id="errorMessage">*<?php echo $mailMessage; ?></span>
                            </div>
                            <div class="col-md-5 col-12">
                                <p class="form-text">Must be conains "@ and ." symbols .</p>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="pass" class="form-label">Password</label></div>
                            <div class="col-md-5 col-12">
                                <input type="password" name="pass" class="form-control">
                                <span id="errorMessage">*<?php echo $passMessage; ?></span>
                            </div>
                            <div class="col-md-5 col-12">
                                <p class="form-text">Must be 10-30 characters long.</p>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="address" class="form-label">Address</label></div>
                            <div class="col-md-5 col-12">
                                <input type="text" name="address" class="form-control">
                                <span id="errorMessage">*<?php echo $addressMessage; ?></span>
                            </div>

                        </div>



                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="gender" class="form-label">Gender</label></div>
                            <div class="col-md-5 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" value="Male" type="radio" name="gender" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Female" type="radio" name="gender" id="flexRadioDefault2">
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
                                <input type="file" name="img" class="form-control">
                                <span id="errorMessage">*<?php echo $imgMessage; ?></span>
                            </div>
                            <div class="col-md-5 col-12">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-2 mx-md-auto text-center">
                    <input type="submit" value="Send" class="btn btn-success">
                </div>

                <div class="text-center">
                    <a href="index.php">Have already account?</a>
                </div>
            </form>

        </div>


    </main>

    <!----------------------JS links----------------------->
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>