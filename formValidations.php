<?php


$nameMessage = "";
$mailMessage = "";
$userNameMessage = "";
$passMessage = "";
$phoneMessage = "";
$urlMessage = "";
$imgMessage = "";
$addressMessage = "";
$imageName = "";


function createProfile()
{
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = md5($_POST['pass']);
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    global $imageName;
    $query = "insert into users (name,mail,password,gender,address,img)
                 values('$name','$mail' ,'$pass','$gender','$address','$imageName')";
    global $con;
    global $insertMessage;
    if (mysqli_query($con, $query)) {
        $insertMessage = "Profile created successfully";
    } else {
        $insertMessage = "*Profile creation Error!";
    }
    session_unset();
}


function checkFoundMail($mail)
            {
            
                global $con;
                $sql = "select * from users where mail ='$mail'";
                $search = mysqli_query($con, $sql);
                if(mysqli_num_rows($search)>0){
                    $mailfound="This mail has an account before!<br>
                    Please <a href='index.php'>Login</a> if you have already account";
                    $_SESSION['mailfound']=$mailfound;
                    return false;
                }else{
                    return true;
                }
                
            }

function addProduct($productName, $description, $price)
{

    $query = "insert into products (name,description,price)
                 values('$productName','$description' ,'$price')";
    global $con;
    global $insertMessage;
    if (mysqli_query($con, $query)) {
        $insertMessage = "Product addeded successfully";
        addProduct_image();
    } else {
        $insertMessage = "*Product addition Error!";
    }
    
}

function addProduct_image()
{

    global $con, $imageName;
    $insertImageMessage="";
    $sql = "SELECT `ID` FROM `products` ORDER BY ID DESC LIMIT 1 ";
    $op = mysqli_query($con, $sql);
    $product_id = mysqli_fetch_assoc($op)['ID'];
    $query = "insert into product_images (product_id,image)
                 values('$product_id','$imageName')";
    if (mysqli_query($con, $query)) {
        $insertImageMessage = "Image addeded successfully";
    } else {
        $insertImageMessage = "*Image addition Error!";
    }
    $_SESSION['insertImageMessage']=$insertImageMessage;
}
function validateAddress($address)
{
    $address = inputClean($address);
    if (empty($address)) {
        global $addressMessage;
        $addressMessage = "Please Enter your address";
        $_SESSION['addressMessage'] = $addressMessage;
        return false;
    } else {
        return true;
    }
}


function inputClean($str)
{
    return stripcslashes(htmlspecialchars(trim($str)));
}

function validateName($name)
{
    $name = inputClean($name);
    if (count(explode(" ", $name)) < 2) {
        global $nameMessage;
        $nameMessage .= "Please Enter Full Name";
        $_SESSION['nameMessage'] = $nameMessage;
        return false;
    } else {
        return true;
    }
}

function validateMail($mail)
{
    $mail = inputClean($mail);
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        global $mailMessage;
        $mailMessage .= "Invalid Mail";
        $_SESSION['mailMessage'] = $mailMessage;
        return false;
    } else {
        return true;
    }
}

function validateUserName($userName)
{
    $userName = inputClean($userName);
    if (strlen($userName) < 10 || strlen($userName) > 30) {
        global $userNameMessage;
        $userNameMessage .= "User Name Must be 10-30 characters long<br>";
        $_SESSION['userNameMessage'] = $userNameMessage;
        return false;
    } else if (count(explode(" ", $userName)) != 2) {
        global $userNameMessage;
        $userNameMessage .= "User Name Must contains Two names";
        $_SESSION['userNameMessage'] = $userNameMessage;
        return false;
    } else {
        return true;
    }
}

function validatePassword($pass)
{
    $pass = inputClean($pass);
    if (strlen($pass) < 8 || strlen($pass) > 30) {
        global $passMessage;
        $passMessage .= "Password Must be 10-30 characters long<br>";
        $_SESSION['passMessage'] = $passMessage;
        return false;
    } else {
        return true;
    }
}

function validatePhone($phone)
{
    $phone = inputClean($phone);
    if (strlen($phone) < 10) {
        global $phoneMessage;
        $phoneMessage .= "Invalid Phone Number";
        $_SESSION['phoneMessage'] = $phoneMessage;
        return false;
    } else {
        return true;
    }
}
function validateLinkedin($url)
{
    $url = inputClean($url);
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        global $urlMessage;
        $urlMessage .= "Invalid url";
        $_SESSION['urlMessage'] = $urlMessage;
        return false;
    } else {
        return true;
    }
}
function validateImg($key)
{
    $fileTmpName = $_FILES[$key]['tmp_name'];
    $fileName = $_FILES[$key]['name'];
    global $imgMessage;
    if (empty($fileName)) {

        $imgMessage .= "Please Upload Image";
        $_SESSION['imgMessage'] = $imgMessage;
        return false;
    } else {
        $fileExt = explode('.', $fileName);
        $ext = strtolower($fileExt[count($fileExt) - 1]);
        global $imageName;
        $imageName = time() . $fileExt[0] . '.' . $ext;
        $_SESSION['imageName'] = $imageName;
        
        $allow_ext = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($ext, $allow_ext)) {
            $uploadFolder = 'uploads/';
            
            $destPath = $uploadFolder . $imageName;
            if (move_uploaded_file($fileTmpName, $destPath)) {
                return true;
                
            } else {
                $imgMessage .= 'Error in Upload File';
                $_SESSION['imgMessage'] = $imgMessage;
                return false;
            }
        } else {
            $imgMessage .= 'error in file extension';
            $_SESSION['imgMessage'] = $imgMessage;
            return false;
        }
    }

    
}



function errorMessage($key)
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
}



function validateProduct($name, $description, $price)
{
    $productNameMessage = "";
    $descriptionMessage = "";
    $priceMessage = "";

    if (empty($description)) {
        $descriptionMessage = "Please Insert Product description";
        $_SESSION['descriptionMessage'] = $descriptionMessage;
        return false;
    } else {
        return true;
    }
    if (empty($name)) {
        $productNameMessage = "Please Insert Product Name";
        $_SESSION['productNameMessage'] = $productNameMessage;
        return false;
    } else {
        return true;
    }
    if (empty($price)) {
        $priceMessage = "Please Insert Product price";
        $_SESSION['priceMessage'] = $priceMessage;
        return false;
    }else if (!filter_var($price, FILTER_VALIDATE_INT)) {
        $priceMessage = "Please Insert valid price.It must be a number";
        $_SESSION['priceMessage'] = $priceMessage;
        return false;
    } else {
        return true;
    }
}
