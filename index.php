<?php
session_start();
include 'nav.php';
require 'formValidations.php';
$authMessage =errorMessage('authMessage');
$mailMessage = errorMessage('mailMessage');
$passMessage = errorMessage('passMessage');


session_unset();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="container-fluid">
        <div class="col-md-10 mx-auto my-5 bg-light p-5 border border-3 shadow shadow-lg">
            <h1 class="text-center">Login</h1>
            <form action="login.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                <span class="text-center" id="errorMessage"><?php echo $authMessage; ?></span>
                    <div>
                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="mail" class="form-label">Email</label></div>
                            <div class="col-md-8 col-12">
                                <input type="email" name="mail" class="form-control">
                                <span id="errorMessage">*<?php echo $mailMessage; ?></span>
                            </div>

                        </div>

                        <div class="row my-3">
                            <div class="col-md-2 col-12"><label for="pass" class="form-label">Password</label></div>
                            <div class="col-md-8 col-12">
                                <input type="password" name="pass" class="form-control">
                                <span id="errorMessage">*<?php echo $passMessage; ?></span>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-2 mx-md-auto text-center">
                    <input type="submit" value="Send" class="btn btn-success">
                </div>
                <!-- <hr class="w-50 text-center"> -->
                <div class="text-center">
                    <a href="signUpForm.php">Create a new account</a>
                </div>
            </form>

        </div>


    </main>

    <!----------------------JS links----------------------->
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>