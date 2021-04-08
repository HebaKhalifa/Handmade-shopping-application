<?php
require 'connection.php';
require 'formValidations.php';

$name = "";
$insertMessage = errorMessage('insertMessage');

submit();

function submit()
{
    global $insertMessage;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        global $name;
        $name = $_POST['name'];

        $checkName = validateName($_POST['name']);
        $checkMail = validateMail($_POST['mail']);
        $checkPassword = validatePassword($_POST['pass']);
        $checkAddress = validateAddress($_POST['address']);
        $checkImg = validateImg('img');


        if (
            $checkName && $checkMail && $checkPassword
            && $checkAddress && $checkImg
        ) {
            if(!checkFoundMail($_POST['mail'])){
                header('Location: signUpForm.php');
            }else{
            createProfile();

            

?>




            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>User Info</title>
            </head>

            <body>

                <main class="container-fluid">
                    <div class="col-md-10 mx-auto my-5 bg-light p-5 border border-3 shadow shadow-lg">
                        <h1>
                            Welcome <?php echo $name; ?> ^_^
                        </h1>

                        <?php echo $_POST['gender']; ?>

                        <p> <?php echo $insertMessage; ?> </p>
                        <p> Please Login to access your profile</p>
                        <a href="index.php">Login</a>
                    </div>




                </main>

            </body>

            </html>


<?php
            }

        } else {
            header('Location: signUpForm.php');
        }
    } else {
        header('Location: signUpForm.php');
    }
}


?>